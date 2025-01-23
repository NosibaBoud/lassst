<head>
    <title>Upload Result</title>  
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
 <!--styles-->
 <link href="/css/main.css" rel="stylesheet">
</head>
<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="home.html"><img src="http://jskrishna.com/work/merkury/images/logo.png" alt="merkery_logo" class="hidden-xs hidden-sm">
                        <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div class="navi">
                    <ul>
                        <li><a href="/welcome"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        <li><a href="/investigations"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">investigations</span></a></li>
                        <li  class="active"><a href="/upload-pdf"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Updload Result</span></a></li>
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
                            <br>
<body>
    <div class="container mt-5">
        <h1>Upload Result</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="/upload-pdf" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="receipt_number" class="form-label">Receipt number</label>
                <input type="text" class="form-control" id="receipt_number" name="receipt_number" required>
            </div>
            <div class="mb-3">
                <label for="file_path" class="form-label">PDF File</label>
                <input type="file" class="form-control" id="file_path" name="file_path" accept="application/pdf" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>
</header>
</div>
</div>
</div>

</div>

</body>
