<title>Concern and Complaint Reporting System | Dashboard</title>
<?php require_once 'sidebar.php'; ?>
  
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
                $blotter = mysqli_query($conn, "SELECT blotter_Id from blotter WHERE added_by=$id");
                $row_blotter = mysqli_num_rows($blotter);
              ?>
              <h3><?= $row_blotter ?></h3>
              <p>Blotter records</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="blotter.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>


        


        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <?php
                $compaint = mysqli_query($conn, "SELECT complaint_ID from complaint WHERE added_by=$id");
                $row_compaint = mysqli_num_rows($compaint);
              ?>
              <h3><?= $row_compaint ?></h3>
              <p>Complaints</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="complaint.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        

      </div>
    </div>
  </section>


<?php include '../includes/footer.php'; ?>
