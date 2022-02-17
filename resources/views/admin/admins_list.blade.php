@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Panel -<span style="opacity: 0.8; margin-left: 10px">Admins List</span></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid row" style="background-color: whitesmoke">
        <div class="col-md-10 offset-md-1 col-xs-10 offset-xs-1" style="margin-bottom: 1%; margin-top: 70px">
            {{--@if(Auth::guard('admin')->user() == $super_admin)--}}
                <div class="col-md-4 col-xs-4">
                    <a href="{{route('admin.add_admin')}}" class="btn btn-default" style="color: orange">Create Admin</a>
                </div>
            {{--@endif--}}
        </div>
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-12 row" style="margin-bottom: 5%">
            <div class="col-md-12 col-xs-12">
                <h5 style="color: darkorange; font-weight: bold; text-align: center; margin-top: 1%">Admins details</h5>
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
            @if(count($admins) > 0)
                <table class="table table-hover" style="margin-top: 15px; text-align: center">
                    <tr class="btn-info" style="font-size: 20px; font-weight: bold">
                        <th style="border: 1px solid darkgrey; border-collapse:collapse">#</th>
                        <th style="border: 1px solid darkgrey; border-collapse:collapse">Admin name</th>
                        <th style="border: 1px solid darkgrey; border-collapse:collapse">Email address</th>
                        <th style="border: 1px solid darkgrey; border-collapse:collapse">Account created at</th>
                        <th style="border:1px solid darkgrey;border-collapse:collapse">Profile photo</th>
                    </tr>
                    @foreach($admins as $admin)
                        <tr>
                            <td>{{$admin->id}}</td>
                            <td><a href="{{Auth::guard('admin')->user()->id == 1 ? route('admin.edit_admin', $admin->id) : '#'}}" title="إضغط لتعديل بيانات الآدمن">{{$admin->name}}</a></td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->created_at}}</td>
                            <td>
                                @if($admin->profile_photo == null)
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWjk7gCpsGYs37iLpxNRx_1b0E7j_iXS2rsg&usqp=CAU" style="width: 80px; height: 80px">
                                @else
                                    <img src="/images/profiles/{{$admin->profile_photo}}" style="width: 80px; height: 80px">
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1" style="margin-top: 5%; margin-bottom: 5%">
                    <h1 class="text-center text-danger"><u>No Admins Available yet!</u></h1>
                </div>
            @endif
        </div>
    </div>
@endsection