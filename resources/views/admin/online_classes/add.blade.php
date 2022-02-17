@extends('layouts.admin')

@section('content')
    <!-- /.content-header -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Panel -<span style="opacity: 0.8; margin-left: 10px">Online Classes -</span><span style="opacity: 0.6; margin-left: 10px">Create</span></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid row" style="background-color: whitesmoke">
        <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row" method="post" action="{{route('admin.online_classes.store')}}" enctype="multipart/form-data" style="margin-top: 5%">
            @csrf
            <div class="col-xl-6 offset-xl-1 col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-12 col-12 form-group" style="border: solid 1px lightgrey; border-right: none; text-align: left; border-radius: 15px; opacity: 0.9">
                <label style="margin-top: 10px; margin-left: 5px">Course title</label>
                <input type="text" class="form-control input-field" name="topic" required>

                <label style="margin-top: 10px; margin-left: 5px">Course starting time</label>
                <input type="datetime-local" class="form-control input-field" name="start_at" required>

                <label style="margin-top: 10px; margin-left: 5px">Course duration (minutes)</label>
                <input type="number" class="form-control input-field" name="duration" value="" required>

                <label style="margin-top: 10px; margin-left: 5px">Course description</label>
                <textarea class="form-control input-field" name="description" style="height: 60px" required></textarea><br>

                <input type="submit" class="btn btn-success btn-block" value="Submit"><br>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 form-group" style="border: solid 1px lightgrey; border-left: none; text-align: center; border-radius: 15px; opacity: 0.9">
                <label style="margin-top: 10px">Course photo</label>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmG7-UW9cHA-_5GWiVbM7OZEAepejGnpC0gQ&usqp=CAU" id="blah" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                <input type='file' onchange="readURL(this)" name="course_photo" class="input-field" value="" dir="rtl" required>
            </div>
        </form>
    </div>
@endsection