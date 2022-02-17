<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Adminuserchat;
use App\Adminusermessage;
use App\OnlineClass;
use App\Service;
use App\User;
use App\Website_Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{

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
        $website_information = Website_Information::first();
        $services = Service::all();
        $recent_courses = OnlineClass::orderBy('created_at', 'desc')->paginate(10);

        return view('user.home', compact('website_information', 'services', 'recent_courses'));
    }

    public function all_chats(){
        $auth_user = explode(' ', Auth::user()->name);
        $admin_user_messages = Adminusermessage::orderBy('id', 'desc')->get();
        $admin_user_chats = Adminuserchat::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        $admins = Admin::all();
//        $chats = Chat::where('starter_id', Auth::user()->id)->orwhere('owner_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
//        $users = null;
//        foreach ($chats as $chat){
//            $user = User::where('id', $chat->starter_id)->orwhere('id', $chat->owner_id)->get();
//            $users = $users.''.$user;
//        }

        $users = User::all();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();

        return view('user.chats', compact('auth_user', 'admin_user_messages', 'admin_user_chats', 'admins', 'users', 'no_of_admin_messages'));
    }

    public function one_chat($room_id){
        $messages = Adminusermessage::where('chat_room', $room_id)->get();
        foreach ($messages as $message){
            if($message->receiver_id == Auth::user()->id && $message->receiver_type == 'user'){
                $message->read_status = 'read';
                $message->save();
            }
        }
        $auth_user = explode(' ', Auth::user()->name);
        $chat = Adminuserchat::find($room_id);
        $chat_admin = Admin::where('id', $chat->admin_id)->first();
        $chat_user = User::where('id', $chat->user_id)->first();
        $users = User::all();
        $admin_new_messages = Adminusermessage::where('receiver_id', $this->currentUserId)->where('receiver_type', 'user')->where('read_status', 'unread')->get();

        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();

        return view('user.one_chat', compact('messages', 'auth_user', 'chat_admin', 'chat_user', 'users', 'admin_new_messages', 'no_of_admin_messages'));
    }

    public function message_reply(Request $request){
        $chat_room = Adminuserchat::where('id', $request->room_id)->first();
        $chat_room->updated_at = Date::now();
        $chat_room->save();
        $message = new Adminusermessage();
        $message->body = $request->body;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            if($extension == "docx" || $extension == "doc" || $extension == "pdf")
                $message->file_type = $extension;
            else
                return redirect()->back()->with(["error" => "File format is unknown!"]);
            $filename = time() . '.' . $extension;
//            File::delete(public_path('/images/logos/').$website_information->logo);
            $file->move('files', $filename);
            $message->file = $filename;
        }
        $message->sender_id = $request->user_id;
        $message->sender_type = 'user';
        $message->receiver_id = $request->admin_id;
        $message->receiver_type = 'admin';
        $message->chat_room = $request->room_id;
        $message->save();
        return redirect()->back();
    }

    public function view_file($message_id){
        $message = Adminusermessage::find($message_id);
        return view('user.view_file', compact( 'message'));
    }

    public function edit_user(){
        return view('user.edit_user');
    }

    public function confirm_edit_user(Request $request){
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password == $request->password_confirmation)
            $user->password = Hash::make($request->password);
        else
            return redirect()->back()->with('error', "Passwords don't match!");
        if($request->hasFile('profile_photo')){
            $file = $request->file('profile_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            File::delete(public_path('/images/profiles/').$user->profile_photo);
            $file->move('images/profiles', $filename);
            $user->profile_photo = $filename;
        }
        $user->save();

        $status = User::find($user->id);
        if($status !== null)
            return redirect()->back()->with("message","User updated successfully.");
        else
            return redirect()->back()->with("error","Something went wrong. Please try again!");

//        return redirect()->route('your route name')->with('Warning','Are you sure you want to delete? ');
//        return redirect()->route('your route name')->with('info','This is xyz information');
    }
}
