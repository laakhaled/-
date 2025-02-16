<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engdany Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; 
            font-family: Arial, sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .sidebar {
            background-color: #3777bb; 
            height: 100vh;
            position: sticky;
            top: 0;
            padding-top: 20px;
            padding-left: 15px;
            padding-right: 15px;
        }
        .sidebar .nav-item .nav-link {
            color: white;
        }
        .sidebar .nav-item .nav-link:hover {
            background-color: #4d5968; 
            color: white;
        }
        .sidebar .nav-item .nav-link.active {
            background-color: #546272; 
            color: white;
        }
        .sidebar .nav-item a {
            text-decoration: none;
        }
        .sidebar .nav-item {
            margin-bottom: 10px;
        }
        .main-content {
            background-color: white; 
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
           
            <nav class="col-md-3 col-lg-2 d-none d-md-block sidebar">
                <div class="position-sticky">
                    <h2> Enjdany Dashboard</h2>
                    <ul class="nav flex-column">
                        @auth
                
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                       
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('auths.register') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('auths.login') }}">login</a>
                        </li>
                        @endguest   

                        @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link text-white">Logout</button>
                            </form>
                        </li>
                        @endauth
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="main-content">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>