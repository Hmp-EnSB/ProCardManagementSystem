<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="/" class="logo d-flex align-items-center p-2 rounded shadow-sm" style="background-color: rgba(255, 255, 255, 0.1); transition: all 0.3s ease;">
        <div class="logo-icon me-2">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left text-white">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
          </svg>
        </div>
        <div class="logo-text">
          <h6 class="mb-0 text-light">Return</h6>
        </div>
      </a>

      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
          <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
          <i class="gg-menu-left"></i>
        </button>
      </div>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>
    <!-- End Logo Header -->
  </div>

  <div class="border-bottom my-3 shadow-sm"></div>

  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#cardRequest">
            <i class="fas fa-credit-card"></i>
            <p>Card Request</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="cardRequest">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ route('request.create') }}">
                  <i class="fas fa-plus-circle"></i>
                  <span class="sub-item">Make Request</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->