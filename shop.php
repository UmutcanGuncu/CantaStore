

<!DOCTYPE html>
<html lang="zxx">

<?php include("partials/header.php")
?>


<body>
    <div class="main-sec inner-page">
        <?php include("partials/navbar.php");?>
    </div>
    <!-- //banner-->
    <!--/banner-bottom -->
    <section class="banner-bottom py-5">
        <div class="container py-5">
            <h3 class="title-wthree mb-lg-5 mb-4 text-center">TÜM ÜRÜNLERİMİZ</h3>
            <!--/row-->
            <?php include("includes/get_featured_products.php");?>
            
            <div class="row shop-wthree-info text-center">
                <?php while($row = $featured_product->fetch_assoc()){?>
                <div class="col-lg-3 shop-info-grid text-center mt-4">
                    <div class="product-shoe-info shoe">
                        <div class="men-thumb-item">
                            <img src="<?php echo $row['product_image'];?>" class="img-fluid" alt="">

                        </div>
                        <div class="item-info-product">
                            <h4>
                                <a href="single.php?product_id=<?php echo $row['product_id'];?>"><?php echo $row['product_name'];?></a>
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                    <span class="money"><?php echo $row['product_price']."TL";?></span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <?php }?>
             
            <!--//row-->
            <!--/row1-->
            <div class="row shop-wthree-info text-center">
                <div class="col-lg-3 shop-info-grid text-center mt-4">
                    <div class="product-shoe-info shoe">
                        <div class="men-thumb-item">
                            <img src="images/b5.jpg" class="img-fluid" alt="">

                        </div>
                        <div class="item-info-product">
                            <h4>
                                <a href="single.html">Satchel (Yellow) </a>
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                    <span class="money"><span class="line">$999</span> $875.00</span>
                                </div>
                            </div>
                            <ul class="stars">
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-o" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 shop-info-grid text-center mt-4">
                    <div class="product-shoe-info shoe">
                        <div class="men-thumb-item">
                            <img src="images/b6.jpg" class="img-fluid" alt="">

                        </div>
                        <div class="item-info-product">
                            <h4>
                                <a href="single.html">Shoulder Bag (Orange)</a>
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                    <span class="money"><span class="line">$799</span> $675.00</span>
                                </div>
                            </div>
                            <ul class="stars">
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-o" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 shop-info-grid text-center mt-4">
                    <div class="product-shoe-info shoe">
                        <div class="men-thumb-item">
                            <img src="images/b8.jpg" class="img-fluid" alt="">

                        </div>
                        <div class="item-info-product">
                            <h4>
                                <a href="single.html">Hobo (Blue) </a>
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                    <span class="money"><span class="line">$799</span> $675.00</span>
                                </div>
                            </div>
                            <ul class="stars">
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-o" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 shop-info-grid text-center mt-4">
                    <div class="product-shoe-info shoe">
                        <div class="men-thumb-item">
                            <img src="images/b7.jpg" class="img-fluid" alt="">

                        </div>
                        <div class="item-info-product">
                            <h4>
                                <a href="single.html">Satchel (Pink)</a>
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                    <span class="money"><span class="line">$599</span> $475.00</span>
                                </div>
                            </div>
                            <ul class="stars">
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-o" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>

            <!--//row1-->
            <!--/row-->
            <div class="row shop-wthree-info text-center mb-5">
                <div class="col-lg-3 shop-info-grid text-center mt-4">
                    <div class="product-shoe-info shoe">
                        <div class="men-thumb-item">
                            <img src="images/b3.jpg" class="img-fluid" alt="">

                        </div>
                        <div class="item-info-product">
                            <h4>
                                <a href="single.html">Sling Bag </a>
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                    <span class="money"><span class="line">$599</span> $475.00</span>
                                </div>
                            </div>
                            <ul class="stars">
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-o" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 shop-info-grid text-center mt-4">
                    <div class="product-shoe-info shoe">
                        <div class="men-thumb-item">
                            <img src="images/b4.jpg" class="img-fluid" alt="">

                        </div>
                        <div class="item-info-product">
                            <h4>
                                <a href="single.html">Tote (Blue) </a>
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                    <span class="money"><span class="line">$799</span> $675.00</span>
                                </div>
                            </div>
                            <ul class="stars">
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-o" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 shop-info-grid text-center mt-4">
                    <div class="product-shoe-info shoe">
                        <div class="men-thumb-item">
                            <img src="images/b1.jpg" class="img-fluid" alt="">

                        </div>
                        <div class="item-info-product">
                            <h4>
                                <a href="single.html">Messenger Bag </a>
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                    <span class="money"><span class="line">$799</span> $675.00</span>
                                </div>
                            </div>
                            <ul class="stars">
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-o" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 shop-info-grid text-center mt-4">
                    <div class="product-shoe-info shoe">
                        <div class="men-thumb-item">
                            <img src="images/b2.jpg" class="img-fluid" alt="">

                        </div>
                        <div class="item-info-product">
                            <h4>
                                <a href="single.html">Shoulder Bag (Pink) </a>
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                    <span class="money"><span class="line">$799</span> $675.00</span>
                                </div>
                            </div>
                            <ul class="stars">
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-o" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--//row-->
            </div>
            <nav aria-label="Page navigation example mt-5">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <!-- /banner-bottom -->
    
   <?php include("partials/footer.php")?>
</body>

</html>
