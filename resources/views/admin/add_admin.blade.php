@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin_Panel\Create_Admin</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid row">
            <div class="col-md-12 col-xs-12">
                <h5 style="color: darkorange; font-weight: bold; text-align: center; margin-top: 1%">إضافة آدمن جديد</h5>
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
            <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row" method="post" action="{{route('admin.store_admin')}}" enctype="multipart/form-data" style="margin-top: 3%">
                @csrf
                <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-4 offset-md-1 col-sm-12 col-12 form-group" style="border: solid 1px lightgrey; border-right: none; text-align: center; border-radius: 15px; opacity: 0.9">
                    <label style="margin-top: 10px">الصورة الشخصية</label>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmG7-UW9cHA-_5GWiVbM7OZEAepejGnpC0gQ&usqp=CAU" id="blah" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                    <input type='file' onchange="readURL(this)" name="profile_photo" class="input-field" value="">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 form-group" style="border: solid 1px lightgrey; border-left: none; text-align: right; border-radius: 15px; opacity: 0.9">
                    <label style="margin-top: 10px">الإسم</label>
                    <input type="text" class="form-control input-field" name="name" value="" required>
                    <label style="margin-top: 10px">البريد الإلكتروني</label>
                    <input type="email" class="form-control input-field" name="email" value="" required>
                    <label style="margin-top: 10px">كلمة السر</label>
                    <input type="password" class="form-control input-field" name="password" required>
                    <label style="margin-top: 10px">أعد كتابة كلمة السر</label>
                    <input type="password" class="form-control input-field" name="password_confirmation" required><br>
                    <input type="submit" class="btn btn-success btn-block" value="تحديث"><br>
                </div>
            </form>
        </div>
    </section>
@endsection