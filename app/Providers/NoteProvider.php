<?php

namespace App\Providers;

use App\Repositories\Interfaces\NoteInterface;
use App\Repositories\Patterns\NoteRepository;
use Illuminate\Support\ServiceProvider;

class NoteProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(NoteInterface::class, NoteRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
