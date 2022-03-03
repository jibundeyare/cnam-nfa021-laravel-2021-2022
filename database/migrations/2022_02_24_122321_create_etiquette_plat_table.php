<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtiquettePlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiquette_plat', function (Blueprint $table) {
            $table->foreignId('etiquette_id')->references('id')->on('etiquette');
            $table->foreignId('plat_id')->references('id')->on('plat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etiquette_plat');
    }
}
