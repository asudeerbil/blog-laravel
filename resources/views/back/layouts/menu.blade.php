<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.welcome') }}">
                
                <div class="sidebar-brand-text mx-3">Blog Site Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->segment(2) == 'panel' ? 'active' : '' }}">

                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Panel</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Content Management
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
    <a class="nav-link  {{ request()->segment(2) == 'articles' ? 'in' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseArticles"
        aria-expanded="true" aria-controls="collapseArticles">
        <i class="fas fa-fw fa-edit"></i>
        <span>Articles</span>
    </a>
    <div id="collapseArticles" class="collapse {{ request()->segment(2) == 'articles' ? 'show' : '' }}" aria-labelledby="headingArticles" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Article Operations:</h6>
            <a class="collapse-item {{ request()->segment(2) == 'articles' && empty(request()->segment(3)) ? 'active' : '' }}" href="{{ route('admin.articles.index') }}">All Articles</a>
            <a class="collapse-item {{ request()->segment(2) == 'articles' && request()->segment(3) == 'create' ? 'active' : '' }}" href="{{ route('admin.articles.create') }}">Create Article</a>
        </div>
    </div>
</li>

            <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.category.index') }}"
       style="{{ request()->segment(2) == 'categories' ? 'color: white !important;' : '' }}">
        <i class="fas fa-fw fa-list" style="{{ request()->segment(2) == 'categories' ? 'color: white !important;' : '' }}"></i>
        <span>Categories</span>
    </a>
</li>



            

            

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
    <a class="nav-link  {{ request()->segment(2) == 'pages' ? 'in' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseInspirationalWritings"
        aria-expanded="true" aria-controls="collapseInspirationalWritings">
        <i class="fas fa-fw fa-edit"></i>
        <span>Inspirational Writings</span>
    </a>
    <div id="collapseInspirationalWritings" class="collapse {{ request()->segment(2) == 'pages' ? 'show' : '' }}" aria-labelledby="headingInspirationalWritings" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">IW Operations:</h6>
            <a class="collapse-item {{ request()->segment(2) == 'pages' && empty(request()->segment(3)) ? 'active' : '' }}" href="{{ route('admin.pages.index') }}">All IW</a>
            <a class="collapse-item {{ request()->segment(2) == 'articles' && request()->segment(3) == 'create' ? 'active' : '' }}" href="{{ route('admin.pages.create') }}">Create IW</a>
        </div>
    </div>
</li>

            <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.abouts.index') }}"
       style="{{ request()->segment(2) == 'abouts' ? 'color: white !important;' : '' }}">
        <i class="fas fa-fw fa-list" style="{{ request()->segment(2) == 'abouts' ? 'color: white !important;' : '' }}"></i>
        <span>About Me</span>
    </a>
</li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="rounded-circle mr-2" src="{{ asset('images/1741094151.jpg') }}" alt="Profile" width="35" height="35">
        <span class="text-gray-600 small">Asude Erbil</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profilim
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
        </a>
    </div>
</li>

                    </ul>

                </nav>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                        <a href="{{route('homepage')}}" target="_blank"class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-globe fa-sm text-white-50"></i> Show Blog Site</a>
                    </div>