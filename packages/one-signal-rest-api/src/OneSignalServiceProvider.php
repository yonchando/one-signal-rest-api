<?php

namespace Chando\OneSignalRestApi;

use Illuminate\Support\ServiceProvider;

class OneSignalServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->publishes([
            __DIR__ . '/config/onesignal.php'                                                   => config_path('onesignal.php'),
            __DIR__ . '/database/migrations/2020_08_25_053030_create_push_player_ids_table.php' => config_path('2020_08_25_053030_create_push_player_ids_table.php'),
        ]);
        $this->mergeConfigFrom(__DIR__ . '/config/onesignal.php', 'onesignal');
        $this->app->singleton('onesignal', function () {
            $api_key = config('onesignal.one_signal_api_key');
            $base_url = config('onesignal.one_signal_url');
            $app_id = config('onesignal.one_signal_app_id');
            $auth_key = config('onesignal.one_signal_app_id');
            return new OneSignal($api_key, $app_id, $auth_key, $base_url);
        });
    }

    public function boot()
    {

    }
}