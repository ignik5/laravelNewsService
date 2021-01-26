<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class menuprovider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->getmenu();
    }
    public function getmenu()
    {
        \View::composer('layouts.main', function($view){
         $view->with('menu', \view('menu'));
        });
    }
}
