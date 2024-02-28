<?php
  require_once '../config.php';
  if(isset($_SESSION['user_Id']) && isset($_SESSION['login_time'])) {
    $id = $_SESSION['user_Id'];
    $users = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$id'");
    $row = mysqli_fetch_array($users);

    $login_time = $_SESSION['login_time'];
    // RECORD TIME LOGGED IN TO BE USED IN AUTO LOGOUT - CODE CAN BE FOUND ON ../INCLUDES/FOOTER.PHP
    $_SESSION['last_active'] = time();
    require_once '../includes/header.php';
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="dashboard.php" class="brand-link">
    <img src="../images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">CCRS</span>
    <br>
    <span class="text-sm ml-5 font-weight-light mt-2">&nbsp;&nbsp;Calit Binmaley, Pangasinan</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-4 pb-2 pt-3 mb-3 d-flex">
      <div class="image">
        <?php //if($row['image'] == ""): ?>
        <img src="../dist/img/avatar.png" alt="User Avatar" class="img-size-50 img-circle">
        <?php //else: ?>
        <img src="../images-users/<?php //echo $row['image']; ?>" alt="User Image" style="height: 34px; width: 34px; border-radius: 50%;">
        <?php //endif; ?>
      </div>
      <div class="info">
        <a href="profile.php" class="d-block"><?php //echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></a>
      </div>
    </div> -->
    
    <!-- SidebarSearch Form -->
    <!--   <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> -->
    <!-- Sidebar Menu -->
    <nav class="mt-1">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>"><i class="fa-solid fa-gauge"></i><p>&nbsp;&nbsp; Dashboard</p></a>
        </li>
        <li class="nav-item">
          <a href="complaint.php" class="nav-link <?php echo in_array(basename($_SERVER['PHP_SELF']), ['complaint.php', 'complaint_mgmt.php', 'complaint_view.php']) ? 'active' : ''; ?>">
            <i class="far fa-comment-alt nav-icon"></i>
            <p>Complaints</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="blotter.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'blotter.php' || basename($_SERVER['PHP_SELF']) == 'blotter_add.php' || basename($_SERVER['PHP_SELF']) == 'blotter_update.php' || basename($_SERVER['PHP_SELF']) == 'blotter_view.php') ? 'active' : ''; ?>">
            <i class="fas fa-balance-scale nav-icon"></i>
            <p>Blotter</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="log_history.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>"><i class="fas fa-list-alt"></i><p>&nbsp;&nbsp; Log history</p></a>
        </li>
        
        
      </ul>
    </nav>
  </div>
</aside>
<?php
// ------------------------------CLOSING THE SESSION OF THE LOGGED IN USER WITH else statement----------//
} else {
header('Location: ../login.php');
}
?>