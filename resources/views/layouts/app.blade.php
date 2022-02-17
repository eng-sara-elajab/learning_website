<html lang="en">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8"/>

        <!-- Site Title-->
        <title>{{$website_information->name}}</title>

        <!-- Mobile Specific Metas-->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

        <!-- Google-fonts -->
        <link href='http://fonts.googleapis.com/css?family=Signika+Negative:300,400,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Kameron:400,700' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="{{secure_asset('delux/css/bootstrap.min.css')}}"/>
        <!-- Fonts-style -->
        <link rel="stylesheet" href="{{secure_asset('delux/css/styles.css')}}"/>
        <!-- Fonts-style -->
        {{--<link rel="stylesheet" href="{{secure_asset('delux/css/font-awesome.min.css')}}"/>--}}
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Modal-Effect -->
        <link href="{{secure_asset('delux/css/component.css')}}" rel="stylesheet">
        <!-- owl-carousel -->
        <link href="{{secure_asset('delux/css/owl.carousel.css')}}" rel="stylesheet" type="text/css" media="screen">
        <link href="{{secure_asset('delux/css/owl.theme.css')}}" rel="stylesheet" type="text/css" media="screen">
        <!-- Template Styles-->
        <link rel="stylesheet" href="{{secure_asset('delux/css/style.css')}}"/>
        <!-- Template Color-->
        <link rel="stylesheet" type="text/css" href="{{secure_asset('delux/css/green.css')}}" media="screen" id="color-opt" />

        <link rel="stylesheet" href="{{secure_asset('css/style.css')}}">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>

    <style>
        .form-control{
            border-bottom: ridge;
            border-right: none;
            border-left: none;
            border-top: none;
        }

        .form-control::placeholder{
            background-color: white;
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            color: orangered;
        }

        .footer-dark {
            padding:50px 0;
            color:#f0f9ff;
            background-color:#282d32;
        }

        .footer-dark h3 {
            margin-top:0;
            margin-bottom:12px;
            font-weight:bold;
            font-size:16px;
        }

        .footer-dark ul {
            padding:0;
            list-style:none;
            line-height:1.6;
            font-size:14px;
            margin-bottom:0;
        }

        .footer-dark ul a {
            color:inherit;
            text-decoration:none;
            opacity:0.6;
        }

        .footer-dark ul a:hover {
            opacity:0.8;
        }

        @media (max-width:767px) {
            .footer-dark .item:not(.social) {
                text-align:center;
                padding-bottom:20px;
            }
        }

        .footer-dark .item.text {
            margin-bottom:36px;
        }

        @media (max-width:767px) {
            .footer-dark .item.text {
                margin-bottom:0;
            }
        }

        .footer-dark .item.text p {
            opacity:0.6;
            margin-bottom:0;
            text-align: right;
            color: white;
        }

        .footer-dark .item.social {
            text-align:center;
        }

        @media (max-width:991px) {
            .footer-dark .item.social {
                text-align:center;
                margin-top:20px;
            }
        }

        .footer-dark .item.social > a {
            font-size:20px;
            width:36px;
            height:36px;
            line-height:36px;
            display:inline-block;
            text-align:center;
            border-radius:50%;
            box-shadow:0 0 0 1px rgba(255,255,255,0.4);
            margin:0 10px;
            color:#fff;
            opacity:0.75;
        }

        .footer-dark .item.social > a:hover {
            opacity:0.9;
        }

        .footer-dark .copyright {
            text-align:center;
            padding-top:24px;
            opacity:0.3;
            font-size:13px;
            margin-bottom:0;
        }

        .pagination {
            display: inline-block;
            background-color: whitesmoke;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }

        .pagination a:hover:not(.active) {background-color: #ddd;}
    </style>

    <body data-spy="scroll" data-offset="80">

        <!-- Preloader -->
        {{--<div class="animationload">--}}
            {{--<div class="loader">--}}
                {{--Please Wait....--}}
            {{--</div>--}}
        {{--</div>--}}
        <!-- End Preloader -->


        <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">{{$website_information->name}}</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <ul class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/contact_us">تواصل معنا</a></li>
                        <li><a href="/about_us">عن الموقع</a></li>
                        <li><a href="/courses">الكورسات</a></li>
                        <li><a href="/">الصفحة الرئيسية</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        @if(Auth::user())
                            <li class="dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="text-align: right; color: darkgrey; font-weight: bold; font-size: 20px">
                                    <li><a class="dropdown-item" href="{{ route('home') }}">{{ __('عرض الحساب الشخصي') }}</a></li><hr style="margin: 0">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                            {{ __('تسجيل الخروج') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li><a href="/register"> إنشاء حساب</a></li>
                            <li><a href="/login"> تسجيل دخول</a></li>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <div class="footer-dark">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 item">
                            <h3>Recent Courses</h3>
                            <ul>
                                <li style="margin-top: 10px"><a href="#">PHP course</a></li>
                                <li style="margin-top: 10px"><a href="#">HTML course</a></li>
                                <li style="margin-top: 10px"><a href="#">JavaScript Course</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-3 item">
                            <h3>Contact Us</h3>
                            <ul>
                                <li style="margin-top: 10px"><a href="#">{{$website_information->phone}}</a></li>
                                <li style="margin-top: 10px"><a href="#">{{$website_information->email}}</a></li>
                                <li style="margin-top: 10px"><a href="#">{{$website_information->address}}</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 item text">
                            <h3>{{$website_information->name}}</h3>
                            <p>{{$website_information->description}}</p>
                        </div>
                        <div class="col-xl-4 col-xl-offset-4 col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-6 col-offset-3" style="margin-top: 30px">
                            <div class="col item social"><a href="{{$website_information->facebook_url}}" target="_blank"><i class="fa fa-facebook" style="margin-top: 8px"></i></a><a href="{{$website_information->twitter_url}}" target="_blank"><i class="fa fa-twitter" style="margin-top: 8px"></i></a><a href="{{$website_information->snapchat_url}}" target="_blank"><i class="fa fa-snapchat" style="margin-top: 8px"></i></a><a href="{{$website_information->instgram_url}}" target="_blank"><i class="fa fa-instagram" style="margin-top: 8px"></i></a></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-top: 20px">
                            <strong>Created by <a href="https://api.whatsapp.com/send?phone=00249918255266" target="_blank">Eng. Sara Elajab</a>.</strong>
                        </div>
                    </div>
                    <p class="copyright" style="color: lightgrey">{{$website_information->name}} © {{ now()->year }}</p>
                </div>
            </footer>
        </div>

        <!-- Scroll top -->
        <a href="#" class="back-to-top"> <i class="fa fa-chevron-up"> </i> </a>

        <!-- JavaScript
         ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- initialize jQuery Library -->
        {{--<script src="{{secure_asset('delux/js/jquery.min.js')}}"></script>--}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- jquery easing -->
        <script src="{{secure_asset('delux/js/jquery.easing.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{secure_asset('delux/js/bootstrap.min.js')}}"></script>
        <!-- modal-effect -->
        <script src="{{secure_asset('delux/js/classie.js')}}"></script>
        <script src="{{secure_asset('delux/js/modalEffects.js')}}"></script>
        <!-- Counter-up -->
        <script src="{{secure_asset('delux/js/waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{secure_asset('delux/js/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <!-- SmoothScroll -->
        <script src="{{secure_asset('delux/js/SmoothScroll.js')}}"></script>
        <!-- Parallax -->
        <script src="{{secure_asset('delux/js/jquery.stellar.min.js')}}"></script>
        <!-- Jquery-Nav -->
        <script src="{{secure_asset('delux/js/jquery.nav.js')}}"></script>
        <!-- Owl carousel -->
        <script type="text/javascript" src="{{secure_asset('delux/js/owl.carousel.min.js')}}"></script>
        <!-- App JS -->
        <script src="{{secure_asset('delux/js/app.js')}}"></script>

        <!-- Switcher script for demo only -->
        <script type="text/javascript" src="{{secure_asset('delux/js/switcher.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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