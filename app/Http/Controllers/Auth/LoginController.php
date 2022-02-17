<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\OnlineClass;
use App\Providers\RouteServiceProvider;
use App\Website_Information;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->website_information = Website_Information::first();
        $this->recent_courses = OnlineClass::orderBy('created_at', 'desc')->paginate(3);
        View::share(['website_information'=> $this->website_information, 'recent_courses'=> $this->recent_courses]);
    }
}
