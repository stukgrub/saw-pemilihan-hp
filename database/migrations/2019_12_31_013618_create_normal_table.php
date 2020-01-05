<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normal', function (Blueprint $table) {
            $table->increments('id_normal');
            $table->integer('idhp');
            $table->double('harga');
            $table->double('ram');
            $table->double('memory');
            $table->double('camera');
            $table->double('layar');
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
        Schema::dropIfExists('normal');
        $table->increments('id_normal');
        $table->integer('idhp');
        $table->double('harga');
        $table->double('ram');
        $table->double('memory');
        $table->double('camera');
        $table->double('layar');
        $table->timestamps();
    }
}
