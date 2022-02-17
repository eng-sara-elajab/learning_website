<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Website_Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->website_information = Website_Information::first();
        View::share('website_information', $this->website_information);
    }

    public function showLoginForm()
    {
        if(Auth::guard('admin')->user()){
            return redirect('admin/home');
        }
        return view('auth.admin.login',[
            'title' => 'Login',
            'loginRoute' => 'admin.login',
            'forgotPasswordRoute' => 'password.request',
        ]);
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:admins|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }

    public function login(Request $request)
    {
        $this->validator($request);

        if(Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authentication passed...
            return redirect()
                ->intended(route('admin.home'))
                ->with('status','You are Logged in as Admin!');
        }

        //Authentication failed...
        return $this->loginFailed();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.login')
            ->with('status','Admin has been logged out!');
    }

    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }
}
