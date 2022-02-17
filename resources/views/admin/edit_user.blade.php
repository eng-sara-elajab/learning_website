@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Panel -<span style="opacity: 0.8; margin-left: 10px">Edit User</span></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid row">
            <div class="col-md-12 col-xs-12">
                <h5 style="color: darkorange; font-weight: bold; text-align: center; margin-top: 1%"> Edit {{$user->name}} information</h5>
            </div>
            @if (session('error'))
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <p style="color: red; font-family: Cambria; font-size: 20px; text-align: center; margin-top: 20px">{{ session('error') }}</p>
                </div>
            @endif
            @if (session('success'))
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <p style="color: green; font-family: Cambria; font-size: 20px; text-align: center; margin-top: 20px">{{ session('success') }}</p>
                </div>
            @endif
            <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row" method="post" action="{{route('admin.update_user', $user->id)}}" enctype="multipart/form-data" style="margin-top: 3%">
                @csrf
                {{ method_field('PUT') }}
                <div class="col-xl-6 offset-xl-1 col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-12 col-12 form-group" style="border: solid 1px lightgrey; border-right: none; text-align: left; border-radius: 15px; opacity: 0.9">
                    <label style="margin-top: 10px; margin-left: 5px">Username</label>
                    <input type="text" class="form-control input-field" name="name" value="{{$user->name}}">
                    <label style="margin-top: 10px; margin-left: 5px">Email address</label>
                    <input type="email" class="form-control input-field" name="email" value="{{$user->email}}">
                    <label style="margin-top: 10px; margin-left: 5px">Password</label>
                    <input type="password" class="form-control input-field" name="password" required>
                    <label style="margin-top: 10px; margin-left: 5px">Re-type password</label>
                    <input type="password" class="form-control input-field" name="password_confirmation" required><br>
                    <input type="submit" class="btn btn-success btn-block" value="Submit"><br>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 form-group" style="border: solid 1px lightgrey; border-left: none; text-align: center; border-radius: 15px; opacity: 0.9">
                    <label style="margin-top: 10px">Profile photo</label>
                    @if($user->profile_photo == null)
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmG7-UW9cHA-_5GWiVbM7OZEAepejGnpC0gQ&usqp=CAU" id="blah" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                    @else
                        <img src="/images/profiles/{{$user->profile_photo}}" id="blah" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                    @endif
                    <input type='file' onchange="readURL(this)" name="profile_photo" class="input-field" value="">
                </div>
            </form>
            <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4 col-4 offset-4">
                <a href="{{route('admin.destroy_user', $user->id)}}" class="btn btn-danger btn-block">Delete {{$user->name}}</a>
            </div>
        </div>
    </section>
@endsection