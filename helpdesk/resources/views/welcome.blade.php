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
            <div class="logout">
                <a href="{{url('/signout')}}">Log out</a>
            </div>
        </div>
       

        <style>
        </style>
        

    </head>
    <body onload="realtimeClock()">
        <div class="sidetitle">
            <div class="row">
                <a href="{{ url('/dashboard')}}"><h4>Hospital Bentong</h4></a>
                <div class="stats">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-12 ">
                            <!-- Start Card-->
                            <div class="card card-1 ad-info-card">
                                <div class="card-body dd-flex align-items-center">
                                    
                                    <!-- <div class="icon-info">
                                    <img src="images/today.png">
                                    </div> -->
                                    <div class="icon-info-text" style="text-align:center;">
                                        <h4 class="ad-card-title today" ><b>Today</b></h4>
                                        <ul>
                                            <li>
                                                {{ $todaytickets }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>                                    
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-12 ">
                            <!-- Start Card-->
                                    <div class="card ad-info-card">
                                        <div class="card-body dd-flex align-items-center">
                                            <!-- <div class="icon-info">
                                            </div> -->
                                            <div class="icon-info-text pending" style="text-align:center;">
                                                <h4 class="ad-card-title pending"><b>Pending</b> </h4>
                                                <ul>
                                                    <li>
                                                        {{ $pendingtickets }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-12 ">
                            
                                <!-- Start Card-->
                                    <div class="card ad-info-card">
                                        <div class="card-body dd-flex align-items-center">
                                            <!-- <div class="icon-info">  
                                            </div> -->
                                            <div class="icon-info-text">
                                                <h4 class="ad-card-title"><b>WEEK</b></h4>
                                                <ul>
                                                    <li>
                                                        <strong>Current</strong> 
                                                        <span>{{$weektickets}}</span>
                                                    </li>
                                                    <li>
                                                        <strong>Closed</strong> 
                                                        <span>{{$closethisweek}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12">
                            <div class="card ad-info-card">
                                <div class="card-body dd-flex align-items-center">
                                    <!-- <div class="icon-info">
                                    </div> -->
                                    <div class="icon-info-text">
                                        <h4 class="ad-card-title"><b>Month</b></h4>
                                        <ul>
                                            <li>
                                                <strong>Current</strong>
                                                <span>{{$monthtickets}}</span>
                                            </li>
                                            <li>
                                                <strong>Last Month</strong>
                                                <span>{{$lastmonthtickets}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="row">
                <a href="{{ url('/dashboard_aadk')}}"><h4>AADK</h4></a>
                <div class="stats">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-12 ">
                            <!-- Start Card-->
                            <div class="card ad-info-card">
                                <div class="card-body dd-flex align-items-center">
                                    <!-- <div class="icon-info">
                                    <img src="images/today.png">
                                    </div> -->
                                    <div class="icon-info-text" style="text-align:center;">
                                        <h4 class="ad-card-title today"><b>Today</b></h4>
                                        <ul>
                                            <li>
                                                {{ $todaytickets_aadk }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>                                    
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-12 ">
                            <!-- Start Card-->
                                    <div class="card ad-info-card">
                                        <div class="card-body dd-flex align-items-center">
                                            <!-- <div class="icon-info">
                                            </div> -->
                                            <div class="icon-info-text pending" style="text-align:center;">
                                                <h4 class="ad-card-title pending "><b>Pending </b></h4>
                                                <ul>
                                                    <li>
                                                        {{ $pendingtickets_aadk }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-12 ">
                                <!-- Start Card-->
                                    <div class="card ad-info-card">
                                        <div class="card-body dd-flex align-items-center">
                                            <!-- <div class="icon-info">  
                                            </div> -->
                                            <div class="icon-info-text">
                                                <h4 class="ad-card-title"><b>Week</b></h4>
                                                <ul>
                                                    <li>
                                                        <strong>Current</strong>
                                                        <span>{{$weektickets_aadk}}</span>
                                                    </li>
                                                    <li>
                                                        <strong>Closed</strong>
                                                        <span>{{$closethisweek_aadk}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12">
                            <div class="card ad-info-card">
                                <div class="card-body dd-flex align-items-center">
                                    <!-- <div class="icon-info">
                                    </div> -->
                                    <div class="icon-info-text">
                                        <h4 class="ad-card-title"><b>Month</b></h4>
                                        <ul>
                                            <li>
                                                <strong>Current</strong>
                                                <span>{{$monthtickets_aadk}}</span>
                                            </li>
                                            <li>
                                                <strong>Last Month</strong>
                                                <span>{{$lastmonthtickets_aadk}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>

                </div>           
            </div>
            <div class="row">
                <a href="{{ url('/dashboard_hsnz')}}"><h4>HSNZ</h4></a>
                <div class="stats">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-12 ">
                                    <!-- Start Card-->
                                    <div class="card ad-info-card">
                                        <div class="card-body dd-flex align-items-center">
                                            <!-- <div class="icon-info">
                                            <img src="images/today.png">
                                            </div> -->
                                            <div class="icon-info-text" style="text-align:center;">
                                                <h4 class="ad-card-title today"><b>Today</b></h4>
                                                <ul>
                                                    <li>
                                                        {{ $todaytickets_hsnz }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>                                    
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-12 ">
                            <!-- Start Card-->
                                    <div class="card  ad-info-card">
                                        <div class="card-body dd-flex align-items-center">
                                            <!-- <div class="icon-info">
                                            </div> -->
                                            <div class="icon-info-text pending" style="text-align:center;">
                                                <h4 class="ad-card-title pending"><b>Pending</b> </h4>
                                                <ul>
                                                    <li>
                                                        {{ $pendingtickets_hsnz }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            
                        </div>

                
                        <!-- Start Card-->
                        <div class="col-xl-3 col-lg-6 col-md-12 ">
                            <div class="card ad-info-card">
                                <div class="card-body dd-flex align-items-center">
                                    <!-- <div class="icon-info">  
                                    </div> -->
                                    <div class="icon-info-text">
                                        <h4 class="ad-card-title"><b>Week</b></h4>
                                        <ul>
                                            <li>
                                                <strong>Current</strong>
                                                <span>{{$weektickets_hsnz}}</span>
                                            </li>
                                            <li>
                                                <strong>Closed</strong>
                                                <span>{{$closethisweek_hsnz}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-3 col-lg-6 col-md-12">
                            <div class="card ad-info-card">
                                <div class="card-body dd-flex align-items-center">
                                    <!-- <div class="icon-info">
                                    </div> -->
                                    <div class="icon-info-text">
                                        <h4 class="ad-card-title"><b>Month</b></h4>
                                        <ul>
                                            <li>
                                                <strong>Current</strong>
                                                <span>{{$monthtickets_hsnz}}</span>
                                            </li>
                                            <li>
                                                <strong>Last Month</strong>
                                                <span>{{$lastmonthtickets_hsnz}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
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

            
        </scrip>
    </body>
</html>
