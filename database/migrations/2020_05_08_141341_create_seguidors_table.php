<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguidorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguidors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('idSeguidor');
            $table->unsignedBigInteger('idSeguit')->nullable();
            $table->foreign('idSeguidor')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('idSeguit')->references('idEmpresa')->on('ofertas')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguidors');
    }
}
