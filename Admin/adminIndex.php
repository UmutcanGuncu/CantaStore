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
            <?php
                include ("include/connect.php");
                $stmt =$conn->prepare("select * from users");
                $stmt->execute();
                $users=$stmt->get_result();
            ?>
          <div class="card border-0">
              <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                      <tr>
                          <th scope="col" class="sort" data-sort="name">ID</th>
                          <th scope="col" class="sort" data-sort="budget">Adı Soyadı</th>
                          <th scope="col" class="sort" data-sort="status">E Posta Adresi</th>
                          <th scope="col">Kullanıcı Adı</th>

                      </tr>
                      </thead>
                      <tbody class="list">
                      <?php while ($row=$users->fetch_assoc()){ ?>
                      <tr>
                          <th scope="row">
                              <div class="media align-items-center">
                                  <div class="media-body">
                                      <span class="name mb-0 text-sm"><?php echo $row["user_id"]; ?></span>
                                  </div>
                              </div>
                          </th>
                          <td class="budget">
                              <?php echo $row["user_name"]; ?>
                          </td>
                          <td>

                              <?php echo $row["user_email"]; ?>

                          </td>
                          <td>
                              <?php echo $row["userUid"]; ?>
                          </td>

                      </tr>
                    <?php }?>
                      </tbody>
                  </table>
              </div>
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
