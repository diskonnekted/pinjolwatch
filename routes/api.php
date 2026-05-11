<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\ReportAggregationService;

Route::get('/map-stats', function (Request $request, ReportAggregationService $service) {
    return response()->json($service->getKabupatenStats(
        $request->query('start'),
        $request->query('end'),
        $request->query('status')
    ));
})->middleware('throttle:30,1');
