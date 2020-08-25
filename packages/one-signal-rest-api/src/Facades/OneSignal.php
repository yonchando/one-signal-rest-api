<?php


namespace Chando\OneSignalRestApi\Facades;


use Illuminate\Support\Facades\Facade;

class OneSignal extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'onesignal';
    }
}