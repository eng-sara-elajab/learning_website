<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlineClass extends Model
{
    protected $dates = ['start_at'];

    protected $fillable = ['admin_id', 'meeting_id', 'topic', 'start_at', 'description', 'course_photo', 'duration', 'start_url', 'join_url'];

//    public function grade(){
//        return $this->belongsTo('App\Grade', 'grade_id');
//    }
//    public function classroom(){
//        return $this->belongsTo('App\Classroom', 'classroom_id');
//    }
//    public function section(){
//        return $this->belongsTo('App\Section', 'section_id');
//    }
    public function admin(){
        return $this->belongsTo('App\Admin', 'admin_id');
    }
}
