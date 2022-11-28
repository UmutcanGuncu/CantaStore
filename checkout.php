<?php session_start();
error_reporting(0);
if( !empty($_SESSION['cart']) && isset($_POST['checkout'])){
    
}else{
    header("location: shop.php");
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
        <section class="banner-bottom py-7">
        <div class="container">
            <div class="content-grid">
                <div class="text-center icon">
                    <span class="fa fa-user-circle-o">Sipariş Bilgileri</span>
                </div>
                <div class="content-bottom">
                    <form action="includes/place_order.php" method="post">
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
                                <input name="phone" type="text" placeholder="Telefon Numarası">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                                <input name="city" id="text3" type="Text"  placeholder="Şehir">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                                <textarea name="adress" id="myInput" placeholder="Adress"></textarea>
                            </div>
                        </div>
                        <div class="content-input-field">
                            <p>Toplam Miktar : <?php echo $_SESSION["total"] ;?> TL </p>
                            <button type="submit" name="place_order" class="btn">Ödemeye Geç</button>
                        </div>
                        <div class="list-login-bottom text-center mt-lg-5 mt-4">
                            
                          
                         </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
        
        <footer><?php include("partials/footer.php")?></footer>
            
        
        
    </body>
</html>

