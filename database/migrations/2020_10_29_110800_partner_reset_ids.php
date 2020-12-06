<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PartnerResetIds extends Migration
{
    public function up()
    {
        Schema::create('partner_reset_ids', function (Blueprint $table) {
            $table->id();

            $table->string('name',55)->nullable() ;
            $table->string('last_name',55)->nullable() ;
            $table->string('father_name',55)->nullable() ;
            $table->string('phone', 15)->nullable() ;
            $table->string('cart_melli_pic', 100)->nullable() ;
            $table->string('response', 100)->nullable() ;
            $table->string('action',30)->nullable() ; // delete accept reject
            $table->timestamp('action_at')->nullable() ;

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partner_reset_ids');
    }
}
