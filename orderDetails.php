<!DOCTYPE html>
<html lang="zxx">

<?php include("partials/header.php");
include ("partials/connect.php");
if(isset($_GET["order_detail"]) && isset($_GET["order_id"])){
    $order_id = $_GET["order_id"];
    $order_cost=$_GET["order_cost"];
    $stmt=$conn->prepare("select * from order_items where order_id =?");
    $stmt->bind_param("i",$order_id);
    $stmt->execute();
    $orderDetails= $stmt->get_result();
}else{
    header("location: adminIndex.php");
    exit();
}
?>


<body>
<div class="main-sec inner-page">
    <!-- //header -->
    <?php include("partials/navbar.php")?>

</div>

<!-- //banner-->
<!--/login -->
<section class="banner-bottom py-5">
    <div class="container">
        <section id="orders" class="orders container my-5 py-3">
            <div class="container mt-2">
                <h2 class="font-weight-bold text-center">Sipariş Detayı</h2>
                <hr class="mx-auto">
            </div>

            <table class="table">
                <tr>
                    <th>Ürün Resmi</th>
                    <th>Ürün İsmi</th>
                    <th>Ürün Fiyatı</th>
                    <th>Ürün Adedi</th>
                    <th>Ara Toplam</th>

                </tr>
                <?php while ($row=$orderDetails->fetch_assoc()){ ?>

                    <tr>
                        <td>
                            <div class="product-info">
                                <div>
                                    <p class="mt-3"> <img style="border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 110px;"src="<?php echo $row["product_image"];?>"  </p>

                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="product-info">
                                <div>
                                   <a href="single.php?product_id=<?php echo $row['product_id'];?>"> <p class="mt-3"> <?php echo $row["product_name"];?> </p></a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="product-info">
                                <div>
                                    <p class="mt-3"> <?php echo $row["product_price"];?> ₺ </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="product-info">
                                <div>
                                    <p class="mt-3"> <?php echo $row["product_quantity"];?> </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="product-info">
                                <div>
                                    <p class="mt-3"> <?php echo $row["product_quantity"]*$row["product_price"] ;?> ₺ </p>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <div class="cart-total">
                <table>

                    <tr>
                        <td>Sipariş Toplamı</td>
                        <td> <?php echo $order_cost;?> ₺</td>
                    </tr>
                </table>
            </div>
        </section>
    </div>
</section>
<!-- /login -->
<?php include("partials/footer.php")?>

</body>

</html>

