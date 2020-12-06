<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatedPartners extends Migration
{
    public function up()
    {
        Schema::create('updated_partners', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('partner_id') ;
            $table->string('name',55) ;
            $table->string('last_name',55) ;
            $table->string('father_name',55) ;
            $table->string('phone', 15) ;
            $table->bigInteger('code_melli')->unsigned();
            $table->bigInteger('certificate_id')->unsigned();
            $table->string('gender',10) ;
            $table->string('birth_place',55) ;
            $table->string('birth_date',55) ;
            $table->string('dead_date',55)->nullable() ;
            $table->string('dead_description',1000)->nullable() ;
            $table->string('address',100) ;
            $table->bigInteger('post_code')->unsigned();
            $table->string('shaba' ,'25');
            $table->string('national_card_picture','55')->nullable() ;
            $table->string('men_card_service_picture','55')->nullable() ;
            $table->string('probate_picture','55')->nullable() ;
            $table->string('certificate_id_picture','55')->nullable() ;
            $table->string('action',30)->nullable() ; // delete accept reject
            $table->timestamp('action_at')->nullable() ;
            $table->timestamp('smsText')->nullable() ;
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('updated_partners');
    }
}
