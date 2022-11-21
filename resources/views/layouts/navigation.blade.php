<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                <ul class="navbar-nav navbar-nav-left">
                    <li class="nav-item ms-0 me-5 d-lg-flex d-none">
                        <a href="#" class="nav-link horizontal-nav-left-menu"><i class="mdi mdi-format-list-bulleted"></i></a>
                    </li>
                    @if (Auth::user()->hasRole('admin'))

                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
                                <i class="mdi mdi-email mx-0"></i>
                                <span class="count bg-primary">4</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                                <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                                @foreach (get_users() as $user)
                                    <a class="dropdown-item preview-item" href="#">
                                        <div class="preview-thumbnail">
                                            <img src="{{asset('assets/images/faces/face4.jpg')}}" alt="image" class="profile-pic">
                                        </div>
                                        <div class="preview-item-content flex-grow">
                                            <h6 class="preview-subject ellipsis font-weight-normal">{{$user->name}}
                                            </h6>
                                            <p class="font-weight-light small-text text-muted mb-0">
                                                {{get_last_msg($user->id)}}
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator d-flex justify-content-center align-items-center"  href="{{route('user-messages')}}">
                                <i class="mdi mdi-email mx-0"></i>
                            </a>
                        </li>
                    @endif
                </ul>
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="{{route('dashboard')}}"><img src="{{asset('assets/images/pnp-removebg-preview.png')}}" alt="logo"/></a>
                    <a class="navbar-brand brand-logo-mini" href="{{route('dashboard')}}"><img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo"/></a>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    @if (Auth::user()->hasRole('admin'))
                        <li class="nav-item dropdown  d-lg-flex d-none">
                            <button type="button" class="btn btn-inverse-primary btn-sm">Products </button>
                        </li>
                        <li class="nav-item dropdown d-lg-flex d-none">
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="nreportDropdown">
                                <p class="mb-0 font-weight-medium float-left dropdown-header">Reports</p>
                                <a class="dropdown-item">
                                <i class="mdi mdi-file-pdf text-primary"></i>
                                    Pdf
                                </a>
                            </div>
                        </li>
                    @elseif (Auth::user()->hasRole('user'))
                        <li class="nav-item dropdown  d-lg-flex d-none">
                            <a href="{{route('user-checks')}}" class="btn btn-inverse-primary btn-sm">
                                Verify Product
                            </a>
                        </li>
                    @endif
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">{{Auth::user()->name}}</span>
                        <span class="online-status"></span>
                        <img src="{{asset('assets/images/faces/face28.png')}}" alt="profile"/>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="mdi mdi-settings text-primary"></i>
                                Settings
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                            <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </div>
    </nav>
    <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
                @if (Auth::user()->hasRole('admin'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')}}">
                            <i class="mdi mdi-file-document-box menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin-products')}}">
                            <i class="mdi mdi-cube-outline menu-icon"></i>
                            <span class="menu-title">Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin-sales')}}" class="nav-link">
                            <i class="mdi mdi-chart-areaspline menu-icon"></i>
                            <span class="menu-title">Sales</span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin-users')}}">
                            <i class="mdi mdi-account menu-icon"></i>
                            <span class="menu-title">Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin-account')}}">
                            <i class="mdi mdi-account menu-icon"></i>
                            <span class="menu-title">Accounts</span>
                        </a>
                    </li>
                @elseif (Auth::user()->hasRole('user'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user-dashboard')}}">
                            <i class="mdi mdi-cube-outline menu-icon"></i>
                            <span class="menu-title">POS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user-sales')}}" class="nav-link">
                            <i class="mdi mdi-chart-areaspline menu-icon"></i>
                            <span class="menu-title">Sales</span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
