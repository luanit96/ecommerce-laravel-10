<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">Administrator</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (Auth::check())
            <div class="user-panel mt-2 mb-2 d-flex">
                <div class="image">
                    <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <ul>
                        <li>
                            <a href="{{ route('dashboard') }}" class="d-block">
                                {{ Auth::user()->email }}
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="formLogout">
                                @csrf
                                <button type="submit" class="btn btn-danger btnLogout">logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('list-categories') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list-categories') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create-categories') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('list-menus') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Menus
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list-menus') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create-menus') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add menu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('list-products') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list-products') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create-products') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add product</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('list-tags') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tags
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list-tags') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List tag</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create-tags') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add tag</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('list-sliders') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Sliders
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list-sliders') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create-sliders') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add slider</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('list-settings') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list-settings') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create-settings') . '?type=text' }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add setting text</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create-settings') . '?type=textarea' }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add setting textarea</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

@section('js')
    <script src="{{ asset('assets/vendors/sweetalert2@11.js') }}"></script>
@endsection
