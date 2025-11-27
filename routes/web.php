<?php


use App\Http\Controllers\V1\SiteController;
use Illuminate\Support\Facades\Route;

Route::resource('v1/sites', SiteController::class);
