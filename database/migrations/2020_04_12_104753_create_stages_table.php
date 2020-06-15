<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('etudiant_id')->unsigned();
            $table->integer('prof_suivi_id')->unsigned();
            $table->integer('annee_id')->unsigned();
            $table->integer('filiere_id')->unsigned();
            $table->integer('phase')->unsigned();
            $table->integer('directeur_memoire_id')->unsigned();
            $table->string('maitre_de_stage');
            $table->string('niveau');
            $table->date('date_debut');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stages');
    }
}
