<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->text('description');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();


            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('set null');

            $table->foreign('teacher_id')
                    ->references('id')->on('teachers')
                    ->onDelete('set null');

            $table->foreign('subject_id')
                    ->references('id')->on('subjects')
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
        Schema::dropIfExists('comments');
    }
}
