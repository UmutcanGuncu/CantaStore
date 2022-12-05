<html>
<?php
session_start();
if(isset($_SESSION["adminId"]) && isset($_SESSION["adminUid"])){

}else{
    header("location: login.php");
}
include ("adminPartials/head.php");
include ("include/connect.php");
if(isset($_POST["detail"])){

    $order_id = $_POST["order_id"];
    $order_cost=$_POST["order_cost"];
    $stmt=$conn->prepare("select * from order_items where order_id =?");
    $stmt->bind_param("i",$order_id);
    $stmt->execute();
    $orderDetails= $stmt->get_result();
}elseif (isset($_POST["status"])){
    $order_id = $_POST["order_id"];
    $order_status="Kargoya Verildi";
    $stmt=$conn->prepare("update orders set order_status=? where order_id=?");
    $stmt->bind_param("si",$order_status,$order_id);
    $stmt->execute();
    header("location: orders.php");
    exit();
}
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
                        <h6 class="h2 text-white d-inline-block mb-0">Sipariş İçeriği</h6>
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
                    <section id="orders" class="orders container my-5 py-3">
                        <div class="container mt-2">
                            <h2 class="font-weight-bold text-center">Sipariş Detayı</h2>
                            <hr class="mx-auto">
                        </div>

                        <table class="table align-items-center table-flush">
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
                                                <p class="mt-3"> <img style="border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 110px;"src="../<?php echo $row["product_image"];?>"  </p>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-info">
                                            <div>
                                                <a href="../single.php?product_id=<?php echo $row['product_id'];?>"> <p class="mt-3"> <?php echo $row["product_name"];?> </p></a>
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
            </div>
        </div>
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<?php include ("adminPartials/scripts.php");?>
</body>

</html>
