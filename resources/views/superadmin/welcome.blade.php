
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="/css/welcome.css" rel="stylesheet">
    <link href="/css/superadminpages.css" rel="stylesheet">
    
</head>
<body>
    <div class="dashboard">
        
        <!-- Sidebar Navigation -->
        <nav class="sidebar">
            <div style="
                color: white;
                padding: 20px 40px;
                text-align: center;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
                border-radius: 8px;">
                <h2 style="margin: 0;
                    font-size: 18px;
                    font-weight: 600;"> {{ Auth::user()->name }}</h2>
            </div>
            <ul>
                <li class="active"><a href="{{url('/welcome/page')}}">Home</a></li>
                <li><a href="{{url('/add/admin')}}">Add New Admin</a></li>
                <li><a href="{{url('/manage/admins')}}">Manage Admins</a></li>
                <li><a href="/logout" id="logout-link"> Logout</a></li>
            </li>
            </ul>
        </nav>
            <div class="container">
                <div class="welcome">
                    <h1>Hello, Admin!</h1>
                    <p>Take control of your application with this modern and intuitive dashboard.</p>
                </div>
                <div class="dashboard-stats">
                    <div class="card">
                        <i class="fas fa-users"></i>
                        <h3>1,250</h3>
                        <p>Users</p>
                    </div>
                    <div class="card">
                        <i class="fas fa-chart-line"></i>
                        <h3>87%</h3>
                        <p>Growth</p>
                    </div> 
                </div>
            </div>
                </div>
            </body>
            </html>
