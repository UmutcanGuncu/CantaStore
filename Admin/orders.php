<html>
<?php
session_start();
if(isset($_SESSION["adminId"]) && isset($_SESSION["adminUid"])){

}else{
    header("location: login.php");
}
include ("adminPartials/head.php");
include ("include/connect.php");
$stmt = $conn->prepare("select * from orders order by order_id desc ");
$stmt->execute();
$orders=$stmt->get_result();
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
                        <h6 class="h2 text-white d-inline-block mb-0">Tüm Siparişler</h6>
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
                    <section class="banner-bottom py-5">
                        <div class="container">
                            <section id="orders" class="orders container my-5 py-3">
                                <div class="container mt-2">
                                    <h2 class="font-weight-bold text-center">Siparişler</h2>
                                    <hr class="mx-auto">
                                </div>

                                <table class="table align-items-center table-flush">
                                    <tr>
                                        <th>#</th>
                                        <th>Sipariş Toplam Fiyatı</th>
                                        <th>Sipariş Durumu</th>
                                        <th>Sipariş Tarihi</th>
                                        <th>Detay Göster</th>

                                    </tr>
                                    <?php while ($row=$orders->fetch_assoc()){ ?>
                                    <form method="post" action="orderDetails.php">
                                        <tr>
                                            <td>
                                                <div class="product-info">
                                                    <div>
                                                        <p class="mt-3"> <?php echo $row["order_id"];?> </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-info">
                                                    <div>
                                                        <p class="mt-3"> <?php echo $row["order_cost"]; ?> TL </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-info">
                                                    <div>
                                                        <p class="mt-3"> <?php echo $row["order_status"]; ?>  </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-info">
                                                    <div>
                                                        <p class="mt-3"> <?php echo $row["order_date"];?> </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-info">
                                                    <div>
                                                        <p class="mt-3"> <input type="submit" class="btn btn-outline-info" name="detail" value="Sipariş Detayı"> </p>
                                                        <input type="hidden" name="order_id" value="<?php echo $row["order_id"];?>">
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    </form>
                                    <?php }?>
                                </table>

                            </section>
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
