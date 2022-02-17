@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Panel -<span style="opacity: 0.8; margin-left: 10px">Users List</span></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid row" style="background-color: whitesmoke">
        <div class="col-md-10 offset-md-1 col-xs-10 offset-xs-1" style="margin-bottom: 1%; margin-top: 70px">
            {{--@if(Auth::guard('admin')->user() == $super_admin)--}}
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <a href="{{route('admin.online_classes.create')}}" class="btn btn-info">Start Zoom Meeting</a>
            </div>
            {{--@endif--}}
        </div>
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-12 row" style="margin-bottom: 5%">
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
            @if(count($users) > 0)
                <div class="col-md-12 col-xs-12">
                    <h5 style="color: darkorange; font-weight: bold; text-align: center; margin-top: 1%">All users informations</h5>
                </div>
                <table class="table table-hover" style="margin-top: 15px; text-align: center">
                    <tr class="btn-info" style="font-size: 20px; font-weight: bold">
                        <th style="border: 1px solid darkgrey; border-collapse:collapse">#</th>
                        <th style="border: 1px solid darkgrey; border-collapse:collapse">Username</th>
                        <th style="border: 1px solid darkgrey; border-collapse:collapse">Email address</th>
                        <th style="border: 1px solid darkgrey; border-collapse:collapse">User created at</th>
                        <th style="border:1px solid darkgrey;border-collapse:collapse">Profile photo</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><a href="{{Auth::guard('admin')->user()->id == 1 ? route('admin.edit_user', $user->id) : '#'}}" title="إضغط لتعديل بيانات المستخدم">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                @if($user->profile_photo == null)
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWjk7gCpsGYs37iLpxNRx_1b0E7j_iXS2rsg&usqp=CAU" style="width: 80px; height: 80px">
                                @else
                                    <img src="/images/profiles/{{$user->profile_photo}}" style="width: 80px; height: 80px">
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1" style="margin-top: 5%; margin-bottom: 5%">
                    <h1 class="text-center text-danger"><u>No Users Added yet!</u></h1>
                </div>
            @endif
        </div>
    </div>
@endsection