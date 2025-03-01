@auth
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <!DOCTYPE html>
    <html lang="ar">
    <head>
    <title>Library Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/navreq.css') }}">
    <style>
        /* تنسيقات عامة */
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)),
                        url('{{ asset("uploads/images/bg.jpeg") }}') no-repeat center center fixed;
            background-size: cover;
            padding-top: 80px; /* مساحة للـ navbar */
        }

        /* تنسيقات الـ navbar */
        .navbar {
            height: 80px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: linear-gradient(45deg, #54cbab, #174135);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        /* تنسيقات الـ sidebar */
        .sidebar {
            position: fixed;
            top: 80px; 
            left: 0;
            height: calc(100vh - 80px);
            width: 250px;
            background: linear-gradient(45deg, #54cbab, #174135, #54cbab);
            padding: 20px 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 999;
            overflow-y: auto;
        }

        /* تنسيقات المحتوى الرئيسي */
        main {
            margin-left: 250px; /* نفس عرض الـ sidebar */
            margin-top: 80px; /* تعويض ارتفاع الـ navbar */
            padding: 30px;
            min-height: calc(100vh - 80px);
            transition: all 0.3s;
        }

        /* تنسيقات العناصر الداخلية */
        .user-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 3px solid white;
        }

        .nav-link {
            color: white !important;
            font-size: 18px;
            padding: 12px 20px !important;
            border-radius: 8px;
            transition: all 0.3s;
            margin: 5px 0;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.15);
            transform: translateX(5px);
        }

        .logout-btn {
            margin-top: auto;
            background: #1a5043;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .logout-btn:hover {
            background: #174135;
            transform: scale(0.98);
        }
        /* تنسيقات للجوال */
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                top: 0;
                width: 100%;
                height: auto;
            }

            main {
                margin-left: 0;
                margin-top: 20px;
                padding: 15px;
            }

            .navbar {
                height: 60px;
            }

            body {
                padding-top: 60px;
            }
            .welcome-card {
                animation: fadeInUp 0.8s ease;
            }
            
            .welcome-avatar {
                width: 150px;
                height: 150px;
                border: 3px solid #11e0a6;
                box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                transition: transform 0.3s ease;
            }
            
            .welcome-avatar:hover {
                transform: scale(1.05);
            }
            
            .quick-actions .btn {
                padding: 12px 25px;
                border-radius: 25px;
                font-weight: 500;
                transition: all 0.3s ease;
            }
            
            .quick-actions .btn-success {
                background: #28a745;
                border-color: #28a745;
            }
            
            .quick-actions .btn-success:hover {
                background: #218838;
                transform: translateY(-2px);
            }
            
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
        }
    }
    </style>
</head>
<body>
    @include('user.navreq')

    @if (Auth::user()->isadmin == 'no')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-none d-md-block sidebar">
                <div class="position-sticky">
                    <img src="{{ asset('uploads/images/' . auth()->user()->image) }}" alt="User Avatar" class="user-avatar">
                    <h5>WELCOME :  {{ auth()->user()->name }}</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home </a>
                        </li>
                        @if (Auth::user()->role=='customer')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('requests.create') }}">Requests</a>
                        </li>
                        @endif
                        @if (Auth::user()->role=='serviceProvider')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('requests.store') }}">Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/times/create">Times</a>
                        </li>
                        @endif
                    </ul>
                    <a href="/logout">
                    <button class="logout-btn">Logout</button>
                    </a>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="main-content">
                    <div class="welcome-card mb-5">
                        <div class="card border-0 shadow-lg">
                            <div class="card-header bg-primary text-white" style="background-color: #1f745d !important;" >
                                <h4 class="mb-0">
                                    <i class="fas fa-smile-beam me-2"></i>Welcome {{ auth()->user()->name }}
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-4 text-center">
                                        <img src="{{ asset('uploads/images/' . auth()->user()->image) }}" 
                                             class="welcome-avatar img-fluid rounded-circle" 
                                             alt="User Avatar">
                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="text-muted mb-4">
                                            <i class="fas fa-quote-left me-2"></i>
                                            We hope you enjoy using our services
                                            <i class="fas fa-quote-right ms-2"></i>
                                        </h5>
                                        @if (Auth::user()->role=='customer')
                                        <div class="quick-actions">
                                            <a href="{{ route('requests.create') }}" 
                                               class="btn btn-success me-3">
                                               <i class="fas fa-plus-circle me-2"></i>Create New Request
                                            </a>
                                            <a href="/requests/old"
                                               class="btn btn-outline-primary">
                                               <i class="fas fa-history me-2"></i>View Previous Requests
                                            </a>
                                        </div>
                                        @endif
                                        @if (Auth::user()->role=='serviceProvider')
                                        <div class="quick-actions">
                                            <a href="{{ route('requests.store') }}" 
                                               class="btn btn-success me-3">
                                               <i class="fas fa-plus-circle me-2"></i>Create New Offers
                                            </a>
                                            <a href="offers/accepted"
                                               class="btn btn-outline-primary">
                                               <i class="fas fa-history me-2"></i>View accepted offers
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Additional content can be added here -->
                </div>
            </main>

        </div>
    </div>
    @endif
<br>
    @if (Auth::user()->isadmin == 'yes')
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
                            <a class="nav-link" href="/users">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/allrequests">Service Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/offers">Offers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/allappointments">Appointments</a>
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
    @endif
</body>
</html>
@endauth


@guest
    <img src="{{ asset('uploads/images/auth.jpg') }}" width=500 height="500">
@endguest