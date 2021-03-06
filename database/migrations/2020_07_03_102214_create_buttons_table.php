<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buttons', function (Blueprint $table) {
            $table->id();
            $table->string('color', 10);
            $table->string('color_bg', 10);
            $table->string('label', 255);
            $table->string('icon', 20);
            $table->enum('type', ['flat', 'raised']);

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
        Schema::dropIfExists('buttons');
    }
}
