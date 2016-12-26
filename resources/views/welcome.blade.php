<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
          #app {
            height: 100vh;
            width: 100vw;
            background-color: white;
            background: url("https://source.unsplash.com/category/nature/1920x1080") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
          }
          .white-background {
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 5px;
            padding: 10px 50px 30px 50px;
            margin-top: 100px;
          }
        </style>
    </head>
    <body>
        <div id="app">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="white-background text-center">
                            <h1>立即登入貪頭寶</h1>
                            <br>
                            <a href="{{ url('/login') }}">FaceBook</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="white-background text-center">
                            <h2>關於貪頭寶</h2>
                            <br>
                            <p>一個言論自由的淨土</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
