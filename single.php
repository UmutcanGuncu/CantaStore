<?php
if(isset($_GET['product_id'])){
    $product_id= $_GET['product_id'];
    include ("partials/connect.php");
    $stmt = $conn->prepare("Select * from products where product_id=?");
    $stmt->bind_param("i",$product_id);
    $stmt->execute();
    $product = $stmt->get_result();
}else{
    header("location: adminIndex.php");
}
?>
<!DOCTYPE html>
<html lang="zxx">

<?php include("partials/header.php")
?>


<body>
    <div class="main-sec inner-page">
       <?php include("partials/navbar.php")?>
    </div>
    <!-- //banner-->
    <!--/banner-bottom -->
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <!-- product right -->
            <div class="left-ads-display wthree">
                <?php while($row = $product->fetch_assoc()){ ?>
                    
                <div class="row">
                    
                    <div class="desc1-left col-md-6">
                        <img src="<?php echo $row['product_image'];?>" class="img-fluid w-100 pb-3" >
                    </div>
                    <div class="desc1-right col-md-6 pl-lg-3">
                        <h2><?php echo $row['product_name'];?> </h2>
                        <form method="post" action ="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>" />
                        <input type="hidden" name="product_image" value="<?php echo $row['product_image'];?>" />
                        <input type="hidden" name="product_name" value="<?php echo $row['product_name'];?>" />
                        <input type="hidden" name="product_price" value="<?php echo $row['product_price'];?>" />
                            <input type="hidden" name="product_stock" value="<?php echo $row['product_stock'];?>" />
                        <div class="share-desc mt-2 font-weight-bold"><?php echo $row['product_price'];?> TL <input type="number" name="product_quantity" value="1"/></div>
                            <?php
                             $product_stock = $row["product_stock"];

                                if($product_stock >0){
                                echo"<button class='btn btn-outline-primary btn-lg mt-2' name='add_to_cart'>Sepete Ekle</button>";
                                }
                                else{
                                    echo"<button class='btn btn-outline-danger btn-lg mt-2' disabled='disabled' name='add_to_cart'>Sepete Ekle</button>";
                                    echo"<div class='alert alert-danger' role='alert'>Ürün Stokta Bulunmamaktadır</div>";
                                }
                                ?>

                        </form>

                        <div class="available mt-3">
                            <p></p>
                        </div>
                        <div class="share-desc mt-5">
                            <div class="share text-left">
                                <h4 class="font-weight-bold">Ürün Açıklaması</h4>
                                <div class="social-ficons mt-4">
                                    
                                </div>
                                <p class="mt-3 italic-blue font-weight-bold"><?php echo $row['product_description'];?></p>
                                <p>

                                <?php echo "Ürün Stoğu = $product_stock";?>

                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
                <?php } ?>
                <!--/row-->
                <h3 class="title-wthree-single my-lg-5 my-4 text-left">Beğenebilceğiniz Ürünler</h3>
                <div class="row shop-wthree-info text-center">
                    <?php

                    $stmt = $conn->prepare("Select * from products limit 4");

                    $stmt->execute();

                    $featured_product = $stmt->get_result();
                       while($row =$featured_product->fetch_assoc()){
                        ?>
                    <div class="col-md-3 shop-info-grid text-center mt-4">
                        
                        <div class="product-shoe-info shoe">
                            <div class="men-thumb-item">
                                <img src="<?php echo$row['product_image'];?>" class="img-fluid" alt="">

                            </div>
                            <div class="item-info-product">
                                <h4>
                                    <a href="single.php?product_id=<?php echo$row['product_id'];?>"><?php echo$row['product_name'];?></a>
                                </h4>

                                <div class="product_price">
                                    <div class="grid-price">
                                        <span class="money"><?php echo $row['product_price'];?></span>
                                    </div>
                                </div>

                               </div>
                        </div>
                        <div>

                        </div>
                      
                    </div>
                     <?php }?>
                    

                </div>
                <!--//row-->

            </div>
        </div>
    </section>
    <!-- /banner-bottom -->
   
   <?php include("partials/footer.php")?>

</body>

</html>
