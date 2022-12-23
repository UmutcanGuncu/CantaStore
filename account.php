<?php 
session_start();
error_reporting(0);
include ("partials/connect.php");
if(isset($_SESSION['user_name']))
{
    $user_id =$_SESSION["userId"];
    $stmt1=$conn->prepare("select * from orders where user_id=? order by order_date");
    $stmt1->bind_param("i",$user_id);
    $stmt1->execute();
    $orders = $stmt1->get_result(); // sonuçları bir dizi içerisine atamış oldum aşağıda foreach ile ürünleri listeleyecem
}else{
    header("location: index.php");
    exit();
}
if(isset($_POST["chance_password"])){
    $password=$_POST["password"];
    $userUid=$_SESSION["userUid"];
    $confirmPassword=$_POST["confirmPassword"];
    if($password!=$confirmPassword){
        heaer("location: account.php?error_message=dont_match");
    }else if(strlen($password)<6){
        header("location: account.php?error_message=tooShort");
    }else{
        $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
        $stmt=$conn->prepare("update users set user_password =? where userUid=?");

        $stmt->bind_param("ss",$hashedPwd,$userUid);
        if(!$stmt->execute())
        {
            header("location: account.php?error_message=failed");
            exit();
        }else{
            header("location: account.php?error_message=success");
            exit();
        }
    }
}


?>
<!DOCTYPE html>
<html lang="zxx">
    <?php include("partials/header.php"); ?>

    <body>
        <div class="main-sec inner-page">
        <!-- //header -->
        <?php include("partials/navbar.php");?>
        <!-- //header -->
    </div>
        <section class="my-5 py-5">
            <div class="row container mx-auto">
                <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                    <h3 class="font-weight-bold">Hesap Bilgileri</h3>
                    <hr class="mx-auto">
                    <div class="account-info">
                        <p>İsim Soyisim = <span><?php echo $_SESSION["user_name"]; ?> </span></p>
                        <p>Kullanıcı Adı = <span><?php echo $_SESSION["userUid"]; ?> </span></p><br>
                        <p><a href="supportRequest.php" id="orders" class="btn btn-outline-info">Destek Talepleri</a></p><br>
                        <p><a href="includes/logout.inc.php" class="btn btn-outline-warning" id="logout-btn">Çıkış Yap</a></p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 ">
                    <form id="account-form" method="post" action="account.php">
                        <h3>Şifre Güncelle</h3>
                        <hr class="mx-auto">
                        <div class="form-group">
                            <label>Şifre</label>
                            <input type="password" class="form-control" id="account-password" name="password" placeholder="Şifre" required/>
                        </div>
                        <div class="form-group">
                            <label>Şifre Tekrarı</label>
                            <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="Şifre Tekrarı" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Şifre Değiştir" name="chance_password" class="btn" id="change-pass-btn">
                            <div >
                                <?php if(isset($_GET["error_message"])){
                                    $error_message= $_GET["error_message"];
                                    if($error_message=="dont_match")
                                        echo "<div class='text-danger'> Şifreler Birbiri İle Eşleşmiyor </div>";
                                    else if($error_message=="tooShort")
                                        echo "<div class='text-danger'> Şifreniz 6 Karakterden Kısa </div>";
                                    else if($error_message=="failed")
                                        echo  "<div class='text-danger'> Şifreniz Güncellenemedi </div>";
                                    else if($error_message=="success")
                                        echo  "<div class='text-success'> Şifreniz Başarıyla Güncellendi</div>";
                                } ?>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </section>




        <!--Orders-->
        <section id="orders" class="orders container my-5 py-3">
            <div class="container mt-2">
                <h2 class="font-weight-bold text-center">Siparişleriniz</h2>
                <hr class="mx-auto">
            </div>

            <table class="table">
                <tr>
                    <th>Sipariş Sırası</th>
                    <th>Sipariş Toplamı</th>
                    <th>Sipariş Durumu</th>
                    <th>Sipariş Tarihi</th>
                    <th>Sipariş Detayları</th>
                </tr>
                <?php while ($row= $orders->fetch_assoc()){ ?>

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
                                <p class="mt-3"> <?php echo $row["order_cost"];?> ₺ </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="product-info">
                            <div>
                                <p class="mt-3"> <?php if($row["order_status"]=="on_hold")
                                    echo "Beklemede";
                                else{
                                    echo $row["order_status"];
                                }
                                ?>

                                </p>
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
                        <form method="get" action="orderDetails.php">
                            <input type="hidden" value="<?php echo $row['order_id'];?>" name="order_id">
                            <input type="hidden" value="<?php echo $row['order_cost'];?>" name="order_cost">
                            <input type="submit" class="btn btn-outline-info" value="Detayları Görüntüle" name="order_detail">
                        </form>
                    </td>
                </tr>
                <?php } ?>
             </table>
        </section>




        <footer><?php include("partials/footer.php")?></footer>
            
        
        
    </body>
</html>

