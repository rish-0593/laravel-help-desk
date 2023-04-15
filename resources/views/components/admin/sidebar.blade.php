<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="javascript:void(0):">
                <span class="logo-name">{{ config('helpdesk.app_name') }}</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="dropdown">
                <a href="{{ url('/') }}" class="nav-link">
                    <i data-feather="monitor"></i><span>Back to Dashboard</span>
                </a>
            </li>

            <li class="menu-header">HelpDesk</li>
            <li class="dropdown {{ Route::is('admin.tickets.categories.index') ? 'active' : '' }}">
                <a href="{{ route('admin.tickets.categories.index') }}" class="nav-link">
                    <i data-feather="monitor"></i><span>Categories</span>
                </a>
            </li>

            <li class="dropdown {{ Route::is('admin.tickets.status.index') ? 'active' : '' }}">
                <a href="{{ route('admin.tickets.status.index') }}" class="nav-link">
                    <i data-feather="monitor"></i><span>Status</span>
                </a>
            </li>

            <li class="dropdown {{ Route::is('admin.tickets.index') ? 'active' : '' }}">
                <a href="{{ route('admin.tickets.index') }}" class="nav-link">
                    <i data-feather="monitor"></i><span>Tickets</span>
                </a>
            </li>

            <br><br><br><br><br>
        </ul>
    </aside>
</div>
