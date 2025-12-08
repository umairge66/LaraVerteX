<?php

namespace App\Console\Commands;

use App\Models\ServerMetric;
use App\Services\ServerMetricsService;
use Illuminate\Console\Command;

class CollectServerMetricsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'metrics:collect
                            {--type=all : Metric type to collect (all, cpu, memory, disk, network)}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Collect and store server metrics';

    public function __construct(
        private readonly ServerMetricsService $metricsService
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $type = $this->option('type');

        try {
            $metrics = $this->metricsService->getAllMetrics();
            $timestamp = now();

            if ($type === 'all') {
                $this->storeAllMetrics($metrics, $timestamp);
            } else {
                $this->storeSpecificMetric($metrics, $type, $timestamp);
            }

            $this->info('Metrics collected successfully');

        } catch (\Exception $e) {
            $this->error('Failed to collect metrics: ' . $e->getMessage());
        }
    }

    private function storeAllMetrics(array $metrics, $timestamp): void
    {
        $types = ['cpu', 'memory', 'disk', 'network', 'services', 'load'];

        foreach ($types as $type) {
            if (isset($metrics[$type])) {
                ServerMetric::query()
                    ->create([
                    'metric_type' => $type,
                    'data' => $metrics[$type],
                    'recorded_at' => $timestamp,
                ]);
            }
        }
    }

    private function storeSpecificMetric(array $metrics, string $type, $timestamp): void
    {
        if (!isset($metrics[$type])) {
            throw new \InvalidArgumentException("Invalid metric type: {$type}");
        }

        ServerMetric::query()
            ->create([
            'metric_type' => $type,
            'data' => $metrics[$type],
            'recorded_at' => $timestamp,
        ]);
    }
}
