<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website_Information extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'address',
        'facebook_url', 'twitter_url', 'snapchat_url', 'instgram_url',
        'description', 'vision', 'mission', 'logo'];
}
