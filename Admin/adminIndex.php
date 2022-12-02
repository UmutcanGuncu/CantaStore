<html>


<?php
session_start();
if(isset($_SESSION["adminId"]) && isset($_SESSION["adminUid"])){

}else{
    header("location: login.php");
}
include ("adminPartials/head.php");?>

<body>
  <!-- Sidenav -->
  <?php include ("adminPartials/sideNav.php");?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include ("adminPartials/navbar.php");?>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Anasayfa</h6>
             </div>
           </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card border-0">
            
          </div>
        </div>
      </div>
     </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <?php include ("adminPartials/scripts.php");?>
</body>

</html>
