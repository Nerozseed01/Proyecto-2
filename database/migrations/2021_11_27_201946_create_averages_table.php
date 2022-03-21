<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('averages', function (Blueprint $table) {
            $table->id();

            $table->integer('domain');
            $table->integer('puntuality');
            $table->integer('difficulty');
            $table->integer('qualification');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('set null');

            $table->foreign('teacher_id')
                    ->references('id')->on('teachers')
                    ->onDelete('set null');

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
        Schema::dropIfExists('averages');
    }
}
