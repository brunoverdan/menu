<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCupomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupoms', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->decimal('valor', 10,2)->nullable();
            $table->enum('tipo', ['real', 'porcentagem']);
            $table->date('dataIni')->nullable();
            $table->date('dataFim')->nullable();
            $table->boolean('pausado')->nullable();
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
        Schema::dropIfExists('cupoms');
    }
}
