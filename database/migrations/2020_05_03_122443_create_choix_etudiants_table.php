<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoixEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choix_etudiants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('etudiant_id');
            $table->bigInteger('id_choix_1');
            $table->bigInteger('id_choix_2');
            $table->bigInteger('id_choix_3');
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
        Schema::dropIfExists('choix_etudiants');
    }
}
