
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
    <!--styles-->
    <link href="/css/main.css" rel="stylesheet">
  </head>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<body class="home">
  
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="home.html"><img src="http://jskrishna.com/work/merkury/images/logo.png" alt="merkery_logo" class="hidden-xs hidden-sm">
                        <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div style="
                color: white;
                padding: 20px 40px;
                text-align: center;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
                border-radius: 8px;">
                <h1 style="margin: 0;
                    font-size: 18px;
                    font-weight: 600;"> {{ Auth::user()->name }}</h1>
            </div>
                <div class="navi">
                    <ul>
                        <li><a href="/welcome"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        <li class="active"><a href="/investigations"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">investigations</span></a></li>
                        <li><a href="/upload-pdf"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Updload Result</span></a></li>
                        <li><a href="/appointments"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">appointments</span></a></li>
                        <li>
                            <a href="/logout" id="logout-link">
                              <i class="fa fa-sign-out" aria-hidden="true"></i>
                              <span class="hidden-xs hidden-sm">Logout</span>
                            </a>
                          </li>
                    </ul>
                   
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            @yield('content')
                            
                        </div>
                    </header>
                </div>
            </div>
        </div>
        
    </div>
 
</body>
