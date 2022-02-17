<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adminusermessage extends Model
{
    protected $fillable = ['body', 'file', 'file_type', 'sender_id', 'sender_type', 'receiver_id', 'receiver_type', 'chat_room', 'read_status'];
}
