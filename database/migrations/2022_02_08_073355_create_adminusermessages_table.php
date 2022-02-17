<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminusermessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminusermessages', function (Blueprint $table) {
            $table->id();
            $table->string('body');
            $table->longText('file')->nullable();
            $table->string('file_type')->nullable();
            $table->text('sender_id');
            $table->text('sender_type');
            $table->text('receiver_id');
            $table->text('receiver_type');
            $table->text('read_status')->default('unread');
            $table->text('chat_room');
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
        Schema::dropIfExists('adminusermessages');
    }
}
