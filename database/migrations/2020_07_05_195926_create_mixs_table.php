<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMixsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mixs', function (Blueprint $table) {
            $table->id();

            $table->string('widget', 10);
            $table->integer('widget_id')->unsigned();
            $table->integer('orden')->unsigned();

            $table->foreignId('group_id') // LARAVEL 7 o superior
            ->references('id')
            ->on('groups')
            ->onDelete('cascade');

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
        Schema::dropIfExists('mixs');
    }
}
