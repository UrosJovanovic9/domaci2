<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredavacsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predavacs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('imeIPrezime');
            $table->string('zvanje');
            $table->string('fakultet')->nullable();
            $table->foreignId('kurs_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predavacs');
    }
}
