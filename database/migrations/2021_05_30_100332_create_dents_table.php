<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dents', function (Blueprint $table) {
            $table->id();
            $table->string('dent');
            $table->bigInteger('id_medecin');
            $table->string('numero')->unique();
            $table->string('emplacement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dents');
    }
}
