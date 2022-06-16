<html>
    <head>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icofont.min.css') }}">
    
        <style>
            
            .wrap h1{
                margin-left:30px;
            }
            .row{
                margin-bottom:20px;
            }

            .stats{
                width:100%;
                margin-left:10px;
            }

            

            
        </style>
        <title>Dashboard</title>
        
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
        <script src="js/script.js"></script>
    </head>
    <body onload="realtimeClock()">
        <!-- @foreach($sla as $data)
        [{{$data->Month}},  {{$data->Low}}, {{$data->Medium}},{{$data->High}},{{$data->NonSLA}}]
        @endforeach -->

        <!-- @foreach($lokasi as $loc)
        [{{$loc->Lokasi}},{{$loc->Tickets}}]
        @endforeach -->
    <!-- 
        @foreach($agent as $agent_data)
        [{{ $agent_data->Name }},{{ $agent_data->{'Closed Tickets'} }}]
        @endforeach -->

        <div class="wrap">
            <h1>Hospital Bentong Statistics</h1>   
            <div class="stats">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 ">
                            
                            <!-- Start Card-->
                                <div class="card ad-info-card">
                                    <div class="card-body dd-flex align-items-center">
                                        <!-- <div class="icon-info">  
                                        </div> -->
                                        <div class="icon-info-text" style="text-align:center;">
                                            <h4 class="ad-card-title today"><b>Today</b></h4>
                                            <ul>
                                                <li>
                                                    {{ $todaytickets }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 ">
                            
                            <!-- Start Card-->
                                <div class="card ad-info-card">
                                    <div class="card-body dd-flex align-items-center">
                                        <!-- <div class="icon-info">  
                                        </div> -->
                                        <div class="icon-info-text pending" style="text-align:center;">
                                            <h4 class="ad-card-title pending"><b>Pending</b></h4>
                                            <ul>
                                                <li>
                                                    {{ $pendingtickets }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 ">
                        
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
                    <div class="col-xl-4 col-lg-6 col-md-12">
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
                    <div class="col-xl-4 col-lg-6 col-md-12 ">
                        <!-- Start Card-->
                        <div class="card ad-info-card">
                            <div class="card-body dd-flex align-items-center">
                                
                                <!-- <div class="icon-info">
                                <img src="images/today.png">
                                </div> -->
                                <div class="icon-info-text">
                                    <h4 class="ad-card-title" ><b>Total</b></h4>
                                    <ul>
                                        <li>
                                            <strong>Closed</strong>
                                            <span>{{$closetickets}}</span>
                                        </li>
                                        <li>
                                            <strong>Total</strong>
                                            <span>{{$totaltickets}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>                                    
                    </div>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 ">
                    <div class="chartinfo">
                        <div id="severitychart"></div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 ">
                    <div class="chartinfo">
                        <div id="catchart"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 ">
                    <div class="chartinfo">
                        <div id="modelchart"></div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 ">
                    <div class="chartinfo">
                        <div id="locchart"></div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="leaderboardTabContent">
                <div class="tab-pane fade show active" id="all-time" role="tabpanel" aria-labelledby="all-time-tab">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-text-center table-align-middle card-table" cellspacing="0" cellpadding="0">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col" style="width: 2rem;">Rank</th>
                            <th scope="col" class="text-left">Name</th>
                            <th scope="col">Closed tickets</th>
                            
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $i= 1;?>
                            @foreach($agent as $agentdata)
                            
                            <tr>
                            <td><span class="" style="font-size: 1.5rem;"><?php echo $i ?></span></td>
                            <td class="text-left">
                                
                                <div class="ml-3">
                                    <span class="d-block h5 text-hover-primary mb-0">{{$agentdata->Name}}</span>
                                </div>
                                </a>
                            </td>
                            <td style="text-align: Center;">{{$agentdata-> {'Closed Tickets'} }}</td>
                            
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <!-- End Table -->
                </div>

                <div class="tab-pane fade" id="weekly" role="tabpanel" aria-labelledby="weekly-tab">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-text-center table-align-middle card-table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col" style="width: 2rem;">Rank</th>
                            <th scope="col" class="text-left">Name</th>
                            <th scope="col">Closed issues</th>
                            <th scope="col">Projects</th>
                            
                            <th scope="col">Efficiency rate</th>
                            <th scope="col">Hours</th>
                            <th scope="col">Avg. Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td><span class="text-warning" style="font-size: 1.5rem;">🥇</span></td>
                            <td class="text-left">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                
                                <div class="ml-3">
                                    <span class="d-block h5 text-hover-primary mb-0">Amanda Harvey</span>
                                </div>
                                </a>
                            </td>
                            <td>56</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <!-- End Table -->
                </div>

                <div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-text-center table-align-middle card-table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col" style="width: 2rem;">Rank</th>
                            <th scope="col" class="text-left">Name</th>
                            <th scope="col">Closed issues</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td><span class="text-warning" style="font-size: 1.5rem;">🥇</span></td>
                            <td class="text-left">
                                <a class="d-flex align-items-center" href="user-profile.html">
                                
                                <div class="ml-3">
                                    <span class="d-block h5 text-hover-primary mb-0">Lori Hunter</span>
                                </div>
                                </a>
                            </td>
                            <td>45</td>                        
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <!-- End Table -->
                </div>
            </div>
        </div>
            
        
        <!-- <div id="leaderboard">
            <header>
                <h1>Agent Performances</h1>
            </header>
            <div class="main">
                <ol id="rb-grid" class="rb-grid clearfix">
                    @foreach($agent as $agent_data)
                        <li>
                            <p>{{$agent_data->Name}} <span class="points">{{ $agent_data-> {'Closed Tickets'} }}</span></p>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div> -->
        
        

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['line','bar','corechart']});
        google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                //Severity chart
                var sev_data = new google.visualization.DataTable();
                sev_data.addColumn('number', 'Month');
                sev_data.addColumn('number', 'Low');
                sev_data.addColumn('number', 'Medium');
                sev_data.addColumn('number', 'High');
                sev_data.addColumn('number', 'NON-SLA');
                
                
                @foreach($sla as $data)
                sev_data.addRows([
                [{{$data->Month}},  {{$data->Low}}, {{$data->Medium}},{{$data->High}},{{$data->NonSLA}}]
                ]);
                @endforeach
                

                var options = {
                
                chart: {
                    viewWindow: { min: 0, max: 1},
                    title: 'Ticket issued based on severity',
                    subtitle: 'Based on current year',
                },
                chartArea:{width:"50%",height:"50%"},
                hAxis:{baseline:1},
                width: 550,
                height: 400,
                legend: 'none',
                colors:['blue','orange','red','green']
                };

                var chart = new google.charts.Line(document.getElementById('severitychart'));

                chart.draw(sev_data, google.charts.Line.convertOptions(options));


                //Category chart
                
                var cat_data = new google.visualization.DataTable()
                cat_data.addColumn('string','Category');
                cat_data.addColumn('number','Tickets');

                cat_data.addRows([
                @foreach($cat as $cat_data)
                ["{{$cat_data->Category}}",{{$cat_data->Tickets}}],
                @endforeach
                ]);


                var cat_options = {
                chartArea:{width:"50%",height:"50%"},
                width: 550,
                height: 400,
                legend: 'none',
                title: "Tickets based on Category",
                bar: { groupWidth: "50%" }
                };

                var cat_chart = new google.visualization.BarChart(document.getElementById('catchart'));
                // Convert the Classic options to Material options.
                cat_chart.draw(cat_data, cat_options);


                //Model Chart

                var model_data = new google.visualization.DataTable()
                model_data.addColumn('string','Model');
                model_data.addColumn('number','Tickets');

                model_data.addRows([
                    @foreach($model as $model_data)
                    ["{{$model_data->Model}}",{{$model_data->Tickets}}],
                    @endforeach
                ]);

                var model_options = {
                chartArea:{width:"50%",height:"50%"},
                width: 550,
                height: 400,
                legend: 'none',
                title: "Tickets based on Model",
                bar: { groupWidth: "50%" }
                };

                var model_chart = new google.visualization.BarChart(document.getElementById('modelchart'));
                // Convert the Classic options to Material options.
                model_chart.draw(model_data, model_options);

                //Lokasi Chart

                var loc_data = new google.visualization.DataTable()
                loc_data.addColumn('string','Location');
                loc_data.addColumn('number','Tickets');

                loc_data.addRows([
                    @foreach($lokasi as $loc_data)
                    ["{{$loc_data->Lokasi}}",{{$loc_data->Tickets}}],
                    @endforeach
                ]);

                var loc_options = {
                chartArea:{width:"50%",height:"50%"},
                width: 550,
                height: 400,
                legend: 'none',
                title: "Tickets based on Location",
                bar: { groupWidth: "50%" }
                };

                var loc_chart = new google.visualization.BarChart(document.getElementById('locchart'));
                // Convert the Classic options to Material options.
                loc_chart.draw(loc_data, loc_options);

            //Agent Chart

            // var agent_data = new google.visualization.DataTable()
            // agent_data.addColumn('string','Name');
            // agent_data.addColumn('number','Closed Tickets');

            // agent_data.addRows([
            //     @foreach($agent as $agent_data)
            //     ["{{$agent_data->Name}}",{{ $agent_data->{'Closed Tickets'} }}],
            //     @endforeach
            // ]);

            // var agent_options = {
            //   width: 800,
            //   height: 900,
            //   legend: 'none',
            //   title: "Agent Performances",
            //   bar: { groupWidth: "50%" }
            // };

            // var agent_chart = new google.visualization.BarChart(document.getElementById('agentchart'));
            // // Convert the Classic options to Material options.
            // agent_chart.draw(agent_data, agent_options);

            }
        
        
            </script>
    </body>
</html>