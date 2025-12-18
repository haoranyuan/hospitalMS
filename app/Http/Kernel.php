<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     * In Laravel 11+, middleware is configured in bootstrap/app.php.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        //
    ];

    /**
     * The application's route middleware groups.
     *
     * In Laravel 11+, middleware groups are configured in bootstrap/app.php.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        //
    ];

    /**
     * The application's middleware aliases.
     *
     * Aliases may be used instead of class names to assign middleware to routes and groups.
     * In Laravel 11+, middleware aliases are configured in bootstrap/app.php.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        //
    ];
}
