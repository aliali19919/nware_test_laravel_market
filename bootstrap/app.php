<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\IsAdminMiddleWare;
use App\Http\Middleware\IsStaffMiddleWare;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
      $middleware->alias([
        "admin"=>IsAdminMiddleWare::class,
        "staff"=>IsStaffMiddleWare::class,
        "role"=>RoleMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
