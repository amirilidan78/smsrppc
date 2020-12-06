<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function getUnSerializeObject()
    {
        return unserialize( json_decode($this['payload'])->data->command ) ;
    }

    public function getObject()
    {
        return $this->getUnSerializeObject() ;
    }
}
