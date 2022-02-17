@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Panel -<span style="opacity: 0.8; margin-left: 10px">Online Classes</span></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid row" style="background-color: whitesmoke">
        <div class="col-md-12 col-xs-12" style="margin-bottom: 2%; margin-left: 5%">
            {{--@if(Auth::guard('admin')->user() == $super_admin)--}}
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <a href="{{route('admin.online_classes.create')}}" class="btn btn-info pull-left">Add new course</a>
            </div>
            {{--@endif--}}
        </div>
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-12 row" style="margin-bottom: 5%">
            @if(count($online_classes) > 0)
                <form class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6" action="/admin/search" method="get">
                    <div class="input-group">
                        <input type="search" name="search" placeholder="Search for courses..." class="form-control">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </span>
                    </div>
                </form><br><br>
                @if(isset($search_results) && count($search_results) > 0)
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-primary" style="margin-top: 50px; text-align: center"><u>Search Results</u></h1>
                    </div>
                    <table class="table table-hover" style="margin-top: 15px; text-align: center; margin-bottom: 4%">
                        <tr class="btn-info" style="font-size: 20px; font-weight: bold; border-radius: 15px">
                            <th style="border: 1px solid darkgrey; border-collapse:collapse">#</th>
                            <th style="border: 1px solid darkgrey; border-collapse:collapse">Instructor</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">Course Title</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">Start At</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">Course duration (mins)</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">Course URL</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">Actions</th>
                        </tr>
                        @foreach($search_results as $search_result)
                            <tr>
                                <td>{{$search_result->id}}</td>
                                <td>{{$search_result->admin->name}}</td>
                                <td>{{$search_result->topic}}</td>
                                <td>{{$search_result->start_at->format("Y/m/d H:i")}}</td>
                                <td>{{$search_result->duration}}</td>
                                <td><a href="{{$search_result->join_url}}" target="_blank" class="btn btn-danger">Start now</a></td>
                                <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$search_result->id}}"><i class="fa fa-trash"></i></button></td>
                            </tr>
                        @endforeach
                    </table>
                    {{$search_results->links()}}
                @elseif(isset($search_results) && count($search_results) == 0)
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3 class="text-danger" style="margin-top: 50px; text-align: center">No result found</h3>
                    </div>
                @endif
                <table class="table table-hover" style="margin-top: 15px; text-align: center">
                    <tr class="btn-info" style="font-size: 20px; font-weight: bold; border-radius: 15px">
                        <th style="border: 1px solid darkgrey; border-collapse:collapse">#</th>
                        <th style="border: 1px solid darkgrey; border-collapse:collapse">Instructor</th>
                        <th style="border:1px solid darkgrey;border-collapse:collapse">Course Title</th>
                        <th style="border:1px solid darkgrey;border-collapse:collapse">Start At</th>
                        <th style="border:1px solid darkgrey;border-collapse:collapse">Course duration (mins)</th>
                        <th style="border:1px solid darkgrey;border-collapse:collapse">Course URL</th>
                        <th style="border:1px solid darkgrey;border-collapse:collapse">Actions</th>
                    </tr>
                    @foreach($online_classes as $online_class)
                        <tr>
                            <td>{{$online_class->id}}</td>
                            <td>{{$online_class->admin->name}}</td>
                            <td>{{$online_class->topic}}</td>
                            <td>{{$online_class->start_at->format("Y/m/d H:i")}}</td>
                            <td>{{$online_class->duration}}</td>
                            <td><a href="{{$online_class->start_url}}" target="_blank" class="btn btn-success">Start now</a></td>
                            <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$online_class->id}}"><i class="fa fa-trash"></i></button></td>
                        </tr>
                        <div class="modal fade" id="Delete_receipt{{$online_class->id}}" tabindex="-1" aria-labelledby="exampleModalLable">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h5 class="modal-title" id="exampleModalLable" style="text-align: center; color: darkred"> Delete {{$online_class->topic}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">x</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('admin.online_classes.destroy', $online_class)}}" method="Post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{$online_class->meeting_id}}">
                                                <h5>Are you sure to delete?</h5>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </table>
            @else
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <h1 style="font-size: 30px; margin-top: 7%; text-align: center; color: darkorange">No courses Yet!</h1>
                </div>
            @endif
        </div>
    </div>
@endsection