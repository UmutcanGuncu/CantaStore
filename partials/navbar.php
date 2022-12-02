 <!-- //header -->
 <?php session_start(); ?>
        <header class="py-sm-3 pt-2 pb-2" id="home">
            <div class="container">
                <!-- nav -->
                <div class="top-w3pvt d-flex">
                    <div id="logo">
                        <h1> <a href="index.php"><span class="log-w3pvt">Ç</span>antaStore</a> <label class="sub-des">Online Store</label></h1>
                    </div>

                    <div class="forms ml-auto">
                        <?php if(isset($_SESSION['userId']))
                        {
                            echo "<a href='account.php' class='btn'><span class='fas fa-user'></span>Hoşgeldiniz ".$_SESSION['user_name']."</a>" ;
                             echo "<a href='includes/logout.inc.php' class='btn'><span class='fas fa-user'></span>Çıkış Yap</a>" ;
                            echo "<a href='cart.php'class='btn'><span class='fas fa-shopping-bag'></span> Sepet</a>";
                        }else{
                            echo "<a href='login.php' class='btn'><span class='fa fa-user-circle-o'></span> Giriş Yap</a>";
                            echo "<a href='register.php' class='btn'><span class='fa fa-pencil-square-o'></span> Kayıt Ol</a>";
                            echo " <a href='cart.php'class='btn'><span class='fas fa-shopping-bag'></span> Sepet</a>";
                        }
                        ?>
                        
                        
                       
                    </div>
                </div>
                <div class="nav-top-wthree">
                    <nav>
                        <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            <li class="active"><a href="index.php">Anasayfa</a></li>
                            <li><a href="about.php">Hakkımızda</a></li>
                            <li><a href="shop.php">Ürünlerimiz</a></li>
                            <li><a href="contact.php">İletişim</a></li>
                        </ul>
                    </nav>
                    <!-- //nav -->
                    <div class="search-form ml-auto">
                        <div class="form-w3layouts-grid">
                            <form action="shop.php" method="post" class="newsletter">
                                <input class="search" type="search" name="product_name" placeholder="Ürün Adı Giriniz">
                                <button class="form-control btn" name="product_search"><span class="fa fa-search"></span></button>

                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </header>