<?php

namespace App\Traits ;

use Illuminate\Support\Str;

trait YearsMonthsDays

{
    private  function days()
    {
        return collect(range(1,31))->map(function ($value) {
            return Str::length($value) == 1 ? "0".$value : "$value";
        })->toArray() ;
    }

    private  function months()
    {
        return collect(range(1,12))->map(function ($value) {
            return Str::length($value) == 1 ? "0".$value : "$value";
        })->toArray() ;
    }

    private  function years()
    {
        return collect(range(1300,1400))->map(function ($value) {
            return "$value" ;
        })->toArray() ;
    }

}
