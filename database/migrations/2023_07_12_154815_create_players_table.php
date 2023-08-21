<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedTinyInteger('jersey_number')->nullable();
            $table->enum('stick_hand', ['left', 'right'])->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table
                ->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('restrict');

            $table
                ->foreign('position_id')
                ->references('id')->on('playing_positions')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
};
