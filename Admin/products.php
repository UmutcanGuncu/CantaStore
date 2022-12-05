<html>
<?php
session_start();
if(isset($_SESSION["adminId"]) && isset($_SESSION["adminUid"])){

}elseif (isset($_GET["message"])=="productDeleted"){
    echo "<script>alert('Ürün Başarıyla Silindi')</script>";
}
else{
    header("location: login.php");
}
include ("adminPartials/head.php");
include ("include/connect.php");
$stmt = $conn->prepare("Select * from products");
$stmt->execute();
$product=$stmt->get_result();
?>

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
              <h6 class="h2 text-white d-inline-block mb-0">Ürünler</h6>
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
              <div class="table-responsive">
              <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                  <tr>
                      <th scope="col" class="sort" data-sort="name">Ürün Adı</th>
                      <th scope="col" class="sort" data-sort="budget">Ürün Açıklaması</th>
                      <th scope="col" class="sort" data-sort="status">Ürün Fiyatı</th>
                      <th scope="col">Stok Sayısı</th>
                      <th scope="col"></th>
                  </tr>
                  </thead>
                  <tbody class="list">
                  <?php while($row = $product->fetch_assoc()){ ?>
                          <form method="post" action="productOperations.php">

                  <tr>
                      <th scope="row">
                          <div class="media align-items-center">
                              <a href="#" class="avatar rounded-circle mr-3">
                                  <input type="hidden" name="product_id" value="<?php echo $row["product_id"];?>">
                                  <img alt="Image placeholder" src="../<?php echo $row["product_image"];?>">
                              </a>
                              <div class="media-body">
                                  <span class="name mb-0 text-sm"><?php echo $row["product_name"];?></span>
                              </div>
                          </div>
                      </th>
                      <td class="budget">
                          <?php echo $row["product_description"];?>
                      </td>
                      <td>
                      <span class="badge badge-dot mr-4">
                        <span class="status"><?php echo $row["product_price"];?> TL</span>
                      </span>
                      </td>
                      <td>
                          <span class="status"><?php echo $row["product_stock"];?> Adet</span>
                      </td>
                      <td class="text-right">
                          <div class="dropdown">
                              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                  <input type="submit" name="delete_product" class="dropdown-item" value="Sil">
                                  <input type="submit" name="update_product" class="dropdown-item"  value="Güncelle">
                              </div>
                          </div>
                      </td>
                  </tr>
                          </form>
                  <?php } ?>
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
