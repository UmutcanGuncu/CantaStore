<!DOCTYPE html>
<html lang="zxx">

<?php include("partials/header.php")
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
            <div class="content-grid">
                <div class="text-center icon">
                    <span class="fa fa-unlock-alt"></span>
                </div>
                <div class="content-bottom">
                    <form action="includes/login.inc.php" method="post">
                        <div class="field-group">
                        <div class="content-input-field">
                                <input name="uid" type="text" placeholder="Kullanıcı Adı veya E Posta Adresi">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                                <input name="pwd" id="text3" type="password"  placeholder="Şifre">
                            </div>
                        </div>
                        <div class="content-input-field">
                            <button type="submit" name="login" class="btn">Giriş Yap</button>
                        </div>
                          <?php 
                          
                         if(isset($_GET["error"])){
                                    $errorMessage= $_GET["error"];
                                    if($errorMessage == "emptyinput")
                                    {
                                        echo "<a>Lütfen Tüm Kutucukları Doldurunuz</a>";
                                    }
                                    else if($errorMessage == "wrongLogin")
                                    {
                                        echo "<a>Kullanıcı Adı Veya Şifre Yanlış</a>";
                                    }
                          }
                    ?>
                       </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /login -->
   <?php include("partials/footer.php")?>

</body>

</html>
