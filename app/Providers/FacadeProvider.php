<?php

namespace App\Providers;

use App\CodeBase\File\PictureFacade;
use Illuminate\Support\ServiceProvider;

class FacadeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton("PictureFacade" ,function (){
            return new PictureFacade() ;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
