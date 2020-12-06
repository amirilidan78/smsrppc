<?php

namespace App\Models;

use App\Casts\ProtectedPictureCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class UpdatedPartner extends Model
{
    use HasFactory ,Notifiable ,SoftDeletes;

    protected $casts = [
       'probate_picture'  => ProtectedPictureCast::class ,
       'certificate_id_picture'  => ProtectedPictureCast::class ,
       'national_card_picture'  => ProtectedPictureCast::class ,
       'men_card_service_picture'  => ProtectedPictureCast::class ,
    ];

    protected $guarded = [] ;

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function is_accepted(){
        return $this['action'] == 'accepted' || $this['action'] == 'accept' ;
    }
    public function is_rejected(){
        return $this['action'] == 'rejected' ;
    }
    public function is_deleted(){
        return $this['action'] == 'deleted' ;
    }
}
