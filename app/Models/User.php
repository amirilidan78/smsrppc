<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens ,HasFactory, Notifiable ,HasRoles ,HasPermissions;

    protected $fillable = [
        'name',
        'phone',
        'password',
        'is_superuser',
    ];

    protected $hidden = [
        'remember_token'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function is_super_user()
    {
        return $this->is_superuser ;
    }

    public function scopeFindUsingPhone($query ,$phone) : User
    {
        return $query->where('phone' ,$phone)->firstOrFail() ;
    }

    public function getAvatar()
    {
        $array = explode(' ' ,$this->name) ;

        if ( count($array) == 1 )
            $name = $array[0] ;
        else
            $name = \Arr::last($array)."+".$array[0]  ;

        return "https://ui-avatars.com/api/?name={$name}&rounded=true&color=7F9CF5&background=EBF4FF&size=40" ;
    }

}
