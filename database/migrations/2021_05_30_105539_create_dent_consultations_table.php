<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dent_consultations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_medecin')->unsigned();
            $table->bigInteger('id_malade')->unsigned();
            $table->bigInteger('id_consultation')->unsigned();
            $table->bigInteger('numero_dents')->unsigned();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dent_consultations');
    }
}
