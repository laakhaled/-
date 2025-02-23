<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
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
            background-color: #416a7c;
            height: 100vh;
            position: sticky;
            top: 0;
            padding-top: 20px;
            padding-left: 15px;
            padding-right: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
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

        .user-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .logout-btn {
            margin-top: auto;
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
        }
        .logout-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-none d-md-block sidebar">
                <div class="position-sticky">
                    <img src="{{ asset('uploads/images/' . auth()->user()->image) }}" alt="User Avatar" class="user-avatar">
                    <h5>Welcome {{ auth()->user()->name }}</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('requests.create') }}">Create Request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('requests.store') }}">Requests</a>
                        </li>
                    </ul>
                    <a href="/logout">
                    <button class="logout-btn">Logout</button>
                    </a>
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
