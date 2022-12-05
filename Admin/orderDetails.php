<html>


<?php
session_start();
include ("include/connect.php");
if(isset($_SESSION["adminId"]) && isset($_SESSION["adminUid"])){

}else{
    header("location: login.php");
}if(isset($_POST["detail"])){
$order_id=$_POST["order_id"];
echo $order_id;
$stmt = $conn->prepare("select * from orders where order_id=?");
$stmt->bind_param("i",$order_id);
$stmt->execute();

$orders=$stmt->get_result();
}else{
    header("location: orders.php");
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
                        <h6 class="h2 text-white d-inline-block mb-0">Sipariş Detayı</h6>
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
                    <table class="table align-items-center table-flush">
                        <tr>

                            <th>Sipariş Toplam Fiyatı</th>
                            <th>Sipariş Durumu</th>
                            <th>Kullanıcı İd</th>
                            <th>Kullanıcı Tel</th>
                            <th>Kullanıcı Adres</th>
                            <th>Kullanıcı Şehir</th>
                            <th>Sipariş Tarihi</th>


                        </tr>
                        <?php while ($row=$orders->fetch_assoc()){ ?>
                            <form method="post" action="orderContent.php">
                                <tr>

                                    <td>
                                        <div class="col-md-auto">
                                            <div>
                                                <p class="mt-3"> <?php echo $row["order_cost"]; ?> TL </p>
                                                <input type="hidden" name="order_cost" value="<?php echo $row["order_cost"]; ?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-auto">
                                            <div>
                                                <p class="mt-3"> <?php echo $row["order_status"]; ?> </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-auto">
                                            <div>
                                                <p class="mt-3"> <?php echo $row["user_id"]; ?> </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-auto">
                                            <div>
                                                <p class="mt-3"> <?php echo $row["user_phone"]; ?> </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-auto">
                                            <div>
                                                <p class="mt-3"> <?php echo $row["user_address"]; ?>  </p>
                                            </div>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="col-md-auto">
                                            <div>
                                                <p class="mt-3"> <?php echo $row["user_city"];?> </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-auto">
                                            <div>
                                                <p class="mt-3"> <?php echo $row["order_date"];?> </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div>
                                <input type="hidden" name="order_id" value="<?php echo $row["order_id"];?>">
                                <input type="submit" name="status" class="btn btn-outline-success" value="Siparişi Kargoya Ver">
                                <input type="submit" name="detail" class="btn btn-outline-info" value="Sipariş İçeriği">
                                </div>
                            </form>
                        <?php }?>
                    </table>
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
