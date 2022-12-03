<!DOCTYPE html>
<html lang="zxx">

<?php include("partials/header.php");
session_start();
error_reporting(0);
if(isset($_SESSION["userUid"])){

}else{
    header("location: index.php");
}
if(isset($_POST["contact_submit"])){

}
?>


<body>
    <div class="main-sec inner-page">
        <?php include("partials/navbar.php")?>

    </div>

    <!-- //banner-->

    <!--/contact -->
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <h3 class="title-wthree mb-lg-5 mb-4 text-center">İletişime Geç</h3>
            <div class="row contact_information">
                <div class="col-md-6">
                    <div class="contact_right p-lg-5 p-4">
                        <form action="contact.php" method="post">
                            <div class="field-group">
                                <div class="content-input-field">
                                    <input name="name" id="text1" type="text"  placeholder="Adınız" required="">
                                </div>
                            </div>
                            <div class="field-group">

                                <div class="content-input-field">
                                    <input name="email" id="text1" type="email"  placeholder="E Posta Adresiniz" required="">
                                </div>
                            </div>
                            <div class="field-group">

                                <div class="content-input-field">
                                    <input name="telNumber" id="text3" type="text"  placeholder="Telefon Numaranız" required="">
                                </div>
                            </div>
                            <div class="field-group">
                                <div class="content-input-field">
                                    <textarea name="message" placeholder="Mesajınız" required=""></textarea>
                                </div>
                            </div>
                            <div class="content-input-field">
                                <input type="submit" class="btn btn-outline-danger" name="contact_submit" value="Gönder">
                            </div>
                            
                        </form>
                        <?php 
                        
                        if(isset($_POST["contact_submit"]))
                        {
                            include("partials/connect.php");
                            $name=$_POST['name'];
                            $email=$_POST['email'];
                            $telNumber=$_POST['telNumber'];
                            $message=$_POST['message'];
                            $userUid=$_SESSION["userUid"];
                            $date= date("Y/m/d H:i");
                            $stmt = $conn->prepare("Insert into contact(contact_name,contact_email,contact_tel,contact_message,userUid,contact_date) values (?,?,?,?,?,?)");
                            $stmt->bind_param("ssssss",$name,$email,$telNumber,$message,$userUid,$date);
                            if($stmt->execute()){
                                echo "<script>alert('Mesajınız Başarıyla Gönderildi')</script>";
                            }
                            
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-6 contact_left p-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6350041.310790406!2d30.68773492426509!3d39.0014851732576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b0155c964f2671%3A0x40d9dbd42a625f2a!2sTurkey!5e0!3m2!1sen!2sin!4v1522753415269"></iframe>
                </div>
             </div>
        </div>
    </section>
    <!--//contact -->


  
    <?php include("partials/footer.php")?>

</body>

</html>
