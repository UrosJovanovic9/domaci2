<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNazivkursaToNazivInKursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kurs', function (Blueprint $table) {
            $table->renameColumn('nazivkursa','naziv');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kurs', function (Blueprint $table) {
            $table->renameColumn('naziv','nazivkursa');
        });
    }
}
