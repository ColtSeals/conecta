<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [
    'name' => env('APP_NAME', 'Laravel'),
    'env' => env('APP_ENV', 'production'),

    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'asset_url' => env('ASSET_URL'),

    'timezone' => 'America/Sao_Paulo',

    'locale' => 'pt_BR',
    'fallback_locale' => 'pt_BR',
    'faker_locale' => 'pt_BR',

    'key' => env('APP_KEY'),
    'cipher' => 'AES-256-CBC',

    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],

    'providers' => ServiceProvider::defaultProviders()->merge([
        Spatie\Permission\PermissionServiceProvider::class,
        GoogleMaps\ServiceProvider\GoogleMapsServiceProvider::class,
        OwenIt\Auditing\AuditingServiceProvider::class,

        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        App\Providers\FortifyServiceProvider::class,
        App\Providers\JetstreamServiceProvider::class,
    ])->toArray(),

    'aliases' => Facade::defaultAliases()->merge([
        'GoogleMaps' => GoogleMaps\Facade\GoogleMapsFacade::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
    ])->toArray(),
];
