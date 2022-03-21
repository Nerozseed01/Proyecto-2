<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);

            $table->unsignedBigInteger('university_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('center_id')->nullable();


            $table->foreign('university_id')
                    ->references('id')->on('universities')
                    ->onDelete('set null');

            $table->foreign('department_id')
                    ->references('id')->on('departments')
                    ->onDelete('set null');

            $table->foreign('center_id')
                    ->references('id')->on('centers')
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
        Schema::dropIfExists('teachers');
    }
}
