<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="description" content="Aexis Technology">
		<meta name="author" content="Norieka">
		<link rel="shortcut icon" href="{{{ asset('favicon-16x16.png') }}}">
		<title>Aexis Technologies Sdn bhd</title>
        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                @media(max-width: 767px);
                background-image: url('images/bg.jpeg');
                background-position: center;
                background-size: cover;
                position: relative;
                color: #f3f5f6;
                font-family: 'Bebas neue', sans-serif;
                font-weight: 200;
                width: 100%;
                height: 100%;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 75px;
            }

            .links > a {
                color: #f8f7f3;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .version {
                font-size: 0.4em;
                position: absolute;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                        <a href="test">Test</a>
                        <a target="_blank" href="{{ asset('UserGuideeHelpdesk.pdf') }}">User Guide</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div>
                <img src="{{ asset('images/support.png') }}" alt="Aexis logo">
             </div>
                <div class="title m-b-md">
                    {{ config('app.name') }}
                  
                    <?php
                        $packages = collect(json_decode(file_get_contents(base_path('composer.lock')))->packages);
                    ?> 
                  
                </div>          

             <footer>
			<div class="container text-center">
				<p>© 2018 <a href="https://aexis.com.my"></a> Aexis Technologies Sdn Bhd. All Rights Reserved</p>
			</div>
		</footer>
            </div>
        </div>
    </body>
</html>
