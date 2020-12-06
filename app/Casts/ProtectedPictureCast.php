<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ProtectedPictureCast extends abstractProtectedPicture implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        return $this->getBase64($value) ;
    }

    public function set($model, $key, $value, $attributes)
    {
        return $value ;
    }
}
