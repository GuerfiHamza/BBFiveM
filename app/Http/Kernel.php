<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\DisableFormBuilderDefaultsRoutes::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'staff' => \App\Http\Middleware\StaffMiddleware::class,
        'superadmin' => \App\Http\Middleware\SuperAdminMiddleware::class,
        'dashboard' => \App\Http\Middleware\DashboardMiddleware::class,
        'player' => \App\Http\Middleware\IsPlayerMiddleware::class,
        'boss' => \App\Http\Middleware\IsBossMiddleware::class,
        'org' => \App\Http\Middleware\IsOrgMiddleware::class,
        'server' => \App\Http\Middleware\ServerMiddleware::class,
        'lspd' => \App\Http\Middleware\LSPDMiddleware::class,
        'ems' => \App\Http\Middleware\EMSMiddleware::class,
        'arm' => \App\Http\Middleware\ArmurierMiddleware::class,
        'weapons' => \App\Http\Middleware\WeaponsMiddleware::class,
        'va' => \App\Http\Middleware\VAMiddleware::class,
        'banker' => \App\Http\Middleware\BankerMiddleware::class,
        'avocat' => \App\Http\Middleware\AvocatMiddleware::class,
        'concessveh' => \App\Http\Middleware\ConcessVehMiddleware::class,
        'concessmoto' => \App\Http\Middleware\ConcessMMiddleware::class,
        'immo' => \App\Http\Middleware\ImmoMiddleware::class,
        'weazel' => \App\Http\Middleware\WeazelMiddleware::class,
        'boat' => \App\Http\Middleware\BateauMiddleware::class,
    ];
}