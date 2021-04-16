<?php  ?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/home.png" alt="real_estate Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Real Estate</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block"><?php echo $_SESSION['ADMIN_NAME'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="categories.php" class="nav-link">
              <i class="nav-icon fa fa-cube "></i>
              <p>Properties Type</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="properties.php" class="nav-link">
              <i class="nav-icon fa fa-cube "></i>
              <p>Properties Master</p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="enquire.php" class="nav-link">
              <i class="nav-icon fa fa-boxes "></i>
              <p>Enquire Master</p>
            </a>
          </li>-->
          <li class="nav-item">
            <a href="users.php" class="nav-link">
              <i class="nav-icon fa fa-user "></i>
              <p>User Master</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="banner.php" class="nav-link">
              <i class="nav-icon fa fa-image "></i>
              <p>Banner Master</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="contact_us.php" class="nav-link">
              <i class="nav-icon fa fa-phone "></i>
              <p>Contact us</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
