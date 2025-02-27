<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anjedni Service Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="color: #416A7C">
        <div class="container">
            <a class="navbar-brand" href="/home">Home</a>
            <div class="navbar-nav">
                <a class="nav-link" href="/logout">Logout</a>
                {{-- <a class="nav-link" href="{{ route('test.requests.create') }}">Create Request</a> --}}
            </div>
        </div>
    </nav>

    <div class="container my-4">
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-4">
        © 2025 Anjedni. All rights reserved.
    </footer>
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>