@extends('layouts.user')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Panel -<span style="opacity: 0.8; margin-left: 10px">Edit Profile</span></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid row">
            <div class="col-md-12 col-xs-12" style="margin-top: 3%">
                <h4 style="color: darkorange; font-weight: bold; text-align: center; margin-top: 1%">Update your profile</h4>
            </div>
            <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row" method="post" action="{{route('confirm_edit_user')}}" enctype="multipart/form-data" style="margin-top: 5%">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-xl-6 offset-xl-1 col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-12 col-12 form-group" style="border: solid 1px lightgrey; border-left: none; text-align: left; border-radius: 15px; opacity: 0.9">
                    <label style="margin-top: 10px">Name</label>
                    <input type="text" class="form-control input-field" name="name" value="{{Auth::user()->name}}">
                    <label style="margin-top: 10px">Email Address</label>
                    <input type="email" class="form-control input-field" name="email" value="{{Auth::user()->email}}">
                    <label style="margin-top: 10px">Password</label>
                    <input type="password" class="form-control input-field" name="password" required>
                    <label style="margin-top: 10px">Re-type Password</label>
                    <input type="password" class="form-control input-field" name="password_confirmation" required><br>
                    <input type="submit" class="btn btn-success btn-block" value="Update"><br>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 form-group" style="border: solid 1px lightgrey; border-right: none; text-align: center; border-radius: 15px; opacity: 0.9">
                    <label style="margin-top: 10px">Profile Photo (Optional)</label>
                    @if(Auth::user()->profile_photo == null)
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmG7-UW9cHA-_5GWiVbM7OZEAepejGnpC0gQ&usqp=CAU" id="blah" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                    @else
                        <img src="images/profiles/{{Auth::user()->profile_photo}}" id="blah" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                    @endif
                    <input type="file" onchange="readURL(this)" name="profile_photo" class="input-field" value="">
                </div>
            </form>
        </div>
    </section>
@endsection