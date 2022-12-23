<html>


<?php
session_start();
if(isset($_SESSION["adminId"]) && isset($_SESSION["adminUid"])){

}else{
    header("location: login.php");
}
include ("adminPartials/head.php");
include ("include/connect.php");
$stmt=$conn->prepare("select * from contact order by contact_id desc ");
$stmt->execute();
$contacts=$stmt->get_result();
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
                        <h6 class="h2 text-white d-inline-block mb-0">Destek Talepleri</h6>
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
                        <table class="table">
                           <tr>
                               <th>#</th>
                               <th>Ad Soyad</th>
                               <th>Kullanıcı Adı</th>
                               <th>E Posta Adresi</th>
                               <th>Telefon Numarası</th>
                               <th>Mesaj</th>
                               <th>Mesaj Tarihi</th>
                               <th>Cevap Ver</th>
                           </tr>
                            <?php while($row=$contacts->fetch_assoc()){ ?>
                            <tr>
                                <form method="post" action="contactAnswer.php">
                                <th><?php echo $row["contact_id"]; ?></th>
                                    <input type="hidden" name="contact_id" value="<?php echo $row["contact_id"]; ?>">
                                <th><?php echo $row["contact_name"]; ?></th>
                                <th><?php echo $row["userUid"]; ?></th>
                                <th><?php echo $row["contact_email"]; ?></th>
                                <th><?php echo $row["contact_tel"]; ?></th>
                                <th><?php echo $row["contact_message"];?></th>
                                <th><?php echo $row["contact_date"];?></th>
                                <th><input type="submit" name="answer" class="btn btn-outline-success" value="Cevap Gönder"></th>
                                </form>
                            </tr>
                            <?php }?>
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