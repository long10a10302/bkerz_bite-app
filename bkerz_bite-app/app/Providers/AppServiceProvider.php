<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category; // Import Category model

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
    public function boot()
    {
        // Lấy tất cả category và chia sẻ với tất cả view
        $categories = Category::all();
        view()->share('categories', $categories);
    }

}
