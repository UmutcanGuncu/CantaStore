<html>


<?php
session_start();
if(isset($_SESSION["adminId"]) && isset($_SESSION["adminUid"])){

}else{
    header("location: login.php");
    exit();
}
include ("adminPartials/head.php");
include ("include/connect.php");
if(isset($_POST["answer"])){
    $contact_id= $_POST["contact_id"];
    $stmt=$conn->prepare("select * from contact where contact_id=?");
    $stmt->bind_param("i",$contact_id);
    $stmt->execute();
    $contacts=$stmt->get_result();
}else if(isset($_POST["submit"])){
    $contact_id= $_POST["contact_id"];
    $contact_answer= $_POST["contact_answer"];

    $stmt = $conn->prepare("update contact set contact_answer=? where contact_id=?");
    $stmt->bind_param("si",$contact_answer,$contact_id);
    $stmt->execute();
    header("location: contact.php");
}else{
    header("location: login.php");
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
                <div class="card border-0">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Mesaj</th>
                                <th>Cevap</th>
                                <th>Gönder</th>
                             </tr>
                            <?php while($row=$contacts->fetch_assoc()){ ?>
                                <tr>
                                    <form method="post" action="contactAnswer.php">
                                        <th><?php echo $row["contact_id"]; ?></th>
                                        <input type="hidden" name="contact_id" value="<?php echo $row["contact_id"];?>">
                                        <th><?php echo $row["contact_message"]; ?>< /th>
                                        <th><input type="text" name="contact_answer" style="width:300px; height:200px; placeholder="Cevabı Giriniz"></th>
                                        <th><input type="submit" name="submit" class="btn btn-outline-success" value="Cevap Gönder"></th>
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
