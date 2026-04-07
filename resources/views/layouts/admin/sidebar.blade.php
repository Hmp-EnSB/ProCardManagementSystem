<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand shadow-sm d-flex align-items-center" href="/" style="background-color: rgba(255, 255, 255, 0.1); transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left me-2">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            <span class="align-middle" style="color: #ffffff;">Return</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Navigation
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link shadow-sm" href="{{ route('user.index') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link shadow-sm" href="{{ route('admin.requests') }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Requests</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
