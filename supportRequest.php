<!DOCTYPE html>
<html lang="zxx">

<?php include("partials/header.php");
include ("partials/connect.php");
session_start();
error_reporting(0);
if(isset($_SESSION['userUid']))
{
    $userUid =$_SESSION["userUid"];
    $stmt=$conn->prepare("select * from contact where userUid=?");
    $stmt->bind_param("s",$userUid);
    $stmt->execute();
    $contact = $stmt->get_result();
}else{
    header("location: index.php");
    exit();
}


?>


<body>
<div class="main-sec inner-page">
    <!-- //header -->
    <?php include("partials/navbar.php");?>

</div>

<!-- //banner-->
<!--/login -->
<section class="banner-bottom py-5">
    <div class="container">


            <div class="content-bottom">
                <section id="orders" class="orders container my-5 py-3">
                    <div class="container mt-2">
                        <h2 class="font-weight-bold text-center">Destek Kayıtları</h2>
                        <hr class="mx-auto">
                    </div>

                    <table class="table align-items-center table-flush">
                        <tr>
                            <th>Destek Numarası</th>
                            <th>Mesajınız</th>
                            <th>Cevap</th>


                        </tr>
                        <?php while ($row=$contact->fetch_assoc()){ ?>

                            <tr>
                                <td>
                                    <div class="product-info">
                                        <div>
                                            <p class="mt-3"> <?php echo $row["contact_id"];?>  </p>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="product-info">
                                        <div>
                                            <p class="mt-3"> <?php echo $row["contact_message"];?> </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="product-info">
                                        <div>
                                            <p class="mt-3"> <?php echo $row["contact_answer"];?>  </p>
                                        </div>
                                    </div>
                                </td>


                            </tr>
                        <?php } ?>
                    </table>

                </section>
            </div>

    </div>
</section>
<!-- /login -->
<?php include("partials/footer.php");?>

</body>

</html>
