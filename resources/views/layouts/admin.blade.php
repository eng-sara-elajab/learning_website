<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{$website_information->name}}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('adminlte/plugins/jqvmap/jqvmap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('adminlte/plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('adminlte/plugins/summernote/summernote-bs4.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>
    <style>
        .chat-list{
            background-color: #F5F5F5;
            text-align: right;
            float:left;
            width:1000px;
            height: 130px;
            opacity: 0.6;
        }
        .chat-list:hover{
            opacity: 1;
        }
        .chat-sender{
            font-size: 18px;
            font-family: 'Segoe UI';
            color: #0275d8;
        }
        .chat-sender-image{
            border-radius: 50%;
            width: 60px;
            height: 60px;
            margin-right: 50px;
        }
        .chat-body{
            font-size: 16px;
            font-family: 'Segoe UI';
            color: darkgray;
        }

        .one-chat-container{
            float:left;
            width:1000px;
            overflow-y: auto;
            height: 500px;
            display: flex;
            flex-direction: column-reverse;
        }
        .one-chat-owner{
            text-align: center;
            color: #0275d8;
            font-size: 20px;
        }
        .left-side-chat{
            background-color: whitesmoke;
            margin-right: 0;
        }
        .left-side-chat img{
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-left: 15px;
        }
        .left-side-chat-body{
            background-color: #5cb85c;
            height: auto;
            min-height: 30px;
            margin-top: 5px;
            border-radius: 10px;
        }
        .left-side-chat-body p{
            font-size: 18px;
            color: black;
            text-align: left;
            margin-left: 15px;
        }

        .left-side-chat-body img{
            height: 150px;
            width: 100%;
            margin: auto;
        }
        .right-side-chat-body{
            background-color: lightgrey;
            height: auto;
            min-height: 30px;
            margin-top: 5px;
            border-radius: 10px;
        }
        .right-side-chat-body p{
            font-size: 18px;
            color: black;
            text-align: right;
            margin-right: 15px;
        }

        .right-side-chat-body img{
            height: 150px;
            width: 100%;
            margin: auto;
        }
        .right-side-chat{
            background-color: whitesmoke;
            margin-left: 0;
        }
        .right-side-chat img{
            width: 40px;
            height: 40px;
            margin: auto;
        }

        .input-field textarea {
            width: 100%;
            height: 40px;
            text-align: right;
            margin-bottom: 20px;
            border: solid 1px lightgrey;
            border-left: none;
            /*border-radius: 5px;*/
            background-color: white;
            box-shadow: 3px 3px 3px 3px lightgrey;
        }

        .input-field textarea::placeholder {
            margin-right: 10px;
            text-align: left;
        }

        .input-field textarea:hover {
            border: solid 1px #0275d8;
        }

        .input-field input[type="file"] {
            /*height: 40px;*/
            /*color: transparent;*/
            /*width: 15%;*/
            display: none;
        }

        .input-field button {
            height: 40px;
        }

        .input-field img {
            height: 40px;
        }

        .input-field img:focus{
            border: solid 1px darkgrey;
        }

        .input-field .display_file_name {
            border: none;
            height: 40px;
        }
    </style>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>

            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="" class="brand-link">
                    @if($website_information->logo == null)
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0zKc2imsHbSQDL13AaM7Mg_-r8fuqe4pjCg&usqp=CAU" alt="AdminLTE Logo" style="height: 40px; width: 40px; border-radius: 50%; opacity: 0.8; margin-left: 12px">
                    @else
                        <img src="/images/logos/{{$website_information->logo}}" alt="AdminLTE Logo" style="height: 40px; width: 40px; border-radius: 50%; opacity: 0.8; margin-left: 12px">
                    @endif
                    <span class="brand-text font-weight-light" style="margin-left: 5px">{{$website_information->name}}</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            @if(Auth::guard('admin')->user()->profile_photo == null)
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWjk7gCpsGYs37iLpxNRx_1b0E7j_iXS2rsg&usqp=CAU" style="height: 40px; width: 40px; border-radius: 50%; opacity: 0.8" alt="User Image">
                            @else
                                <img src="/images/profiles/{{Auth::guard('admin')->user()->profile_photo}}" style="height: 40px; width: 40px; border-radius: 50%; opacity: 0.8" alt="User Image">
                            @endif
                        </div>
                        <div class="info">
                            <a href="{{route('admin.edit_admin', Auth::guard('admin')->user()->id)}}" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="nav-item has-treeview menu-open">
                                <a href="{{route('admin.home')}}" class="nav-link active">
                                    <i class="nav-icon fas fa-home"></i><p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.full-calendar')}}" class="nav-link">
                                    <i class="nav-icon fa fa-calendar"></i><p>Calender</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{route('admin.online_classes.index')}}" class="nav-link">
                                    <i class="nav-icon fa fa-video-camera"></i><p>Courses</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{route('admin.chats')}}" class="nav-link">
                                    <i class="nav-icon fa fa-envelope"></i>
                                    <p>
                                        Messages
                                        @if(count($user_new_messages) > 0)
                                            <span class="badge badge-info right">{{count($user_new_messages)}}</span>
                                        @endif
                                    </p>
                                </a>
                            </li>
                            @if(Auth::guard('admin')->user()->id == 1)
                                <li class="nav-item has-treeview">
                                    <a href="{{route('admin.admins_list')}}" class="nav-link">
                                        <i class="nav-icon fas fa-user-cog"></i><p>Admins List</p>
                                    </a>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="{{route('admin.website_information')}}" class="nav-link">
                                        <i class="nav-icon fas fa-map"></i><p>Website information</p>
                                    </a>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="{{route('admin.contacts')}}" class="nav-link">
                                        <i class="nav-icon fa fa-envelope"></i>
                                        <p>
                                            Visitors Messages
                                            @if(count($new_contacts) > 0)
                                                <span class="badge badge-warning right">{{count($new_contacts)}}</span>
                                            @endif
                                        </p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item has-treeview">
                                <a href="{{route('admin.users_list')}}" class="nav-link">
                                    <i class="nav-icon fa fa-users"></i><p>Users List</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{route('admin.edit_admin', Auth::guard('admin')->user()->id)}}" class="nav-link">
                                    <i class="nav-icon fas fa-user-edit"></i><p>Edit Profile</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="nav-link">
                                    <i class="nav-icon fa fa-sign-out"></i><p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="wrapper">
                    <!-- Main content -->
                    @yield('content')
                    <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; {{ now()->year }} <a href="https://api.whatsapp.com/send?phone=00249918255266" target="_blank">Eng. Sara Elajab</a>.</strong>
                All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        {{--<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>--}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <!-- jQuery UI 1.11.4 -->
        <script src="{{asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{asset('adminlte/plugins/sparklines/sparkline.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{asset('adminlte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{asset('adminlte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Summernote -->
        <script src="{{asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset('adminlte/dist/js/pages/dashboard.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('adminlte/dist/js/demo.js')}}"></script>

        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        <script>
            $("#upfile1").click(function () {
                $("#file1").trigger('click');
            });
        </script>
        <script type="text/javascript">
            function myChangeFunction(input1) {
                var input2 = document.getElementById('file2');
                input2.value = input1.value;
            }
        </script>

        <script>
            @if(Session::has('message'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
            toastr.success("{{ session('message') }}");
            @endif

                    @if(Session::has('error'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
            toastr.error("{{ session('error') }}");
            @endif

                    @if(Session::has('info'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
            toastr.info("{{ session('info') }}");
            @endif

                    @if(Session::has('warning'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
            toastr.warning("{{ session('warning') }}");
            @endif
        </script>
    </body>
</html>