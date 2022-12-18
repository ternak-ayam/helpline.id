<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="#">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">HL</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">ADMIN</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown">
                <i class="fas fa-users"></i> <span>Users</span>
            </a>
            <ul class="dropdown-menu">
                <li {{ is_nav_active('user') }}>
                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                        <i class="fas fa-users"></i> <span>Users</span>
                    </a>
                </li>
                <li {{ is_nav_active('user') }}>
                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                        <i class="fas fa-users-cog"></i> <span>Psychologists</span>
                    </a>
                </li>
                <li {{ is_nav_active('user') }}>
                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                        <i class="fas fa-user-friends"></i> <span>Translators</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown">
                <i class="fas fa-notes-medical"></i> <span>Counselling</span>
            </a>
            <ul class="dropdown-menu">
                <li {{ is_nav_active('dashboard') }}>
                    <a class="nav-link" href="#">
                        <i class="fas fa-calendar"></i> <span>Schedule</span>
                    </a>
                </li>
                <li {{ is_nav_active('dashboard') }}>
                    <a class="nav-link" href="#">
                        <i class="fas fa-phone"></i> <span>Data</span>
                    </a>
                </li>
                <li {{ is_nav_active('dashboard') }}>
                    <a class="nav-link" href="#">
                        <i class="fas fa-phone"></i> <span>Join Counselling</span>
                    </a>
                </li>
                <li {{ is_nav_active('dashboard') }}>
                    <a class="nav-link" href="#">
                        <i class="fas fa-file-signature"></i> <span>Patient Records</span>
                    </a>
                </li>
                <li {{ is_nav_active('dashboard') }}>
                    <a class="nav-link" href="#">
                        <i class="fas fa-chart-bar"></i> <span>Statistics</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown">
                <i class="fas fa-edit"></i> <span>Blogs</span>
            </a>
            <ul class="dropdown-menu">
                <li {{ is_nav_active('dashboard') }}>
                    <a class="nav-link" href="#">
                        <i class="fas fa-edit"></i> <span>Create New Post</span>
                    </a>
                </li>
                <li {{ is_nav_active('dashboard') }}>
                    <a class="nav-link" href="#">
                        <i class="fas fa-list"></i> <span>Post List</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
