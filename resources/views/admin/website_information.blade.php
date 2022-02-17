@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Panel -<span style="opacity: 0.8; margin-left: 10px">Website Information</span></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid row">
            <div class="col-md-12 col-xs-12">
                <h5 style="color: darkorange; font-weight: bold; text-align: center; margin-top: 1%"> Edit Website information</h5>
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
            <form class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-12 row" method="post" action="{{route('admin.update_website_information')}}" enctype="multipart/form-data" style="margin-top: 3%; border: solid 1px lightgrey; border-radius: 10px; margin-bottom: 3%">
                @csrf
                {{ method_field('PUT') }}
                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-12 col-12 form-group">
                    <label style="margin-top: 10px; margin-left: 5px">Website Name</label>
                    <input type="text" class="form-control input-field" name="name" style="border-radius: 10px" value="{{$website_information->name}}">
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 form-group">
                    <label style="margin-top: 10px; margin-left: 5px">Phone Number</label>
                    <input type="tel" class="form-control input-field" name="phone" style="border-radius: 10px" value="{{$website_information->phone}}">
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-12 col-12 form-group">
                    <label style="margin-top: 10px; margin-left: 5px">Email Address</label>
                    <input type="email" class="form-control input-field" name="email" style="border-radius: 10px" value="{{$website_information->email}}">
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 form-group">
                    <label style="margin-top: 10px; margin-left: 5px">Address</label>
                    <input type="text" class="form-control input-field" name="address" style="border-radius: 10px" value="{{$website_information->address}}">
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-12 col-12 form-group">
                    <label style="margin-top: 10px; margin-left: 5px">Facebook Link</label>
                    <input type="text" class="form-control input-field" name="facebook_url" style="border-radius: 10px" value="{{$website_information->facebook_url}}">
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 form-group">
                    <label style="margin-top: 10px; margin-left: 5px">Twitter Link</label>
                    <input type="text" class="form-control input-field" name="twitter_url" style="border-radius: 10px" value="{{$website_information->twitter_url}}">
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-12 col-12 form-group">
                    <label style="margin-top: 10px; margin-left: 5px">Snapchat Link</label>
                    <input type="text" class="form-control input-field" name="snapchat_url" style="border-radius: 10px" value="{{$website_information->snapchat_url}}">
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 form-group">
                    <label style="margin-top: 10px; margin-left: 5px">Instgram Link</label>
                    <input type="text" class="form-control input-field" name="instgram_url" style="border-radius: 10px" value="{{$website_information->instgram_url}}">
                </div>
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-12 form-group">
                    <label style="margin-top: 10px; margin-left: 5px">Website Description</label>
                    <textarea class="form-control input-field" name="description" style="border-radius: 10px">{{$website_information->description}}</textarea>
                </div>
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-12 form-group">
                    <label style="margin-top: 10px; margin-left: 5px">Website vision</label>
                    <textarea class="form-control input-field" name="vision" style="border-radius: 10px">{{$website_information->vision}}</textarea>
                </div>
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-12 form-group">
                    <label style="margin-top: 10px; margin-left: 5px">Website mission</label>
                    <textarea class="form-control input-field" name="mission" style="border-radius: 10px">{{$website_information->mission}}</textarea>
                </div>
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-12 form-group">
                    <label style="margin-top: 10px; margin-left: 5px; display: block">Profile photo</label>
                    @if($website_information->logo == null)
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0zKc2imsHbSQDL13AaM7Mg_-r8fuqe4pjCg&usqp=CAU" id="blah" style="width: 70%; height: 300px; margin-top: 10px; margin-bottom: 10px; margin-left: 15%">
                    @else
                        <img src="/images/logos/{{$website_information->logo}}" id="blah" style="width: 70%; height: 300px; margin-top: 10px; margin-bottom: 10px; margin-left: 15%">
                    @endif
                    <input type='file' onchange="readURL(this)" name="logo" class="input-field">
                </div>
                <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 col-4 form-group">
                    <input type="submit" class="btn btn-success btn-block" value="Submit" style="margin-top: 20px"><br>
                </div>
            </form>
        </div>
    </section>
@endsection