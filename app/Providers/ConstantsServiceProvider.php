<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConstantsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        define('USER_ADMIN', 'Admin');
        define('USER_HELPDESK', 'Helpdesk');
        define('USER_TECHNICIAN', 'Teknisi');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
