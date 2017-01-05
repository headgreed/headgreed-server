<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="headgreed">
    <meta name="author" content="headgreed.com.tw">

    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="welcome/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="welcome/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="welcome/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="welcome/device-mockups/device-mockups.min.css">

    <!-- Theme CSS -->
    <link href="welcome/css/new-age.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style media="screen">

    body {
        font-family: '微軟正黑體', '新細明體', sans-serif !important;
    }
    .fb-blue {
        background-color: #3b5998;
    }
    .two-em {
        font-size: 1.35em;
    }
    /*githib*/
    section.contact ul.list-social li.social-github a {
        background-color: #333;
    }
    section.contact ul.list-social li.social-github a:hover {
        background-color: #1c1c1c;
    }

    .bg-primary {
         background: #f2b723;
         background: -webkit-linear-gradient(#fdcc52,#fdc539);
         background: linear-gradient(#f2b723,#4affce);
     }

    </style>

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> 目錄｜Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">{{ config('app.name') }}｜HeadGreed</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#download">下載｜Download</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#features">特色｜Features</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">聯絡我們｜Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="header-content">
                        <div class="header-content-inner">
                            <h1>Internet的本質就是溝通<br>我們將打造一個次世代的資訊交流平台</h1>
                            <h4>網站：</h4>
                            <a href="{{ url('/auth/facebook') }}" class="btn btn-outline btn-xl page-scroll fb-blue">
                                <i class="fa fa-facebook-square fa-2x"></i> <span class="two-em">使用Facebook登入</span>
                            </a><br><br>
                            <h4>行動裝置：</h4>
                            <a href="#download" class="btn btn-outline btn-xl page-scroll">
                                <i class="fa fa-mobile fa-2x"></i>
                                 <span class="two-em">下載APP</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="welcome/img/demo-screen-1.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="button">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="download" class="download bg-primary text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="section-heading">下載｜Download</h2>
                    <br>
                    <p>我們的ＡＰＰ也支援行動裝置</p>
                    <div class="badges">
                        <a class="badge-link" href="#"><img src="welcome/img/google-play-badge.svg" alt=""></a>
                        <a class="badge-link" href="#"><img src="welcome/img/app-store-badge.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h2>免費使用，無限可能</h2>
                        <p class="text-muted">FREE, Unlimited Fun!</p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="welcome/img/demo-screen-1.jpg" class="img-responsive" alt=""> </div>
                                <div class="button">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-screen-smartphone text-primary"></i>
                                    <h3>跨平台</h3>
                                    <p class="text-muted">Cross-platform App !</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-people text-primary"></i>
                                    <h3>言論自由</h3>
                                    <p class="text-muted">Freedom of Speech !</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-present text-primary"></i>
                                    <h3>免費使用</h3>
                                    <p class="text-muted">Free to Use !</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-emotsmile text-primary"></i>
                                    <h3>友善環境</h3>
                                    <p class="text-muted">Friendly !</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="cta">
        <div class="cta-content">
            <div class="container">
                <h2>Start HeadGreed.</h2>
                <a href="#contact" class="btn btn-outline btn-xl page-scroll">聯絡我們｜Contact Us</a>
            </div>
        </div>
        <div class="overlay"></div>
    </section>

    <section id="contact" class="contact bg-primary">
        <div class="container">
            <h2>聯絡我們 <i class="fa fa-heart"></i></h2>
            <p class="text-muted">Contact Us</p>
            <ul class="list-inline list-social">
                <li class="social-github">
                    <a href="https://github.com/headgreed"><i class="fa fa-github"></i></a>
                </li>
                <li class="social-facebook">
                    <a href="https://www.facebook.com/%E8%B2%AA%E9%A0%AD%E5%AF%B6-946977698770592/"><i class="fa fa-facebook"></i></a>
                </li>
                {{-- <li class="social-google-plus">
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                </li> --}}
            </ul>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2017 HeadGreed.com.tw All Rights Reserved.</p>
            <ul class="list-inline">
                <li>
                    <a href="#">隱私政策｜Privacy</a>
                </li>
                <li>
                    <a href="#">規章｜Terms</a>
                </li>
                <li>
                    <a href="#">問答｜FAQ</a>
                </li>
            </ul>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="welcome/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="welcome/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="welcome/js/new-age.min.js"></script>

</body>

</html>
