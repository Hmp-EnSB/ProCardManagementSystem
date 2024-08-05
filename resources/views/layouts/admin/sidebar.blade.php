<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">AdminKit</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Navigation
            </li>


            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.index') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
                </a>
            </li>

            <li class="sidebar-item">
 <a class="sidebar-link" href="{{ route('admin.requests.index') }}">
<i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Requests</span>
 </a>
 </li>

        </ul>
    </div>
</nav>
