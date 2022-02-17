<!DOCTYPE html>
<html>
    <head>
        <title>WebsiteName</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{secure_asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{secure_asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{secure_asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{secure_asset('adminlte/plugins/jqvmap/jqvmap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{secure_asset('adminlte/dist/css/adminlte.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{secure_asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{secure_asset('adminlte/plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{secure_asset('adminlte/plugins/summernote/summernote-bs4.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
        #hint{
            opacity: 0;
            -webkit-animation: fadeInOut 2s 1s infinite;
            animation: fadeInOut 2s 1s infinite;
            text-align: center;
            display: block;
        }

        @-webkit-keyframes fadeInOut {
            0% {
                opacity: 0;
                top: -.5em;
            }
            25% {
                opacity: 1;
                top: 0;
            }
            75% {
                opacity: 0;
                top: .5em;
            }
            100% {
                opacity: 0;
                top: .5em;
            }
        }
        @keyframes fadeInOut {
            0% {
                opacity: 0;
                top: -.5em;
            }
            25% {
                opacity: 1;
                top: 0;
            }
            75% {
                opacity: 0;
                top: .5em;
            }
            100% {
                opacity: 0;
                top: .5em;
            }
        }
    </style>
    <body>
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
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed">
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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Admin Panel -<span style="opacity: 0.8; margin-left: 10px">Calendar</span></h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <div class="wrapper row">
                <!-- Main content -->
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1" style="margin-bottom: 3%">
                    <br />
                    <h3 class="text-center text-primary" style="display: block"><u>Assign tasks Here</u></h3><br>
                    <h5 class="text-center text-danger" id="hint">Copy the Id of your selected course first!</h5><br>
                    <br />
                    <div id="calendar"></div>
                </div>
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

        <script>

            $(document).ready(function () {

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var calendar = $('#calendar').fullCalendar({
                    editable:true,
                    header:{
                        left:'prev,next today',
                        center:'title',
                        right:'month,agendaWeek,agendaDay'
                    },
                    events:'/admin/full-calender',
                    selectable:true,
                    selectHelper: true,
                    select:function(start, end, allDay)
                    {
                        var title = prompt('Event Title:');
                        var course_id = prompt('Enter course Id:');

                        if(title)
                        {
                            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                            $.ajax({
                                url:"/admin/full-calender/action",
                                type:"POST",
                                data:{
                                    title: title,
                                    start: start,
                                    end: end,
                                    course_id: course_id,
                                    type: 'add'
                                },
                                success:function(data)
                                {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Event Created Successfully");
                                }
                            })
                        }
                    },
                    editable:true,
                    eventResize: function(event, delta)
                    {
                        var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                        var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                        var title = event.title;
                        var course_id = event.course_id;
                        var id = event.id;
                        $.ajax({
                            url:"/admin/full-calender/action",
                            type:"POST",
                            data:{
                                title: title,
                                course_id : course_id,
                                start: start,
                                end: end,
                                id: id,
                                type: 'update'
                            },
                            success:function(response)
                            {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Updated Successfully");
                            }
                        })
                    },
                    eventDrop: function(event, delta)
                    {
                        var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                        var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url:"/admin/full-calender/action",
                            type:"POST",
                            data:{
                                title: title,
                                start: start,
                                end: end,
                                id: id,
                                type: 'update'
                            },
                            success:function(response)
                            {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Updated Successfully");
                            }
                        })
                    },

                    eventClick:function(event)
                    {
                        if(confirm("Are you sure you want to remove it?"))
                        {
                            var id = event.id;
                            $.ajax({
                                url:"/admin/full-calender/action",
                                type:"POST",
                                data:{
                                    id:id,
                                    type:"delete"
                                },
                                success:function(response)
                                {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Event Deleted Successfully");
                                }
                            })
                        }
                    }
                });

            });

        </script>
        <!-- jQuery -->
        <script src="{{secure_asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{secure_asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{secure_asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{secure_asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{secure_asset('adminlte/plugins/sparklines/sparkline.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{secure_asset('adminlte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{secure_asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{secure_asset('adminlte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{secure_asset('adminlte/plugins/moment/moment.min.js')}}"></script>
        <script src="{{secure_asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        {{--<script src="{{secure_asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>--}}
        <!-- Summernote -->
        <script src="{{secure_asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{secure_asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{secure_asset('adminlte/dist/js/adminlte.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{secure_asset('adminlte/dist/js/pages/dashboard.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{secure_asset('adminlte/dist/js/demo.js')}}"></script>
    </body>
</html>