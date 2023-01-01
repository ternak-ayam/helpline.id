<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}">HL</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">
            Translator
        </li>
        <li class="dropdown {{ is_drop_active('counselling') }}">
            <a href="#" class="nav-link has-dropdown">
                <i class="fas fa-notes-medical"></i> <span>Counselling</span>
            </a>
            <ul class="dropdown-menu">
                <li {{ is_nav_active('schedule') }}>
                    <a class="nav-link" href="{{ route('translator.counselling.schedule.index') }}">
                        <i class="fas fa-calendar"></i> <span>Schedule</span>
                    </a>
                </li>
                <li {{ is_nav_active('statistics') }}>
                    <a class="nav-link" href="#">
                        <i class="fas fa-chart-bar"></i> <span>Statistics</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
