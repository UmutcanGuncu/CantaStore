<!--
Author:W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<?php include("partials/header.php")
?>


<body>
    <div class="main-sec inner-page">
       <?php include("partials/navbar.php")?>

    </div>

    <!-- //banner-->
    <!--/login -->
    
    <section class="banner-bottom py-5">
        <div class="container">
            <div class="content-grid">
                <div class="text-center icon">
                    <span class="fa fa-user-circle-o">Kayıt Ol</span>
                </div>
                <div class="content-bottom">
                    <form action="includes/register.inc.php" method="post">
                       
                        <div class="field-group">
                             <div class="content-input-field">
                                <input name="name" type="text" placeholder="Adınız Soyadınız"> 
                            </div>
                        </div>
                        <div class="field-group">

                            <div class="content-input-field">
                                <input name="email" id="text1" type="email"  placeholder="E Posta Adresi" >
                            </div>
                        </div>
                        <div class="field-group">
                        <div class="content-input-field">
                                <input name="uid" type="text" placeholder="Kullanıcı Adı">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                                <input name="pwd" id="text3" type="Password"  placeholder="Şifre">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                                <input name="pwdRepeat" id="myInput" type="Password" placeholder="Şifre Tekrarı">
                            </div>
                        </div>
                        <div class="content-input-field">
                            <button type="submit" name="register" class="btn">Kaydol</button>
                        </div>
                        <div class="list-login-bottom text-center mt-lg-5 mt-4">
                            
                            <?php if(isset($_GET["error"])){
                                $erorMessage= $_GET["error"];
                                 if($erorMessage=='emptyinput'){
                            echo '<a>!Lütfen Tüm Kutucukları Doldurunuz!</a>';
                        }else if($erorMessage=='invaildUid'){
                            echo '<a>!Lütfen Kullanıcı Adınızda Sadece Harf Ve Sayı Kullanın!</a>';
                        }else if($erorMessage=='invaildEmail')
                        {
                             echo '<a>!Lütfen E-Posta Adresinizi Giriniz!</a>';
                        }else if($erorMessage=='passwordsdontmatch'){
                            echo '<a>!Şifreler Birbiri İle Eşleşmiyor!</a>';
                        }else if($erorMessage=='usernameataken'){
                            echo '<a>!Girdiğiniz Kullanıcı Adı Kullanılıyor Lütfen Başka Kullanıcı Adı Seçiniz!</a>';
                        }
                            }
                           
                    ?>
                            <a href="#" class="">Sitemize Kayıt Olarak Koşulları Kabul Etmiş Sayılırsınız</a>
                         </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- /login -->
  <?php include("partials/footer.php")?>

</body>

</html>
