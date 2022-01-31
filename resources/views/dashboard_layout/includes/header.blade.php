<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('authentication.dashboard')}}" class="nav-link">Dashboard</a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
        </li>


        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('authentication.logout')}}" class="nav-link">logout</a>
        </li>
    </ul>
</nav>
