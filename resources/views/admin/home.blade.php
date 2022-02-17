@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Panel -<span style="opacity: 0.8; margin-left: 10px">Dashboard</span></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content row" style="margin-top: 5%; color: whitesmoke">
        <div id="carouselWebsiteInformationIndicators" style="background-color: #3f474e" class="carousel slide col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1 row" data-ride="carousel" data-interval="2000">
            <ol class="carousel-indicators">
                <li data-target="#carouselWebsiteInformationIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselWebsiteInformationIndicators" data-slide-to="1"></li>
                <li data-target="#carouselWebsiteInformationIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" style="margin-top: 2%; margin-bottom: 4%">
                <div class="carousel-item active" style="height: 200px">
                    <div class="carousel-caption">
                        <h5>Mission</h5>
                        <p>
                            @if(strlen($website_information->mission) < 150)
                                {{$website_information->mission}}
                            @else
                                {{Str::limit($website_information->mission, 150)}}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="carousel-item" style="height: 200px">
                    <div class="carousel-caption">
                        <h5>Vision</h5>
                        <p>
                            @if(strlen($website_information->vision) < 150)
                                {{$website_information->vision}}
                            @else
                                {{Str::limit($website_information->vision, 150)}}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="carousel-item" style="height: 200px">
                    <div class="carousel-caption">
                        <h5>Description</h5>
                        <p>
                            @if(strlen($website_information->description) < 150)
                                {{$website_information->description}}
                            @else
                                {{Str::limit($website_information->description, 150)}}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselWebsiteInformationIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselWebsiteInformationIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <section class="content row" style="margin-top: 10%; margin-bottom: 10%">
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-12 row">
            @if(count($services) > 0)
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h3 class="title text-center">Our best Services</h3><hr style="width: 40%; margin-left: 30%"><br>
                    <div class="titleHR"><span></span></div>
                </div>
                @foreach($services as $service)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12" style="margin-top: 3%">
                        <a data-toggle="modal" data-target="#edit_service{{$service->id}}" title="{{Auth::guard('admin')->user()->id == 1? 'Click to edit' : ''}}" style="text-decoration: none">
                            @if($service->image == null)
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS54Wgf1w-a8cKOVac7eJJh73K2q3jg8-aHZg&usqp=CAU" style="height: 150px; width: 94%; margin-left: 3%; border-radius: 100%">
                            @else
                                <img src="/images/services/{{$service->image}}" style="height: 150px; width: 94%; margin-left: 3%; border-radius: 100%">
                            @endif
                            <h6 style="text-align: center; font-weight: bold; margin-top: 20px">{{$service->name}}</h6>
                            <p style="text-align: center; font-size: 12px; margin-top: 15px">{{$service->body}}</p>
                        </a>
                    </div>
                    <div class="modal fade" id="edit_service{{$service->id}}" tabindex="-1" aria-labelledby="exampleModalLable">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h5 class="modal-title" id="exampleModalLable" style="text-align: center; color: darkred"> Update {{$service->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">x</span></button>
                                    </div>
                                    <div class="modal-body row">
                                        <form action="{{route('admin.update_service')}}" enctype="multipart/form-data" class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 form-group" method="Post">
                                            @csrf
                                            {{method_field('PUT')}}
                                            <input type="hidden" name="service_id" value="{{$service->id}}">
                                            <label style="display: block">Service name</label>
                                            <input type="text" name="name" class="form-control" value="{{$service->name}}" required><br>
                                            <label style="display: block">Body</label>
                                            <textarea name="body" class="form-control" style="height: 100px" required>{{$service->body}}</textarea><br>

                                            <label style="display: block">Image</label>
                                            <input type="file" onchange="readURL(this)" name="image" class="input-field form-control">
                                            {{--@if($service->image == null)--}}
                                                {{--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS54Wgf1w-a8cKOVac7eJJh73K2q3jg8-aHZg&usqp=CAU" id="blahh" style="width: 100%; height: 150px; margin-top: 10px; margin-bottom: 10px">--}}
                                            {{--@else--}}
                                                {{--<img src="/images/services/{{$service->image}}" id="blah" style="width: 100%; height: 150px; margin-top: 10px; margin-bottom: 10px">--}}
                                            {{--@endif--}}
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary">Update</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    @if(count($recent_courses) > 0)
        <section class="content row" style="margin-top: 5%; margin-bottom: 5%">
            <div id="carouselCoursesIndicators" class="carousel slide col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1" data-ride="carousel" data-interval="3000">
                <ol class="carousel-indicators">
                    <li data-target="#carouselCoursesIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselCoursesIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselCoursesIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @foreach($recent_courses as $recent_course)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img class="d-block w-100" src="/images/courses/{{$recent_course->course_photo}}" style="height: 350px" alt="Second slide">
                            <div class="carousel-caption">
                                <h5>{{$recent_course->topic}}</h5>
                                <p>{{$recent_course->description}}</p>
                            </div>
                        </div>
                    @endforeach
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://placeimg.com/1080/500/nature" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselCoursesIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselCoursesIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
    @endif

@endsection