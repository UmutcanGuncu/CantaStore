

<!DOCTYPE html>
<html lang="zxx">

<?php include("partials/header.php");
include ("partials/connect.php");
//Asc ve desc göre sıralama
if(isset($_POST["price_list_submit"])){
$group=$_POST["Price"];
if($group=="asc"){
    $stmt = $conn->prepare("Select * from products order by product_price asc");
    $stmt->execute();
    $featured_product = $stmt->get_result();
}else
{
    $stmt = $conn->prepare("Select * from products order by product_price desc ");
    $stmt->execute();
    $featured_product = $stmt->get_result();
}
}else if(isset($_POST["product_search"])){
    $product_name=$_POST["product_name"];
    $stmt=$conn->prepare("SELECT * FROM products WHERE product_name like '%$product_name%'");

    $stmt->execute();
    $featured_product = $stmt->get_result();
}
else{
$stmt = $conn->prepare("Select * from products ");

$stmt->execute();

$featured_product = $stmt->get_result();
}
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
            <div class="row mx-auto container">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Fiyat</p>
                    <form method="post" action="shop.php">
                    <div class="form-check">
                        <input class="form-check-input" value="desc" type="radio" name="Price">
                        <label class="form-check-label" for="a">Azalan Fiyat </label><br>
                      </div>
                    <div class="form-check">
                        <input class="form-check-input" value="asc" type="radio" name="Price" >
                        <label class="form-check-label" for="a">Artan Fiyat</label>
                    </div>
                        <input type="submit" class="btn btn-outline-info" value="Listele" name="price_list_submit">
                    </form>
                </div>
            </div>

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


        </div>
    </section>

    <!-- /banner-bottom -->
    
   <?php include("partials/footer.php")?>
</body>

</html>
