<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Auth\Http\Responses\LoginResponse as LoginResponseContract;
use Filament\Auth\Http\Responses\LogoutResponse as LogoutResponseContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(LoginResponseContract::class, \App\Auth\Http\Responses\LoginResponse::class);
        $this->app->bind(LogoutResponseContract::class, \App\Auth\Http\Responses\LogoutResponse::class);
    }
}
