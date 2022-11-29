<!DOCTYPE html>
<html lang="zxx">

<?php include("partials/header.php");
error_reporting(0);
include ("partials/connect.php");
session_start();


foreach ($_SESSION["cart"] as $key=>$value)
{
    $product = $_SESSION["cart"][$key];
    $product_id = $product['product_id'];
    $product_stock = $product['product_stock'];
    $product_quantity = $product['product_quantity'];
    $new_product_stock = $product_stock-$product_quantity;
    $sql = "UPDATE products SET product_stock='$new_product_stock' WHERE product_id=$product_id";
    $conn->query($sql);
}




?>


<body>
    <div class="main-sec inner-page">
       <?php include("partials/navbar.php")?>
    </div>
    <!-- //banner-->
    <!--/banner-bottom -->

    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <p><?php echo $_GET['order_status'];?></p>
            <p>Toplam Tutar = <?php echo $_SESSION['total'];?></p>
            <a href="index.php" class="btn btn-primary">Anasayfaya Dön</a>
            <?php unset($_SESSION['cart']);?>
        </div>
    </section>
    <!-- /banner-bottom -->
   
   <?php include("partials/footer.php")?>

</body>

</html>