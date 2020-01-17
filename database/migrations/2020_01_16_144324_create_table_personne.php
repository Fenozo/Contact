<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePersonne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 160)->nullable(true);
            $table->string('prename', 160)->nullable(true);
            $table->dateTime('date_naissance')->nullable(true);
            $table->string('lieu_naissance')->nullable(true);
            $table->double('cin')->nullable(true);
            $table->dateTime('date_livraison_cin')->nullable(true);
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
        Schema::dropIfExists('personnes');
    }
}
