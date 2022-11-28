<!DOCTYPE html>
<html lang="zxx">

<?php include("partials/header.php");

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
                        <form action="#" method="post">
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
                                <button type="contactSubmit" class="btn">Gönder</button>
                            </div>
                            
                        </form>
                        <?php 
                        
                        if($_SERVER["REQUEST_METHOD"]=="POST")
                        {
                            include("partials/connect.php");
                            $name=$_POST['name'];
                            $email=$_POST['email'];
                            $telNumber=$_POST['telNumber'];
                            $message=$_POST['message'];
                           $date= date("d/m/Y H:i");
                            $sql = "Insert into contact(Name,Email,TelNumber,Message,Date)
                             Values('$name','$email','$telNumber','$message','$date')       
                            ";
                            mysqli_query($conn, $sql);
                            
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-6 contact_left p-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6350041.310790406!2d30.68773492426509!3d39.0014851732576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b0155c964f2671%3A0x40d9dbd42a625f2a!2sTurkey!5e0!3m2!1sen!2sin!4v1522753415269"></iframe>
                </div>

                <div class="col-lg-4 col-md-6 mt-lg-4 contact-inn-w3pvt">
                    <div class="mt-5 information-wthree">
                        <h4 class="text-uppercase mb-4"><span class="fa fa-comments"></span> Communication</h4>
                        <p class="cont-wthree-para mb-3 text-capitalize">for general queries, including property Sales and constructions, please email us at <a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-4 contact-inn-w3pvt">
                    <div class="mt-5 information-wthree">
                        <h4 class="text-uppercase mb-4"><span class="fa fa-life-ring"></span> Technical Support</h4>
                        <p class="cont-wthree-para mb-3 text-capitalize">we are ready to help! if you have any queries or issues, contact us for support <label>+12 388 455 6789</label>.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-4 contact-inn-w3pvt">
                    <div class="mt-5 information-wthree">
                        <h4 class="text-uppercase mb-4"><span class="fa fa-map"></span> Others</h4>
                        <p class="cont-wthree-para mb-3 text-capitalize">we are ready to help! if you have any queries or issues, contact us for support <label>+12 388 455 6789</label>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//contact -->


  
    <?php include("partials/footer.php")?>

</body>

</html>
