<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubkriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subkriteria', function (Blueprint $table) {
            $table->increments('id_sub');
            $table->integer('id_kriteria');
            $table->string('nama_sub', 50);
            $table->integer('nilai');
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
        Schema::dropIfExists('subkriteria');
        $table->increments('id_sub');
        $table->integer('id_kriteria');
        $table->string('nama_sub', 50);
        $table->integer('nilai');
        $table->timestamps();
    }
}
