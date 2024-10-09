<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Middleware\RecordIsAccessible;
use App\Models\Record;

Route::prefix('records')->group(function () {
    Route::post('/', [RecordController::class, 'getList']);

    Route::get('{record}', function (Record $record) {
        return $record;
    })->middleware(RecordIsAccessible::class);
});
