<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Hash;
use MacsiDigital\Zoom\Facades\Zoom;

trait MeetingZoomTrait
{
    public function createMeeting($request){
        $user = Zoom::user()->first();

        $meetingData = [
            'topic' => $request->topic,
            'duration' => $request->duration,
            'password' => $request->password,
            'start_at' => $request->start_at,
            'timezone' => config('zoom.timezone')
//            'timezone' => 'Africa/Cairo'
        ];

        $meeting = Zoom::meeting()->make($meetingData);

        $meeting->settings()->make([
            'join_before_host' => false,
            'host_video' => false,
            'participant_video' => false,
            'multi_upon_entry' => true,
            'waiting_room' => true,
            'approval_type' => config('zoom.approval_type'),
            'audio' => config('zoom.audio'),
            'auto_recording' => config('zoom.auto_recording'),
        ]);
        if($meetingData && $meeting)
            return $user->meetings()->save($meeting);
        else
            return redirect()->back()->with("error", "Something went wrong. Please try again!");
    }
}