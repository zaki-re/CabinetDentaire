<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_medecin')->unsigned();
            $table->bigInteger('id_malade')->unsigned();
            $table->date('date_consultation');
            $table->date('date_prochaine_rdv')->nullable();
            $table->string('type_consultation');
            $table->string('soins');
            $table->bigInteger('versement')->nullable();
            $table->bigInteger('rest')->nullable();
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
        Schema::dropIfExists('consultations');
    }
}
