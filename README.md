# one-signal-rest-api
This package for Backend easy user to access one-signal Server REST-API

## Installation
`composer require chando/one-signal-rest-api`

## Configuration
`php artisan vendor:publish --tag=config`

## Migration
`php artisan vendor:publish --tag=migrations`

## Usage

### Send Notification
`$res = OneSignal::setHeaderTitle('your-title')->setContent('your-content')->setData('your-data')->sendNotification();`

### Handle Error
`if($res->hasError()){
    dd($res->errors);
}`

# Note
> Don't forget to config APP_ID, API_KEY and AUTH_KEY on configuration file to get it work.