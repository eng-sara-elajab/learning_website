<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
//            $table->unsignedBigInteger('grade_id');
//            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
//            $table->unsignedBigInteger('classroom_id');
//            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
//            $table->unsignedBigInteger('section_id');
//            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->string('meeting_id');
            $table->string('topic');
            $table->timestamp('start_at');
            $table->longText('description');
            $table->longText('course_photo');
            $table->integer('duration')->comment('minutes');
//            $table->string('password')->comment('meeting password');
            $table->text('start_url');
            $table->text('join_url');
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
        Schema::dropIfExists('online_classes');
    }
}
