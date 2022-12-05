<html>


<?php
session_start();
include ("include/connect.php");
if(isset($_SESSION["adminId"]) && isset($_SESSION["adminUid"])){

}else{
    header("location: login.php");
}
if(isset($_POST["add_submit"])){
    $product_name=$_POST["product_name"];
    $product_category=$_POST["product_category"];
    $product_description =$_POST["product_description"];
    $product_image=$_POST["product_image"];
    $product_price = $_POST["product_price"];
    $product_color=$_POST["product_color"];
    $product_stock= $_POST["product_stock"];
    $product_special_offer=0;
    $stmt= $conn->prepare("Insert into products(product_name,product_category,product_description,product_image,
                     product_price,product_color,product_stock,product_special_offer)
values (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssisii",$product_name,$product_category,$product_description,$product_image,$product_price,$product_color,$product_stock,$product_special_offer);
    $stmt->execute();
    header("location: products.php");

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
                        <h6 class="h2 text-white d-inline-block mb-0">Ürün Ekleme Sayfası</h6>
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
                    <form method="post" action="addProduct.php"
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ürün Adı</label>
                        <input type="text" class="form-control" name="product_name" placeholder="Ürün İsmini Giriniz">

                        <label for="exampleInputEmail1" class="form-label">Kategori</label>
                        <input type="text" class="form-control" name="product_category" placeholder="Kategori Bilgisi Giriniz">

                        <label for="exampleInputEmail1" class="form-label">Ürün Açıklaması</label>
                        <input type="text" class="form-control" name="product_description" placeholder="Ürün Açıklaması Giriniz">

                        <label for="exampleInputEmail1" class="form-label">Resim Adresi</label>
                        <input type="text" class="form-control" name="product_image" placeholder="Resim Adresini Giriniz">

                        <label for="exampleInputEmail1" class="form-label">Ürün Fiyatı</label>
                        <input type="text" class="form-control" name="product_price" placeholder="Ürün Fiyatını Giriniz">

                        <label for="exampleInputEmail1" class="form-label">Ürün Rengi</label>
                        <input type="text" class="form-control"  name="product_color" placeholder="Renk Giriniz">

                        <label for="exampleInputEmail1" class="form-label">Stok Sayısı</label>
                        <input type="text" class="form-control" name="product_stock" placeholder="Stok Sayısı Giriniz">

                        <input type="submit" name="add_submit" class="btn btn-outline-success">
                    </div>
                   </form>
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
