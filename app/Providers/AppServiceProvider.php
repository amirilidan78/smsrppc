<?php

namespace App\Providers;

use App\CodeBase\File\PictureFacade;
use App\CodeBase\IranianCodeMelli;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public' ,function (){
            return base_path('/public_html') ;
        });

        Paginator::useBootstrap();
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
