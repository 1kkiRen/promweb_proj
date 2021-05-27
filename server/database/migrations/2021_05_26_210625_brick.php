<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Brick extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brick', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('manufacturer');
            $table->text('info');
            $table->boolean('is_hollow');
            $table->string('material');
            $table->integer('price');
            // ceramic  silicate  clinker  fireclay  hyper-pressed



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
        //
    }
}
