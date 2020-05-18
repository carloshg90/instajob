<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('idRemitent');
            $table->string('missatgeEnviat');
            $table->string('zonaOferta')->nullable();
            $table->string('horariOferta')->nullable();
            $table->string('sectorOferta')->nullable();
            $table->string('cosOferta')->nullable();
            $table->string('nomReceptor');
            $table->foreign('idRemitent')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
