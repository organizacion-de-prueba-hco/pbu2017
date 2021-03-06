<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        //Nuestros Midellware
        'asistentsocial' => \App\Http\Middleware\Asistentsocial::class,
        'jusu' => \App\Http\Middleware\Jusu::class,
        'SuperUsuario' => \App\Http\Middleware\Jusu::class,
        'nutricionista' => \App\Http\Middleware\Nutricionista::class,
        'directivo' => \App\Http\Middleware\Directivo::class,
        'juafsm' => \App\Http\Middleware\Juafsm::class,
        'jufc' => \App\Http\Middleware\Jufc::class,
        'comedor' => \App\Http\Middleware\Comedor::class,
        'enfermera' => \App\Http\Middleware\Enfermera::class,
        'medico' => \App\Http\Middleware\Medico::class,
        'odonto' => \App\Http\Middleware\Odonto::class,
        'psico' => \App\Http\Middleware\Psicopedagoga::class,
    ];
}
