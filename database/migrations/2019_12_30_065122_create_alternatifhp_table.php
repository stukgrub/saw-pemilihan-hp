<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifhpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatifhp', function (Blueprint $table) {
            $table->increments('idhp');
            $table->string('merk_hp', 55);
            $table->integer(' thn_hp');
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
        Schema::dropIfExists('alternatifhp');
        $table->increments('idhp');
        $table->string('merk_hp', 55);
        $table->integer(' thn_hp');
        $table->timestamps();
    }
}
