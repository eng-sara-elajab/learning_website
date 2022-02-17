<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Admin\FullCalenderController;
use App\Http\Controllers\CalenderController;
use App\OnlineClass;
use App\Service;
use App\Website_Information;

///////////////////////////////////////////////////////Visitor Routes///////////////////////////////////////////////////////

Route::get('/', function () {
    $website_information = Website_Information::first();
    $recent_courses = OnlineClass::orderBy('created_at', 'desc')->paginate(3);
    $services = Service::all();

    return view('welcome', compact('website_information', 'recent_courses', 'services'));
});

Route::get('/courses', 'HomeController@courses')->name('courses');

Route::get('/about_us', 'HomeController@about_us')->name('about_us');

Route::get('/contact_us', 'HomeController@contact_us')->name('contact_us');
Route::post('/confirm_contact_us', 'HomeController@confirm_contact_us')->name('confirm_contact_us');

///////////////////////////////////////////////////////User Authentication Routes///////////////////////////////////////////////////////

Auth::routes();

///////////////////////////////////////////////////////User Routes///////////////////////////////////////////////////////

Route::get('/home', 'UserController@index')->name('home');

Route::get('/chats', 'UserController@all_chats')->name('chats');
Route::get('/one_chat/{room_id}','UserController@one_chat')->name('one_chat');
Route::post('/message_reply','UserController@message_reply')->name('message_reply');

Route::get('/admin/one_chat/{chat_room_id}','UserController@admin_user_one_chat');
Route::post('/new_message_reply/{chat_room_id}/{sender_id}','UserController@new_message_reply');
Route::post('/new_admin_user_message_reply/{chat_room_id}/{chat_user_id}/{chat_admin_id}','UserController@new_admin_user_message_reply');

Route::get('/view_file/{id}', 'UserController@view_file')->name('view_file');

Route::get('/edit_user', 'UserController@edit_user')->name('edit_user');
Route::PUT('/confirm_edit_user', 'UserController@confirm_edit_user')->name('confirm_edit_user');

Route::resource('online_classes', 'OnlineClassController');

Route::get('/search', 'OnlineClassController@search');

Route::get('/join_course/{id}', 'OnlineClassController@join_course')->name('join_course');

Route::get('full-calender', [CalenderController::class, 'index'])->name('full-calendar');

///////////////////////////////////////////////////////Admin Routes///////////////////////////////////////////////////////

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){

    //////////////////////////Admin Authentication Routes//////////////////////////

    Route::namespace('Auth')->group(function(){
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');
        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
    });

    Route::get('/home','HomeController@index')->name('home');

    Route::put('/update_service', 'HomeController@update_service')->name('update_service');

    Route::get('/chats', 'AdminController@all_chats')->name('chats');
    Route::post('/create_chat','AdminController@create_chat')->name('create_chat');
    Route::get('/one_chat/{chat_room_id}','AdminController@one_chat')->name('one_chat');
    Route::post('/message_reply','AdminController@message_reply')->name('message_reply');

    Route::get('/view_file/{id}', 'AdminController@view_file')->name('view_file');

    Route::get('/contacts', 'AdminController@contacts')->name('contacts');
    Route::put('/mark_as_read', 'AdminController@mark_as_read')->name('mark_as_read');

    Route::get('/admins_list', 'AdminController@admins_list')->name('admins_list');

    Route::get('/add_admin', 'AdminController@add_admin')->name('add_admin');
    Route::post('/store_admin', 'AdminController@store_admin')->name('store_admin');

    Route::get('/users_list', 'AdminController@users_list')->name('users_list');

    Route::get('/edit_admin/{id}', 'AdminController@edit_admin')->name('edit_admin');
    Route::put('/update_admin/{id}', 'AdminController@update_admin')->name('update_admin');
    Route::get('/destroy_admin/{id}', 'AdminController@destroy_admin')->name('destroy_admin');

    Route::get('/edit_user/{id}', 'AdminController@edit_user')->name('edit_user');
    Route::put('/update_user/{id}', 'AdminController@update_user')->name('update_user');
    Route::get('/destroy_user/{id}', 'AdminController@destroy_user')->name('destroy_user');

    Route::get('/website_information', 'AdminController@website_information')->name('website_information');
    Route::put('/update_website_information', 'AdminController@update_website_information')->name('update_website_information');

    Route::resource('online_classes', 'OnlineClassController');

    Route::get('/search', 'OnlineClassController@search');

    Route::get('full-calender', [FullCalenderController::class, 'index'])->name('full-calendar');

    Route::post('full-calender/action', [FullCalenderController::class, 'action']);
});