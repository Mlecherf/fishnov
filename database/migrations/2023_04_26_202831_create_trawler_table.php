<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrawlerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trawler', function (Blueprint $table) {
            $table->id('id_trawler');
            $table->foreignId('id_company');
            $table->string('name_trawler');
            $table->string('registration_trawler');
            $table->string('password_trawler');
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
        Schema::dropIfExists('trawler');
    }
}
