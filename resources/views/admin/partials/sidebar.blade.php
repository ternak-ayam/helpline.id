<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="#">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">HL</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">
            @auth('admin')
                Admin
            @elseauth('translator')
                Translator
            @else
                Psychologist
            @endauth
        </li>
        @auth('admin')
        <li class="dropdown {{ is_drop_active('list') }}">
            <a href="#" class="nav-link has-dropdown">
                <i class="fas fa-users"></i> <span>Users</span>
            </a>
            <ul class="dropdown-menu">
                <li {{ is_nav_active('user') }}>
                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                        <i class="fas fa-users"></i> <span>Users</span>
                    </a>
                </li>
                <li {{ is_nav_active('psychologist') }}>
                    <a class="nav-link" href="{{ route('admin.user.psychologist.index') }}">
                        <i class="fas fa-users-cog"></i> <span>Psychologists</span>
                    </a>
                </li>
                <li {{ is_nav_active('/translator') }}>
                    <a class="nav-link" href="{{ route('admin.user.translator.index') }}">
                        <i class="fas fa-user-friends"></i> <span>Translators</span>
                    </a>
                </li>
            </ul>
        </li>
        @endauth
        <li class="dropdown {{ is_drop_active('counselling') }}">
            <a href="#" class="nav-link has-dropdown">
                <i class="fas fa-notes-medical"></i> <span>Counselling</span>
            </a>
            <ul class="dropdown-menu">
                <li {{ is_nav_active('schedule') }}>
                    <a class="nav-link" href="{{ route('admin.counselling.schedule.index') }}">
                        <i class="fas fa-calendar"></i> <span>Schedule</span>
                    </a>
                </li>
                <li {{ is_nav_active('data') }}>
                    <a class="nav-link" href="{{ route('admin.counselling.data.index') }}">
                        <i class="fas fa-phone"></i> <span>Data</span>
                    </a>
                </li>
                <li {{ is_nav_active('statistics') }}>
                    <a class="nav-link" href="{{ route('admin.counselling.statistics.index') }}">
                        <i class="fas fa-chart-bar"></i> <span>Statistics</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown {{ is_drop_active('blog') }}">
            <a href="#" class="nav-link has-dropdown">
                <i class="fas fa-edit"></i> <span>Blogs</span>
            </a>
            <ul class="dropdown-menu">
                <li {{ is_nav_active('post/*/create') }}>
                    <a class="nav-link" href="{{ route('admin.blog.post.create', rand()) }}">
                        <i class="fas fa-edit"></i> <span>Create New Post</span>
                    </a>
                </li>
                <li {{ is_nav_active('posts') }}>
                    <a class="nav-link" href="{{ route('admin.blog.post.index') }}">
                        <i class="fas fa-list"></i> <span>Post List</span>
                    </a>
                </li>
            </ul>
        </li>
          <li class="dropdown {{ is_drop_active('admin/cities') }}">
            <a href="#" class="nav-link has-dropdown">
                <i class="fas fa-city"></i> <span>Cities</span>
            </a>
            <ul class="dropdown-menu">
                <li {{ is_nav_active('admin/cities') }}>
                    <a class="nav-link" href="{{ route('admin.city.list') }}">
                        <i class="fas fa-list"></i> <span>Cities List</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
