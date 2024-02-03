<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link text-center">
        <span class="brand-text text-capitalize font-weight-bold" style="font-size: 30px;color: #44bedc;">
            Administrator</span>
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

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                @canany(['list-category', 'add-category'])
                    <li class="nav-item has-treeview">
                        <a class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Categories
                                <i class="fas fa-angle-left right"></i>
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('list-category')
                                <li class="nav-item">
                                    <a href="{{ route('list-categories') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List category</p>
                                    </a>
                                </li>
                            @endcan
                            @can('add-category')
                                <li class="nav-item">
                                    <a href="{{ route('create-categories') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add category</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['list-menu', 'add-menu'])
                    <li class="nav-item has-treeview">
                        <a class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Menus
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('list-menu')
                                <li class="nav-item">
                                    <a href="{{ route('list-menus') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List menu</p>
                                    </a>
                                </li>
                            @endcan
                            @can('add-menu')
                                <li class="nav-item">
                                    <a href="{{ route('create-menus') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add menu</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['list-product', 'add-product'])
                    <li class="nav-item has-treeview">
                        <a class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Products
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('list-product')
                                <li class="nav-item">
                                    <a href="{{ route('list-products') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List product</p>
                                    </a>
                                </li>
                            @endcan
                            @can('add-product')
                                <li class="nav-item">
                                    <a href="{{ route('create-products') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add product</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @can('list-product-image')
                    <li class="nav-item has-treeview">
                        <a href="{{ route('list-product-image') }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            Product Image
                        </a>
                    </li>
                @endcan
                @can('list-product-tag')
                    <li class="nav-item has-treeview">
                        <a href="{{ route('list-product-tag') }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            Product Tag
                        </a>
                    </li>
                @endcan
                @canany(['list-tag', 'add-tag'])
                    <li class="nav-item has-treeview">
                        <a class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Tags
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('list-tag')
                                <li class="nav-item">
                                    <a href="{{ route('list-tags') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List tag</p>
                                    </a>
                                </li>
                            @endcan
                            @can('add-tag')
                                <li class="nav-item">
                                    <a href="{{ route('create-tags') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add tag</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['list-slider', 'add-slider'])
                    <li class="nav-item has-treeview">
                        <a class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Sliders
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('list-slider')
                                <li class="nav-item">
                                    <a href="{{ route('list-sliders') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List slider</p>
                                    </a>
                                </li>
                            @endcan
                            @can('add-slider')
                                <li class="nav-item">
                                    <a href="{{ route('create-sliders') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add slider</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['list-setting', 'add-setting'])
                    <li class="nav-item has-treeview">
                        <a class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Settings
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('list-setting')
                                <li class="nav-item">
                                    <a href="{{ route('list-settings') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List setting</p>
                                    </a>
                                </li>
                            @endcan
                            @can('add-setting')
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
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['list-user', 'add-user'])
                    <li class="nav-item has-treeview">
                        <a class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Users
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('list-user')
                                <li class="nav-item">
                                    <a href="{{ route('list-users') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List user</p>
                                    </a>
                                </li>
                            @endcan
                            @can('add-user')
                                <li class="nav-item">
                                    <a href="{{ route('create-users') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add user</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['list-role', 'add-role'])
                    <li class="nav-item has-treeview">
                        <a class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Roles
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('list-role')
                                <li class="nav-item">
                                    <a href="{{ route('list-roles') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List role</p>
                                    </a>
                                </li>
                            @endcan
                            @can('add-role')
                                <li class="nav-item">
                                    <a href="{{ route('create-roles') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add role</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['list-permission', 'add-permission'])
                    <li class="nav-item has-treeview">
                        <a class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Permissions
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('list-permission')
                                <li class="nav-item">
                                    <a href="{{ route('list-permissions') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List permission</p>
                                    </a>
                                </li>
                            @endcan
                            @can('add-permission')
                                <li class="nav-item">
                                    <a href="{{ route('create-permissions') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add permission</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @can('list-user-role')
                    <li class="nav-item has-treeview">
                        <a href="{{ route('list-user-role') }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            User Role
                        </a>
                    </li>
                @endcan
                @can('list-permission-role')
                    <li class="nav-item has-treeview">
                        <a href="{{ route('list-permission-role') }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            Permission Role
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
    </div> <!-- end sidebar -->
</aside>
