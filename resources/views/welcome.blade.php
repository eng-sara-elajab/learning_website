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
        <link rel="stylesheet" href="{{asset('delux/css/bootstrap.min.css')}}"/>
        <!-- Fonts-style -->
        <link rel="stylesheet" href="{{asset('delux/css/styles.css')}}"/>
        <!-- Fonts-style -->
        {{--<link rel="stylesheet" href="{{asset('delux/css/font-awesome.min.css')}}"/>--}}
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Modal-Effect -->
        <link href="{{asset('delux/css/component.css')}}" rel="stylesheet">
        <!-- owl-carousel -->
        <link href="{{asset('delux/css/owl.carousel.css')}}" rel="stylesheet" type="text/css" media="screen">
        <link href="{{asset('delux/css/owl.theme.css')}}" rel="stylesheet" type="text/css" media="screen">
        <!-- Template Styles-->
        <link rel="stylesheet" href="{{asset('delux/css/style.css')}}"/>
        <!-- Template Color-->
        <link rel="stylesheet" type="text/css" href="{{asset('delux/css/green.css')}}" media="screen" id="color-opt" />



    </head>

    <style>
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
    </style>

    <body data-spy="scroll" data-offset="80">

        {{--<!-- Preloader -->--}}
        {{--<div class="animationload">--}}
            {{--<div class="loader">--}}
                {{--Please Wait....--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- End Preloader -->--}}


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
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
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

        <!-- /HOME -->
        <section class="main-home" id="home">
            <div class="home-page-photo"></div> <!-- Background image -->
            <div class="home__header-content">
                <div id="main-home-carousel" class="owl-carousel">
                    <div>
                        <h1 class="intro-title">Our Mission</h1>
                        <div class="row">
                            <div class="col-xl-8 col-xl-offset-2 col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                                <p class="intro-text">
                                    {{--{{substr($website_information->mission, ' ')}}--}}
                                    {{$website_information->mission}}
                                </p>
                            </div>
                        </div>
                        <a class="btn btn-custom" href="/contact_us">Contact Us</a>
                    </div><!--slide item like paragraph-->

                    <div>
                        <h1 class="intro-title">Our Vision</h1>
                        <div class="row">
                            <div class="col-xl-8 col-xl-offset-2 col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                                <p class="intro-text">
                                    {{$website_information->vision}}
                                </p>
                            </div>
                        </div>
                        <a class="btn btn-custom" href="/contact_us">Contact Us</a>
                    </div><!--slide item like paragraph-->

                    <div>
                        <h1 class="intro-title">We are digital experts</h1>
                        <div class="row">
                            <div class="col-xl-8 col-xl-offset-2 col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                                <p class="intro-text"><br/>
                                    {{$website_information->description}}
                                </p>
                            </div>
                        </div>
                        <a class="btn btn-custom" href="/contact_us">Contact Us</a>
                    </div><!--slide item like paragraph-->
                </div>
            </div>
        </section>
        <!-- /End HOME -->

        <!-- / SERVICES -->
        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title text-center">أفضل خدماتنا</h3>
                        <div class="titleHR"><span></span></div>
                    </div>
                </div>

                <div class="row">

                    @if(count($services) > 0)
                        @foreach($services as $service)
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12"> <!-- Service-item -->
                                <div class="text-center services-item">
                                    <div class="col-wrapper">
                                        <div class="icon-border">
                                            {{--<i class="icon-design-graphic-tablet-streamline-tablet color-l-orange"></i>--}}
                                            @if($service->image == null)
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS54Wgf1w-a8cKOVac7eJJh73K2q3jg8-aHZg&usqp=CAU" style="height: 150px; width: 94%; margin-left: 3%; border-radius: 100%">
                                            @else
                                                <img src="/images/services/{{$service->image}}" style="height: 150px; width: 94%; margin-left: 3%; border-radius: 100%">
                                            @endif
                                        </div>
                                        {{--<h5>Time Management</h5>--}}
                                        <h5>{{$service->name}}</h5>
                                        {{--<p>keep you on a regular schedule of making and meeting deadlines, allowing you to practice managing your time and staying productive week-to-week</p>--}}
                                        <p>{{$service->body}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-sm-4"> <!-- Service-item -->
                            <div class="text-center services-item">
                                <div class="col-wrapper">
                                    <div class="icon-border">
                                        <i class="icon-design-graphic-tablet-streamline-tablet color-l-orange"></i>
                                    </div>
                                    <h5>Time Management</h5>
                                    <h5>إدارة الوقت</h5>
                                    <p>keep you on a regular schedule of making and meeting deadlines, allowing you to practice managing your time and staying productive week-to-week</p>
                                    <p>تبقيك على جدول منتظم لتحديد المواعيد النهائية والوفاء بها ، مما يتيح لك التدرب على إدارة وقتك والبقاء منتجًا من أسبوع لآخر</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4"> <!-- Service-item -->
                            <div class="text-center services-item">
                                <div class="col-wrapper">
                                    <div class="icon-border">
                                        <i class="icon-design-pencil-rule-streamline color-l-blue"></i>
                                    </div>
                                    <h5>Self-Motivation</h5>
                                    <h5>التحفيز الذاتي</h5>
                                    <p>We help you to prove that you can tackle multiple tasks, set priorities, and adapt to changing work conditions.</p>
                                    <p>نحن نساعدك على إثبات أنه يمكنك التعامل مع مهام متعددة وتحديد الأولويات والتكيف مع ظروف العمل المتغيرة</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4"> <!-- Service-item -->
                            <div class="text-center services-item">
                                <div class="col-wrapper">
                                    <div class="icon-border">
                                        <i class="icon-speech-streamline-talk-user color-l-yellow"></i>
                                    </div>
                                    <h5>Virtual Communication</h5>
                                    <h5>التواصل الإفتراضي</h5>
                                    <p>As the program progresses, you’ll get better at pitching your ideas and making strong, succinct, professional arguments through text.</p>
                                    <p>مع تقدم البرنامج ، ستتحسن في الترويج لأفكارك وتقديم حجج قوية وموجزة واحترافية من خلال النص</p>
                                </div>
                            </div>
                        </div>
                    </div> <!--/.row -->

                    <div class="row">
                        <div class="col-sm-4"> <!-- Service-item -->
                            <div class="text-center services-item">
                                <div class="col-wrapper">
                                    <div class="icon-border">
                                        <i class="icon-settings-streamline-2 color-l-purple"></i>
                                    </div>
                                    <h5>Updated Technical Skills</h5>
                                    <h5>مهارات فنية محدثة</h5>
                                    <p>After getting one of our program’s worth of technical hurdles, big and small, an employer could trust that you are versed in common collaboration tools, content management systems, and basic troubleshooting.</p>
                                    <p>بعد الحصول على إحدى العقبات التقنية التي يواجهها برنامجنا ، كبيرة كانت أم صغيرة ، يمكن لصاحب العمل أن يثق في أنك على دراية بأدوات التعاون المشتركة وأنظمة إدارة المحتوى واستكشاف الأخطاء وإصلاحها الأساسية</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4"> <!-- Service-item -->
                            <div class="text-center services-item">
                                <div class="col-wrapper">
                                    <div class="icon-border">
                                        <i class="icon-speech-streamline-talk-user color-l-yellow"></i>
                                    </div>
                                    <h5>Self-Motivation</h5>
                                    <h5>التحفيز الذاتي</h5>
                                    <p>We help you to prove that you can tackle multiple tasks, set priorities, and adapt to changing work conditions.</p>
                                    <p>نحن نساعدك على إثبات أنه يمكنك التعامل مع مهام متعددة وتحديد الأولويات والتكيف مع ظروف العمل المتغيرة</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4"> <!-- Service-item -->
                            <div class="text-center services-item">
                                <div class="col-wrapper">
                                    <div class="icon-border">
                                        <i class="icon-design-pencil-rule-streamline color-l-blue"></i>
                                    </div>
                                    <h5>Virtual Communication</h5>
                                    <h5>التواصل الإفتراضي</h5>
                                    <p>As the program progresses, you’ll get better at pitching your ideas and making strong, succinct, professional arguments through text.</p>
                                    <p>مع تقدم البرنامج ، ستتحسن في الترويج لأفكارك وتقديم حجج قوية وموجزة واحترافية من خلال النص</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div> <!--/.row -->
            </div> <!--/.container -->
        </section>
        <!-- / End services-->


        @if(count($recent_courses) > 0)
            <!-- TWITTER TWEET -->
            <section class="twitter_tweet parallax" id="twitter_tweet" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <h3 class="title text-center" style="color: whitesmoke">أحدث الدورات التدريبية</h3><br>
                            <div id="testi-carousel" class="owl-carousel owl-spaced">
                                @foreach($recent_courses as $recent_course)
                                    <div>
                                        <a href="#">
                                            <img src="images/courses/{{$recent_course->course_photo}}" style="width: 80%; height: 250px; margin: auto; border-radius: 10px; opacity: 0.6">
                                            <h5>{{$recent_course->description}}</h5>
                                            <p>{{$recent_course->admin->name}}</p>
                                        </a>
                                    </div><!--testimonials item like paragraph-->
                                @endforeach
                                {{--<div>--}}
                                    {{--<a href="#">--}}
                                        {{--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuqyIG96wXs9UycnECT4vgceMCmfd-60aVoQ&usqp=CAU" style="width: 80%; height: 250px; margin: auto; border-radius: 10px; opacity: 0.6">--}}
                                        {{--<h5>--}}
                                            {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, dolorum, fugiat, eligendi magni quibusdam iure cupiditate ex voluptas unde Lorem ipsum dolor sit amet..--}}
                                        {{--</h5>--}}
                                        {{--<p>- Jonathan Deo</p>--}}
                                    {{--</a>--}}
                                {{--</div><!--testimonials item like paragraph-->--}}
                                {{--<div>--}}
                                    {{--<a href="#">--}}
                                        {{--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWSpGuf0wUlVMeD3hannZadjBexYR2J9nCfg&usqp=CAU" style="width: 80%; height: 250px; margin: auto; border-radius: 10px; opacity: 0.6">--}}
                                        {{--<h5>--}}
                                            {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, dolorum, fugiat, eligendi magni quibusdam iure cupiditate ex voluptas unde Lorem ipsum dolor sit amet..--}}
                                        {{--</h5>--}}
                                        {{--<p>- Jonathan Deo</p>--}}
                                    {{--</a>--}}
                                {{--</div><!--testimonials item like paragraph-->--}}
                                {{--<div>--}}
                                    {{--<a href="#">--}}
                                        {{--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSsAViLHD2Zoxb5eBMTYZHJ280dzIUleZFhOw&usqp=CAU" style="width: 80%; height: 250px; margin: auto; border-radius: 10px; opacity: 0.6">--}}
                                        {{--<h5>--}}
                                            {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, dolorum, fugiat, eligendi magni quibusdam iure cupiditate ex voluptas unde Lorem ipsum dolor sit amet..--}}
                                        {{--</h5>--}}
                                        {{--<p>- Jonathan Deo</p>--}}
                                    {{--</a>--}}
                                {{--</div><!--testimonials item like paragraph-->--}}
                            </div>
                        </div> <!-- end col-md-8 -->
                    </div> <!-- end row -->
                </div> <!-- container -->
            </section>
            <!-- End TWITTER TWEET -->
        @endif

        <div class="footer-dark">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 item">
                            <h3>Recent Courses</h3>
                            <ul>
                                @foreach($recent_courses as $recent_course)
                                    <li style="margin-top: 10px"><a href="#">{{$recent_course->topic}}</a></li>
                                @endforeach
                                {{--<li style="margin-top: 10px"><a href="#">PHP course</a></li>--}}
                                {{--<li style="margin-top: 10px"><a href="#">HTML course</a></li>--}}
                                {{--<li style="margin-top: 10px"><a href="#">JavaScript Course</a></li>--}}
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
        <script src="{{asset('delux/js/jquery.min.js')}}"></script>
        <!-- jquery easing -->
        <script src="{{asset('delux/js/jquery.easing.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('delux/js/bootstrap.min.js')}}"></script>
        <!-- modal-effect -->
        <script src="{{asset('delux/js/classie.js')}}"></script>
        <script src="{{asset('delux/js/modalEffects.js')}}"></script>
        <!-- Counter-up -->
        <script src="{{asset('delux/js/waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('delux/js/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <!-- SmoothScroll -->
        <script src="{{asset('delux/js/SmoothScroll.js')}}"></script>
        <!-- Parallax -->
        <script src="{{asset('delux/js/jquery.stellar.min.js')}}"></script>
        <!-- Jquery-Nav -->
        <script src="{{asset('delux/js/jquery.nav.js')}}"></script>
        <!-- Owl carousel -->
        <script type="text/javascript" src="{{asset('delux/js/owl.carousel.min.js')}}"></script>
        <!-- App JS -->
        <script src="{{asset('delux/js/app.js')}}"></script>

        <!-- Switcher script for demo only -->
        <script type="text/javascript" src="{{asset('delux/js/switcher.js')}}"></script>
    </body>
</html>