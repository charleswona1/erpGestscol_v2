<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\View\Components\App;
use App\View\Components\Header;
use App\View\Components\SideBar;
use App\View\Components\ConfIcon;
use App\View\Components\GestScol;
use App\View\Components\Errors;


use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::component(App::class, 'app');
        Blade::component(Header::class, 'header');
        Blade::component(SideBar::class, 'side-bar');
        Blade::component(ConfIcon::class, 'conf-icon');
        Blade::component(GestScol::class, 'gest-scol');
        Blade::component(Errors::class, 'errors');

        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
