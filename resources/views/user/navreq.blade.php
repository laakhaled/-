<nav class="navbar navbar-expand-sm navbar-light">
    <!-- بقية الكود كما هو بدون تغيير -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03">
        <span class="navbar-toggler-icon"></span>
    </button>
    <img class="logo" src="images/logo1.png" alt="">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="http://127.0.0.1:8000/#">Home Page</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('requests.create') }}">Create Request</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('requests.store') }}">Requests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}" >Your Profile</a>
      </li>
        <li class="nav-item">
            <a class="nav-link" href="http://127.0.0.1:8000/#">Logout</a>
        </li>
      </ul>
    </div>
  </nav>