<?php
return [
    'one_signal_url'      => env('ONE_SIGNAL_URL', 'https://onesignal.com/api/v1'),
    'one_signal_api_key'  => env('ONE_SIGNAL_API_KEY', ''),
    'one_signal_app_id'   => env('ONE_SIGNAL_APP_ID', ''),
    'one_signal_auth_key' => env('ONE_SIGNAL_AUTH_KEY', ''),

    /*
     * Table for store player ids
     *
     * */
    'table_name'          => 'push_player_ids',
    /*
     * Model id is relationship for player_id to user
     * */
    'model_id'            => 'user_id',
];