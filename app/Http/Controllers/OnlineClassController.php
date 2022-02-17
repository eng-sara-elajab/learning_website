<?php

namespace App\Http\Controllers;

use App\Adminusermessage;
use App\Event;
use App\Grade;
use App\Http\Controllers\Controller;
use App\OnlineClass;
use App\UserCourse;
use App\Website_Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\MeetingZoomTrait;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class OnlineClassController extends Controller
{
    use MeetingZoomTrait;

    protected $currentUserId;

    public function __construct()
    {
        $this->middleware('auth');
        $this->website_information = Website_Information::first();

        $this->middleware(function ($request, $next) {
            $this->currentUserId = Auth::user()->id;
            $this->admin_new_messages = Adminusermessage::where('receiver_id', $this->currentUserId)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            View::share(['website_information' => $this->website_information, 'admin_new_messages' => $this->admin_new_messages]);

            return $next($request);
        });
    }

    public function index()
    {
        $online_classes = OnlineClass::all();
        return view('user.online_classes.index', compact('online_classes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function join_course($id){
        $online_class = OnlineClass::find($id);

        $user_course = new UserCourse();
        $user_course->user_id = Auth::user()->id;
        $user_course->course_id = $online_class->id;
        $user_course->save();

        $course_events = Event::where('course_id', $online_class->id)->where('user_id', null)->get();
//        return $course_events;
        foreach ($course_events as $course_event){
            $user_event = new Event();
            $user_event->title = $course_event->title;
            $user_event->start = $course_event->start;
            $user_event->end = $course_event->end;
            $user_event->admin_id = $course_event->admin_id;
            $user_event->course_id = $course_event->course_id;
            $user_event->user_id = Auth::user()->id;
            $user_event->save();
        }

        return Redirect::to($online_class->join_url);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $search_results = OnlineClass::where('topic','LIKE', '%' . $search . '%')->paginate(5)->withQueryString();
        $online_classes = OnlineClass::all();

        return view('user.online_classes.index', compact('search_results', 'online_classes'));
    }
}
