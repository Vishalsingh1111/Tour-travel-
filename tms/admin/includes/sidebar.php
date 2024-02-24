<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon">
      <img src="img/logo/travel.png">
    </div>
    <div class="sidebar-brand-text mx-3">Travii</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Features
    </div>

   <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#packageForm" aria-expanded="true" aria-controls="collapseForm">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>Content Management</span>
    </a>
    <div id="packageForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Package</h6>
        <a class="collapse-item" href="create_package.php">Create Package</a>
        <a class="collapse-item" href="manage_packages.php">manage packages</a>
        <!-- <a class="collapse-item" href="create_package.php">Create Blogs</a>
        <a class="collapse-item" href="manage_packages.php">manage Blogs</a> -->
      </div>
    </div>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="manage_bookings.php">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Bookings</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="manage_users.php">
      <i class="fas fa-fw fa-user"></i>
      <span>Users</span>
    </a>
  </li>
    
</ul>