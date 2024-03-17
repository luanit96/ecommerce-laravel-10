<!-- navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
    </ul>
    @if (Auth::check())
        <ul class="navbar-nav ml-auto">
            <div class="btn-group dropleft">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('home') }}">Home</a>
                    <form action="{{ route('logout') }}" method="POST" class="formLogout">
                        @csrf
                        <button type="submit" class="dropdown-item btnLogout">Logout</button>
                    </form>
                </div>
            </div>
        </ul>
    @endif
</nav>
<!-- end navbar -->
