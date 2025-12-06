<?php


use App\Http\Controllers\MetricsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('v1.sites.index', ['title' => 'Server Metrics']);
});
// Get all metrics
Route::get('/metrics', [MetricsController::class, 'index']);

// Get specific metric category
Route::get('/metrics/{category}', [MetricsController::class, 'show'])
    ->whereIn('category', ['system', 'cpu', 'memory', 'disk', 'network', 'services', 'load']);

// Real-time metrics stream (SSE)
Route::get('/metrics/stream', [MetricsController::class, 'stream']);

// Historical metrics
Route::get('/metrics/{metric}/history', [MetricsController::class, 'history'])
    ->whereIn('metric', ['cpu', 'memory', 'disk', 'network']);
