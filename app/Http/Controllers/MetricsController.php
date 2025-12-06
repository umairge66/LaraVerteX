<?php

namespace App\Http\Controllers;

use App\Services\ServerMetricsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MetricsController extends Controller
{
    public function __construct(
        private readonly ServerMetricsService $metricsService
    ) {}

    /**
     * Get all server metrics
     */
    public function index(): JsonResponse
    {
        try {
            $metrics = $this->metricsService->getAllMetrics();

            return response()->json([
                'success' => true,
                'data' => $metrics,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch metrics',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Stream metrics via Server-Sent Events (SSE)
     * For real-time updates without WebSockets
     */
    public function stream(Request $request): StreamedResponse
    {
        return response()->stream(function () {
            // Disable execution time limit
            set_time_limit(0);

            // Prevent buffering
            if (ob_get_level()) ob_end_clean();

            $lastEventId = 0;

            while (true) {
                // Check if client is still connected
                if (connection_aborted()) {
                    break;
                }

                try {
                    $metrics = $this->metricsService->getAllMetrics();
                    $lastEventId++;

                    // Send SSE formatted data
                    echo "id: {$lastEventId}\n";
                    echo "data: " . json_encode($metrics) . "\n\n";

                    // Flush output
                    if (ob_get_level()) ob_flush();
                    flush();

                } catch (\Exception $e) {
                    // Send error event
                    echo "event: error\n";
                    echo "data: " . json_encode(['message' => 'Failed to fetch metrics']) . "\n\n";
                    if (ob_get_level()) ob_flush();
                    flush();
                }

                // Wait 2 seconds before next update
                sleep(2);
            }
        }, 200, [
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache',
            'Connection' => 'keep-alive',
            'X-Accel-Buffering' => 'no', // Disable Nginx buffering
        ]);
    }

    /**
     * Get specific metric category
     */
    public function show(string $category): JsonResponse
    {
        try {
            $metrics = $this->metricsService->getAllMetrics();

            if (!isset($metrics[$category])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid metric category',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $metrics[$category],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch metric',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get historical metrics from database
     * (You would need to store metrics periodically)
     */
    public function history(Request $request, string $metric): JsonResponse
    {
        $request->validate([
            'period' => 'in:1h,6h,24h,7d,30d',
            'interval' => 'in:1m,5m,15m,1h,1d',
        ]);

        // Implement based on your metrics storage strategy
        // This is a placeholder

        return response()->json([
            'success' => true,
            'data' => [
                'metric' => $metric,
                'period' => $request->input('period', '1h'),
                'data' => [],
            ],
        ]);
    }
}
