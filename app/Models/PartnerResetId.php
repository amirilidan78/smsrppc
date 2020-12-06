<?php

namespace App\Models;

use App\Casts\ProtectedPictureCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnerResetId extends Model
{
    use HasFactory ,SoftDeletes;

    protected $casts = [
        'cart_melli_picture'  => ProtectedPictureCast::class ,
    ];

    protected $guarded = [] ;

}
