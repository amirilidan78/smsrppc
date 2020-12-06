<?php

use Illuminate\Support\Facades\Route ;

/// composer dump-autoload

if( !function_exists('isActive') ){
    function isActive($key ,$activeClass = 'custom-active'){

        ///TODO is_array($key) => ...

        return Route::currentRouteName() == "$key" ? $activeClass : '' ;
    }
}
