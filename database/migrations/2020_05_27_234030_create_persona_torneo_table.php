<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTorneoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_torneo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id');
            $table->foreignId('torneo_id');
            $table->text('bloque1');
            $table->text('bloque2');
            $table->text('bloque3');
            $table->double('total',8,2);
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
        Schema::dropIfExists('persona_torneo');
    }
}
