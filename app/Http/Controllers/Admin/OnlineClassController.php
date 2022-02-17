<?php

namespace App\Http\Controllers\Admin;

use App\Adminusermessage;
use App\Contact;
use App\Http\Controllers\Controller;
use App\OnlineClass;
use App\Website_Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\MeetingZoomTrait;
use Illuminate\Support\Facades\View;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineClassController extends Controller
{
    use MeetingZoomTrait;

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

    public function index()
    {
        $online_classes = OnlineClass::all();
        return view('admin.online_classes.index', compact('online_classes'));
    }

    public function create()
    {
        return view('admin.online_classes.add');
    }

    public function store(Request $request)
    {

//        try {
        $meeting = $this->createMeeting($request);

        $online_course = new OnlineClass();

        $online_course->admin_id = Auth::guard('admin')->user()->id;
        $online_course->meeting_id = $meeting->id;
        $online_course->topic = $request->topic;
        $online_course->start_at = $request->start_at;
        if($request->hasFile('course_photo')){
            $file = $request->file('course_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/courses', $filename);
            $online_course->course_photo = $filename;
        }
        else{
            $online_course->course_photo = '';
            return $request;
        }
        $online_course->description = $request->description;
        $online_course->duration = $request->duration;
        $online_course->start_url = $meeting->start_url;
        $online_course->join_url = $meeting->join_url;
        $status = $online_course->save();

        if($status !== null)
            return redirect()->route('admin.online_classes.index')->with("message", "Course added successfully");
        else
            return redirect()->back()->with("error", "Something went wrong. Please try again!");

//        return redirect()->route('your route name')->with('Warning','Are you sure you want to delete? ');
//        return redirect()->route('your route name')->with('info','This is xyz information');

//            toastr()->success(trans('message.success'));
//                return redirect()->route('admin.online_classes.index');
//        }catch (\Exception $e){
//            return redirect()->back()->with(['error' => $e->getMessage()]);
//        }
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

    public function destroy(Request $request)
    {
//        try{
            $meeting = Zoom::meeting()->find($request->id);
            $meeting->delete();
            $status = OnlineClass::where('meeting_id', $request->id)->delete();

            if($status !== null)
                return redirect()->route('admin.online_classes.index')->with("message", "Course deleted successfully");
            else
                return redirect()->back()->with("error", "Something went wrong. Please try again!");

    //        return redirect()->route('your route name')->with('Warning','Are you sure you want to delete? ');
    //        return redirect()->route('your route name')->with('info','This is xyz information');
//            toastr()->success(trans('messages.Delete'));
//        }catch (\Exception $e){
//            return redirect()->back()->with(['error' => $e->getMessage()]);
//        }
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $search_results = OnlineClass::where('topic','LIKE', '%' . $search . '%')->paginate(5)->withQueryString();
        $online_classes = OnlineClass::all();

        return view('admin.online_classes.index', compact('search_results', 'online_classes'));
    }
}
