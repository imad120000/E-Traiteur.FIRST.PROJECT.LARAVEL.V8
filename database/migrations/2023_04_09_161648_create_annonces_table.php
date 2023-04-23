<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('des');
            $table->string('NomComercial');
            $table->integer('classment')->default(0);
            $table->string('photo');
            $table->string('video'); 
            //The annonce link to (user - service - ville )
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('service_id'); 
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreignId('ville_id')->constrained();
            $table->softDeletes();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annonces');
    }
}
