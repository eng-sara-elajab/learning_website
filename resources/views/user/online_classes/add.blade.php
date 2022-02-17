@extends('layouts.admin')

@section('content')
    <!-- /.content-header -->
    <div class="container-fluid row" style="background-color: whitesmoke">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">User Panel -<span style="opacity: 0.8; margin-left: 10px">Online Classes -</span><span style="opacity: 0.6; margin-left: 10px">Create</span></h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <form class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-12 row" method="post" action="{{route('admin.online_classes.store')}}" enctype="multipart/form-data" style="margin-bottom: 7%; text-align: right; border: solid 1px lightgrey; border-radius: 15px">
            @csrf
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 form-group">
                <label style="margin-top: 10px">القسم</label>
                <input type="number" class="form-control input-field" name="section_id" required>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 form-group">
                <label style="margin-top: 10px">الصف الدراسي</label>
                <input type="number" class="form-control input-field" name="classroom_id" required>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 form-group">
                <label style="margin-top: 10px">المرحلة الدراسية</label>
                <input type="number" class="form-control input-field" name="grade_id" required>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 form-group">
                <label style="margin-top: 10px">مدة الحصة بالدقائق</label>
                <input type="number" class="form-control input-field" name="duration" required>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 form-group">
                <label style="margin-top: 10px">تاريخ ووقت الحصة</label>
                <input type="datetime-local" class="form-control input-field" name="start_at" required>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 form-group">
                <label style="margin-top: 10px">عنوان الحصة</label>
                <input type="text" class="form-control input-field" name="topic" required>
            </div>
            <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4 col-4 offset-4 form-group">
                <input type="submit" class="btn btn-success btn-block" value="تأكيد">
            </div>
        </form>
    </div>
@endsection