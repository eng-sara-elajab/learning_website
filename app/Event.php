<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'start', 'end', 'admin_id', 'course_id', 'user_id'];
}
