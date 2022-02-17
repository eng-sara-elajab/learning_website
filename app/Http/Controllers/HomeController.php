<?php

namespace App\Http\Controllers;

use App\Contact;
use App\OnlineClass;
use App\Website_Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->website_information = Website_Information::first();
        $this->recent_courses = OnlineClass::orderBy('created_at', 'desc')->paginate(3);
        View::share(['website_information'=> $this->website_information, 'recent_courses'=> $this->recent_courses]);
    }

    public function courses(){
        $online_classes = OnlineClass::paginate(9);

        return view('user.courses', compact('online_classes'));
    }

    public function about_us(){
        return view('user.about_us');
    }

    public function contact_us(){
        return view('user.contact_us');
    }

    public function confirm_contact_us(Request $request){
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $status = $contact->save();

        if($status !== null)
            return redirect()->route("contact_us")->with("message","Message sent successfully. Thank you!");
        else
            return redirect()->route("contact_us")->with("error","Something went wrong. Please try again!");

//        return redirect()->route('your route name')->with('Warning','Are you sure you want to delete? ');
//        return redirect()->route('your route name')->with('info','This is xyz information');
    }

}
