<?php

namespace App\Http\Controllers;

use App\Adminusermessage;
use App\Event;
use App\UserCourse;
use App\Website_Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CalenderController extends Controller
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

    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->where('user_id', Auth::user()->id)
                ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
        }
        return view('user.full-calender');
    }
}
