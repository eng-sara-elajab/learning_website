<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Adminuserchat;
use App\Adminusermessage;
use App\Contact;
use App\Http\Controllers\Controller;
use App\User;
use App\Website_Information;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
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

    public function admins_list(){
        $admins = Admin::all();

        return view('admin.admins_list', compact('admins'));
    }

    public function add_admin(){
        return view('admin.add_admin');
    }

    public function store_admin(Request $request){
        $admins = Admin::all();

        $admin = new Admin();
        $admin->name = $request->name;
        foreach ($admins as $one_admin){
            if($request->email == $one_admin->email)
                return redirect()->back()->with("error", "Email Exists!");
            else
                $admin->email = $request->email;
        }
        if($request->password == $request->password_confirmation)
            $admin->password = Hash::make($request->password);
        else
            return redirect()->back()->with("error", "Passwords don't match!");
        if($request->hasFile('profile_photo')){
            $file = $request->file('profile_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
//            File::delete(public_path('/images/profiles/').$admin->profile_photo);
            $file->move('images/profiles', $filename);
            $admin->profile_photo = $filename;
        }
        $status = $admin->save();

        if($status !== null)
            return redirect()->back()->with("message","Admin Added successfully");
        else
            return redirect()->back()->with("error","Something went wrong. Please try again!");

//        return redirect()->route('your route name')->with('Warning','Are you sure you want to delete? ');
//        return redirect()->route('your route name')->with('info','This is xyz information');
    }

    public function edit_admin($id){
        $admin = Admin::find($id);

        return view('admin.edit_admin', compact('admin'));
    }

    public function update_admin(Request $request, $id){
        $admin = Admin::find($id);

        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->password == $request->password_confirmation)
            $admin->password = Hash::make($request->password);
        else
            return redirect()->back()->with("error", "Passwords don't match!");
        if($request->hasFile('profile_photo')){
            $file = $request->file('profile_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            File::delete(public_path('/images/profiles/').$admin->profile_photo);
            $file->move('images/profiles', $filename);
            $admin->profile_photo = $filename;
        }
        $status = $admin->save();

        if($status !== null)
            return redirect()->back()->with("message","Admin updated successfully");
        else
            return redirect()->back()->with("error","Something went wrong. Please try again!");

//        return redirect()->route('your route name')->with('Warning','Are you sure you want to delete? ');
//        return redirect()->route('your route name')->with('info','This is xyz information');

    }

    public function destroy_admin($id){
        $status = Admin::find($id)->delete();
        $admins = Admin::all();

        if($status !== null)
            return redirect()->back()->with(["message" => "Admin deleted successfully", "admins" => $admins]);
        else
            return redirect()->route('admin/admins_list')->with(["error" => "Something went wrong. Please try again!", "admins" => $admins]);

//        return redirect()->route('your route name')->with('Warning','Are you sure you want to delete? ');
//        return redirect()->route('your route name')->with('info','This is xyz information');
    }

    public function users_list(){
        $users = User::all();

        return view('admin.users_list', compact('users'));
    }

    public function edit_user($id){
        $user = User::find($id);

        return view('admin.edit_user', compact('user'));
    }

    public function update_user(Request $request, $id){
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password == $request->password_confirmation)
            $user->password = Hash::make($request->password);
        else
            return redirect()->back()->with("error", "Passwords don't match!");
        if($request->hasFile('profile_photo')){
            $file = $request->file('profile_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            File::delete(public_path('/images/profiles/').$user->profile_photo);
            $file->move('images/profiles', $filename);
            $user->profile_photo = $filename;
        }
        $status = $user->save();
        if($status !== null)
            return redirect()->back()->with("message", "User updated successfully");
        else
            return redirect()->back()->with("error", "Something went wrong. Please try again!");

//        return redirect()->route('your route name')->with('Warning','Are you sure you want to delete? ');
//        return redirect()->route('your route name')->with('info','This is xyz information');
    }

    public function destroy_user($id){
        $status = User::find($id)->delete();
        $users = User::all();

        if($status !== null)
            return redirect()->route('admin/users_list')->with(["message" => "User deleted successfully", "users" => $users]);
        else
            return redirect()->route('admin/users_list')->with(["error" => "Something went wrong. Please try again!", "users" => $users]);

//        return redirect()->route('your route name')->with('Warning','Are you sure you want to delete? ');
//        return redirect()->route('your route name')->with('info','This is xyz information');
    }

    public function all_chats (){
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $admin_user_messages = Adminusermessage::orderBy('id', 'desc')->get();
        $admin_user_chats = Adminuserchat::where('admin_id', Auth::guard('admin')->user()->id)->orderBy('updated_at', 'desc')->paginate(10);
        $admins = Admin::all();
        $users = User::all();
//        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.chats', compact('admin_user_messages','admin_user_chats','admins', 'users'));
    }

    public function create_chat(Request $request){
        $admin = Auth::guard('admin')->user();
        $user_id = $request->user_id;
        $chat = Adminuserchat::where('admin_id', $admin->id)->where('user_id', $user_id)->first();

        if($chat == null){
            $new_chat = new Adminuserchat();
            $new_chat->admin_id = $admin->id;
            $new_chat->user_id = $user_id;
            $new_chat->save();

            $message = new Adminusermessage();
            $message->body = $request->body;
            $message->sender_id = $admin->id;
            $message->sender_type = 'admin';
            $message->receiver_id = $user_id;
            $message->receiver_type = 'user';
            $message->chat_room = $new_chat->id;
            $message->save();
        }
        else{
            $message = new Adminusermessage();
            $message->body = $request->body;
            $message->sender_id = $admin->id;
            $message->sender_type = 'admin';
            $message->receiver_id = $user_id;
            $message->receiver_type = 'user';
            $message->chat_room = $chat->id;
            $message->save();
        }
        return redirect()->back()->with('success', 'Message Sent');
    }

    public function one_chat($chat_room_id){
        $admin_user_messages = Adminusermessage::where('chat_room', $chat_room_id)->orderBy('id', 'asc')->get();
        foreach ($admin_user_messages as $admin_user_message){
            if($admin_user_message->receiver_id == Auth::guard('admin')->user()->id && $admin_user_message->receiver_type == 'admin'){
                $admin_user_message->read_status = 'read';
                $admin_user_message->save();
            }
        }
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $admin_user_chat = Adminuserchat::find($chat_room_id);
        $chat_admin = Admin::where('id', $admin_user_chat->admin_id)->first();
        $chat_user = User::where('id', $admin_user_chat->user_id)->first();
        $users = User::all();
        $user_new_messages = Adminusermessage::where(['receiver_id'=> $this->currentAdminId, 'receiver_type' => 'admin', 'read_status' => 'unread'])->get();
//        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.one_chat', compact('admin_user_messages','no_of_user_messages','admin_user_chat', 'chat_admin', 'chat_user', 'users', 'user_new_messages'));
    }

    public function message_reply(Request $request){
        $admin_user_message = new Adminusermessage();
        $admin_user_message->body = $request->body;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            if($extension == "docx" || $extension == "doc" || $extension == "pdf")
                $admin_user_message->file_type = $extension;
            else
                return redirect()->back()->with(["error" => "File format is unknown!"]);
            $filename = time() . '.' . $extension;
//            File::delete(public_path('/images/logos/').$website_information->logo);
            $file->move('files', $filename);
            $admin_user_message->file = $filename;
        }
        $admin_user_message->sender_id = $request->admin_id;
        $admin_user_message->sender_type = 'admin';
        $admin_user_message->receiver_id = $request->user_id;
        $admin_user_message->receiver_type = 'user';
        $admin_user_message->chat_room = $request->room_id;
        $admin_user_message->save();
        return redirect()->back();
    }

    public function view_file($message_id){
        $message = Adminusermessage::find($message_id);
        return view('admin.view_file', compact( 'message'));
    }

    public function contacts(){
        $contacts = Contact::orderBy("id", "desc")->paginate(7);
        return view('admin.contacts', compact('contacts'));
    }

    public function mark_as_read(Request $request){
        $contact = Contact::find($request->contact_id);
        $contact->status = "read";
        $contact->save();

        return redirect()->back();
    }

    public function website_information(){
        $website_information = Website_Information::first();

        return view('admin.website_information', compact('website_information'));
    }

    public function update_website_information(Request $request){
        $website_information = Website_Information::first();
        $website_information->name = $request->name;
        $website_information->phone = $request->phone;
        $website_information->email = $request->email;
        $website_information->address = $request->address;
        $website_information->facebook_url = $request->facebook_url;
        $website_information->twitter_url = $request->twitter_url;
        $website_information->snapchat_url = $request->snapchat_url;
        $website_information->instgram_url = $request->instgram_url;
        $website_information->description = $request->description;
        $website_information->vision = $request->vision;
        $website_information->mission = $request->mission;
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            File::delete(public_path('/images/logos/').$website_information->logo);
            $file->move('images/logos', $filename);
            $website_information->logo = $filename;
        }
        $status = $website_information->save();
        if($status !== null)
            return redirect()->back()->with(["message" => "Website information successfully", "website_information" => $website_information]);
        else
            return redirect()->back()->with(["error" => "Something went wrong. Please try again!", "website_information" => $website_information]);

//        return redirect()->route('your route name')->with('Warning','Are you sure you want to delete? ');
//        return redirect()->route('your route name')->with('info','This is xyz information');
    }

}
