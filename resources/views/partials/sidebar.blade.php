<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">Administrator</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-2 mb-2 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}" class="d-block">
                            @if (Auth::check())
                                {{ Auth::user()->email }}
                            @endif
                        </a>
                    </li>
                    <form method="POST" action="{{ route('logout') }}" id="form-logout">
                        @csrf
                        <li><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#modal-logout">logout</button></li>
                    </form>
                </ul>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('list-categories') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('list-menus') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Menus</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('list-products') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Products</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
