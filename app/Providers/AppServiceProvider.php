<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        try {
            View::composer('layouts.app', function ($view) {
                $cartCount = Auth::check()
                    ? Cart::where('user_id', Auth::id())->count()
                    : 0;

                Log::info('AppServiceProvider::cartCount', [
                    'cartCount' => $cartCount,
                    'user_id' => Auth::id() ?? 'guest',
                    'auth_check' => Auth::check(),
                ]);

                $view->with('cartCount', $cartCount);
            });
        } catch (\Exception $e) {
            Log::error('AppServiceProvider::boot failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }
}
