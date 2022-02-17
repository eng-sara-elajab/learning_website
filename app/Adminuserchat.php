<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adminuserchat extends Model
{
    protected $fillable = ['admin_id', 'user_id'];
}
