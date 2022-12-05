<html>


<?php
session_start();
if(isset($_SESSION["adminId"]) && isset($_SESSION["adminUid"])){

}else{
    header("location: login.php");
}
include ("include/connect.php");
if(isset($_POST["delete_product"])){
    $product_id=$_POST["product_id"];
    $stmt= $conn->prepare("delete from products where product_id=?");
    $stmt->bind_param("i",$product_id);
    $stmt->execute();
    header("location: products.php?message=productDeleted");
}else if(isset($_POST["update_product"])){
    $product_id=$_POST["product_id"];
    $stmt=$conn->prepare("Select * from products where product_id=?");
    $stmt->bind_param("i",$product_id);
    $stmt->execute();
     $products=$stmt->get_result();
}else{
    //header("location: products.php");
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
                        <h6 class="h2 text-white d-inline-block mb-0">Ürün İşlemleri</h6>
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
                    <?php  while($row =$products->fetch_assoc()){ ?>
                    <form method="post" action="include/updateProduct.php">
                        <div class="form-group">
                            <input type="hidden" name="product_idd" value="<?php  echo $row["product_id"];?>">
                            <label for="exampleInputEmail1">Ürün Adı</label>
                            <input type="text" name="product_name" class="form-control" value="<?php echo $row["product_name"];?>" >
                         </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ürün Kategorisi</label>
                            <input type="text" name="product_category" class="form-control"  value="<?php echo $row["product_category"];?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ürün Açıklaması</label>
                            <input type="text"  name="product_description" class="form-control" value="<?php echo $row["product_description"];?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ürün Resim Adresi</label>
                            <input type="text" name="product_image" class="form-control" value="<?php echo $row["product_image"];?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ürün Fiyatı</label>
                            <input type="text" name="product_price" class="form-control" value="<?php echo $row["product_price"];?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ürün Rengi</label>
                            <input type="text" name="product_color" class="form-control" value="<?php echo $row["product_color"];?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ürün Stoğu</label>
                            <input type="text" name="product_stock" class="form-control" value="<?php echo $row["product_stock"];?>">
                        </div>
                         <button type="submit" name="submit" class="btn btn-primary">Güncelle</button>
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Argon Scripts -->
<?php include ("adminPartials/scripts.php");
?>
<!-- Core -->

</body>

</html>
