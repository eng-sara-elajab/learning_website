<?php

namespace App\Http\Controllers\Admin;

use App\Adminusermessage;
use App\Contact;
use App\Event;
use App\Http\Controllers\Controller;
use App\UserCourse;
use App\Website_Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class FullCalenderController extends Controller
{

    protected $currentAdminId;

    public function __construct(){
        $this->middleware('auth:admin');

        $this->middleware(function ($request, $next) {
            $this->currentAdminId = Auth::guard('admin')->user()->id;
            $this->website_information = Website_Information::first();
            $this->user_new_messages = Adminusermessage::where(['receiver_id'=> $this->currentAdminId, 'receiver_type' => 'admin', 'read_status' => 'unread'])->get();
            $this->new_contacts = Contact::where("status", "unread")->get();

            View::share(['website_information' => $this->website_information, 'user_new_messages' => $this->user_new_messages, 'new_contacts'=> $this->new_contacts]);

            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->where('admin_id', Auth::guard('admin')->user()->id)
                ->where('user_id', null)
                ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
        }
        return view('admin.full-calender');
    }

    public function action(Request $request)
    {
        if($request->ajax())
        {
            if($request->type == 'add')
            {
                $event = Event::create([
                    'title'		=>	$request->title,
                    'start'		=>	$request->start,
                    'end'		=>	$request->end,
                    'admin_id' => Auth::guard('admin')->user()->id,
                    'course_id' => $request->course_id
                ]);

                $course_users = UserCourse::where('course_id', $request->course_id)->get();
                foreach ($course_users as $course_user){
                    $event = Event::create([
                        'title'		=>	$request->title,
                        'start'		=>	$request->start,
                        'end'		=>	$request->end,
                        'admin_id' => Auth::guard('admin')->user()->id,
                        'course_id' => $request->course_id,
                        'user_id' => $course_user->user_id
                    ]);
                }

//                $user_courses = UserCourse::where('course_id', $request->course_id)->get();
//                foreach ($user_courses as $user_course){
//                    $user_course->event_id = $event->id;
//                    $user_course->save();
//                }

                return response()->json($event);
            }

            if($request->type == 'update')
            {
                $event = Event::find($request->id)->update([
                    'title'		=>	$request->title,
                    'start'		=>	$request->start,
                    'end'		=>	$request->end,
                    'admin_id' => Auth::guard('admin')->user()->id,
                ]);

                return response()->json($event);
            }

            if($request->type == 'delete')
            {
                $event = Event::find($request->id)->delete();

                return response()->json($event);
            }
        }
    }
}
