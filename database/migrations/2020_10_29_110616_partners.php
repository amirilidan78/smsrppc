<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Partners extends Migration
{
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();

            $table->string('name',55)->nullable() ;
            $table->string('last_name',55)->nullable() ;
            $table->string('father_name',55)->nullable() ;
            $table->string('phone', 15)->nullable() ;
            $table->bigInteger('certificate_id')->unsigned()->nullable() ;
            $table->string('birth_place',55)->nullable() ;
            $table->bigInteger('code_melli')->unsigned()->nullable() ;
            $table->bigInteger('post_code')->unsigned()->nullable() ;

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
