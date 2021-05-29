<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeConsultationMaladesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_consultation_malades', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_medecin')->unsigned();
            $table->bigInteger('id_malade')->unsigned();
            $table->bigInteger('id_consultation')->unsigned();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultation_malades');
    }
}
