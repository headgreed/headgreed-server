<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidenav', function($view)
        {
            $board_categories = \App\BoardCategory::all();
            foreach ($board_categories as $b) {
                $b->boards = $b->boards()->get();
            }
            $view->with('board_categories', $board_categories);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
