<?php 
session_start();
error_reporting(0);
if(isset($_SESSION['user_name']))
{
    
}else{
    header("location: index.php");
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
                    <span class="fa fa-user-circle-o">Hesabım</span>
                </div>
                
            </div>
        </div>
    </section>
        
        <footer><?php include("partials/footer.php")?></footer>
            
        
        
    </body>
</html>

