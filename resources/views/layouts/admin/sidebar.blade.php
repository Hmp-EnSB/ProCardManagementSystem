<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand shadow-sm" href="/">
            <i class="align-middle" data-feather="home"></i> <span class="align-middle">Home</span>
        </a>

        <div class="border-bottom my-3 shadow-sm"></div>

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
                <a class="sidebar-link shadow-sm" href="{{ route('requests.index') }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Requests</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
