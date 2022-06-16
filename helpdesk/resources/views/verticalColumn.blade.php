<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <title>Helpdesk</title>
        <link rel="icon" href="{{ asset('images/logo.png') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/icofont.min.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <div class="navbar">
            <a class="navbar-brand" href="{{ url('/') }}">
               
                <img src="{{ asset('images/logo.png') }}" alt="Aexis logo">
                  
            </a>
        </div>

    </head>
    <body>
       

        <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 ">
                    <a href="{{ url('/dashboard')}}"><h1>Hospital Bentong</h1></a>
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">
                                   <img src="images/today.png">
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Today<br>{{ $todaytickets }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                        <!-- <div class="icon-info">
                                        </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Pending <br>{{ $pendingtickets }} </h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">  
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets This Week <br>{{$weektickets}}</h4>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">  
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets Closed This Week <br>{{$closethisweek}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card -->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets This Month<br>{{$monthtickets}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card -->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets Last Month <br>{{$lastmonthtickets}}</h4>
                                </div>
                            </div>
                        </div>                                    
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 ">
                    <a href="{{ url('/dashboard')}}"><h1>Hospital Bentong</h1></a>
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">
                                   <img src="images/today.png">
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Today<br>{{ $todaytickets }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                        <!-- <div class="icon-info">
                                        </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Pending <br>{{ $pendingtickets }} </h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">  
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets This Week <br>{{$weektickets}}</h4>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">  
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets Closed This Week <br>{{$closethisweek}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card -->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets This Month<br>{{$monthtickets}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card -->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets Last Month <br>{{$lastmonthtickets}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 ">
                    <a href="{{ url('/dashboard')}}"><h1>Hospital Bentong</h1></a>
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">
                                   <img src="images/today.png">
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Today<br>{{ $todaytickets }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                        <!-- <div class="icon-info">
                                        </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Pending <br>{{ $pendingtickets }} </h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">  
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets This Week <br>{{$weektickets}}</h4>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">  
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets Closed This Week <br>{{$closethisweek}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card -->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets This Month<br>{{$monthtickets}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card -->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets Last Month <br>{{$lastmonthtickets}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 ">
                    <a href="{{ url('/dashboard')}}"><h1>Hospital Bentong</h1></a>
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">
                                   <img src="images/today.png">
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Today<br>{{ $todaytickets }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                        <!-- <div class="icon-info">
                                        </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Pending <br>{{ $pendingtickets }} </h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">  
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets This Week <br>{{$weektickets}}</h4>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">  
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets Closed This Week <br>{{$closethisweek}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card -->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets This Month<br>{{$monthtickets}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Card -->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                <!-- <div class="icon-info">
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title">Tickets Last Month <br>{{$lastmonthtickets}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    
            
        </div>

        <script>
            window.onscroll = function() {myFunction()};

            var navbar = document.getElementById("navbar");
            var sticky = navbar.offsetTop;

            function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
            }

            
        </script>
    </body>
</html>
