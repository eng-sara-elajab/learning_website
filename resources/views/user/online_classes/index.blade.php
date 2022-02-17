@extends('layouts.user')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Panel -<span style="opacity: 0.8; margin-left: 10px">Online Classes</span></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid row" style="background-color: whitesmoke">
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-12 row" style="margin-top: 5%; margin-bottom: 5%">
            @if(count($online_classes) > 0)
                <form class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6" action="/search" method="get">
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
                    <table class="table table-responsive table-hover" style="margin-top: 15px; text-align: center; margin-bottom: 4%">
                        <tr style="font-size: 20px; font-weight: bold">
                            <th style="border: 1px solid darkgrey; border-collapse:collapse">#</th>
                            <th style="border: 1px solid darkgrey; border-collapse:collapse">Instructor</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">Course Title</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">Description</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">Start At</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">Course duration (mins)</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">Course URL</th>
                        </tr>
                        @foreach($search_results as $search_result)
                            <tr>
                                <td>{{$search_result->id}}</td>
                                <td>{{$search_result->admin->name}}</td>
                                <td>{{$search_result->topic}}</td>
                                <td>{{$search_result->description}}</td>
                                <td>{{$search_result->start_at->format("Y/m/d H:i")}}</td>
                                <td>{{$search_result->duration}}</td>
                                <td><a href="{{$search_result->join_url}}" target="_blank" class="btn btn-danger">Join now</a></td>
                            </tr>
                        @endforeach
                    </table>
                    {{$search_results->links()}}
                @elseif(isset($search_results) && count($search_results) == 0)
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3 class="text-danger" style="margin-top: 50px; text-align: center">No result found</h3>
                    </div>
                @endif
                <table class="table table-responsive table-hover" style="text-align: center; margin-top: 3%">
                    <tr class="btn-info" style="font-size: 20px; font-weight: bold">
                        <th style="border: 1px solid darkgrey; border-collapse:collapse">#</th>
                        <th style="border: 1px solid darkgrey; border-collapse:collapse">Instructor</th>
                        <th style="border:1px solid darkgrey;border-collapse:collapse">Course Title</th>
                        <th style="border:1px solid darkgrey;border-collapse:collapse">Description</th>
                        <th style="border:1px solid darkgrey;border-collapse:collapse">Start At</th>
                        <th style="border:1px solid darkgrey;border-collapse:collapse">Course duration (mins)</th>
                        <th style="border:1px solid darkgrey;border-collapse:collapse">Course URL</th>
                    </tr>
                    @foreach($online_classes as $online_class)
                        <tr id="{{$online_class->id}}">
                            <td>{{$online_class->id}}</td>
                            <td>{{$online_class->admin->name}}</td>
                            <td>{{$online_class->topic}}</td>
                            <td>{{$online_class->description}}</td>
                            <td>{{$online_class->start_at->format("Y/m/d H:i")}}</td>
                            <td>{{$online_class->duration}}</td>
                            <td><a href="{{route('join_course', $online_class->id)}}" target="_blank" class="btn btn-danger">Join now</a></td>
                        </tr>
                    @endforeach
                </table>
                {{--{{$online_classes->links()}}--}}
            @else
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <h1 style="font-size: 30px; margin-top: 7%; text-align: center; color: darkorange">No courses Yet!</h1>
                </div>
            @endif
        </div>
    </div>
@endsection