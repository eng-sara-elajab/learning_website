<?php

namespace App\Http\Controllers\Admin;

use App\Adminusermessage;
use App\Contact;
use App\Http\Controllers\Controller;
use App\OnlineClass;
use App\Service;
use App\Website_Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{

    protected $currentAdminId;

    public function __construct(){
        $this->middleware('auth:admin');

        $this->middleware(function ($request, $next) {
            $this->currentAdminId = Auth::guard('admin')->user()->id;
            $this->website_information = Website_Information::first();
            $this->user_new_messages = Adminusermessage::where(['receiver_id'=> $this->currentAdminId, 'receiver_type' => 'admin', 'read_status' => 'unread'])->get();
            $this->new_contacts = Contact::where("status", "unread")->get();
            $this->recent_courses = OnlineClass::orderBy('created_at', 'desc')->paginate(10);

            View::share(['website_information' => $this->website_information,'user_new_messages' => $this->user_new_messages,
                'new_contacts'=> $this->new_contacts, 'recent_courses' => $this->recent_courses]);

            return $next($request);
        });
    }

    public function index(){
        $services = Service::all();

        return view('admin.home', compact('services'));
    }

    public function update_service(Request $request){
//        return $request;
        $service = Service::find($request->service_id);

        $service->name = $request->name;
        $service->body = $request->body;
//        $service->image = $request->image;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            File::delete(public_path('/images/services/').$service->image);
            $file->move('images/services', $filename);
            $service->image = $filename;
        }
        $status = $service->save();

        if($status !== null)
            return redirect()->back()->with("message","Service Updated successfully");
        else
            return redirect()->back()->with("error","Something went wrong. Please try again!");
    }
}
