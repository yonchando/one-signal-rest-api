<?php

use Illuminate\Support\Facades\Route;

Route::namespace('OneSignal\Http\Controllers')->group(function () {
    Route::post('onesignal', "OneSignalController@store")->name('onesignal.store');
});
