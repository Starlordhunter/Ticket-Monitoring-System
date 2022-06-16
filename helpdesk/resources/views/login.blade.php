<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <title>Helpdesk</title>
        <link rel="icon" href="{{ asset('images/logo.png') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/icofont.min.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="js/script.js"></script>
        <div class="navbar">
            <a class="navbar-brand" href="{{ url('/') }}">  
                <img src="{{ asset('images/logo.png') }}" alt="Aexis logo"> 
            </a>
            <h2 class="maintitle">TICKETS MONITORING SYSTEM</h2>
            <div id="clock"></div>
        </div>


        <style>
        </style>

    </head>
    <body onload="realtimeClock()">
                
        <main class="login-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card" style="margin-top:40%;">
                            <h3 class="card-header text-center">Login</h3>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login.custom') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                            autofocus>
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                   

                                    <div class="d-grid mx-auto">
                                        <button type="submit" class="btn btn-dark btn-block">Signin</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
