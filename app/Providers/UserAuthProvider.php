<?php

namespace App\Providers;

use App\Repositories\Interfaces\AuthenticationInterface;
use App\Repositories\Patterns\AuthenticationRepository;
use Illuminate\Support\ServiceProvider;

class UserAuthProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthenticationInterface::class, AuthenticationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
