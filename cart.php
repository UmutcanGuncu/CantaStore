<?php declare(strict_types=1) ?>

<?php
error_reporting(0);
session_start();
if(isset($_POST['add_to_cart']))
{
    $product_quantity=$_POST["product_quantity"];
    $product_stock =$_POST["product_stock"];
    $product_id = $_POST['product_id'];
    if($product_quantity>$product_stock){
        echo "<script>alert('Lütfen Stoktaki Miltar Kadar Alım Yapınız')</script>";
        header("location: single.php?product_id=$product_id");
    }if(isset($_SESSION['cart']))
    {
        $products_array_ids= array_column($_SESSION['cart'],"product_id");
        if(!in_array('product_id', $products_array_ids)){
           $product_array = array(
                'product_id'=>$_POST["product_id"],
                'product_name'=>$_POST["product_name"],
                'product_price'=>$_POST["product_price"],
                'product_image'=>$_POST["product_image"],
                'product_quantity'=>$_POST["product_quantity"],
               'product_stock' => $_POST ["product_stock"]
            );
           $_SESSION['cart'][$product_id] = $product_array;
        }else{
            echo '<script>alert("Ürün Zaten Eklendi");</script>';
            //echo '<script>window.location="adminIndex.php";</script>';
        }
        
    }else{
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];
        $product_stock = $_POST['product_stock'];
        $product_array = array(
            'product_id'=>$product_id,
            'product_name'=>$product_name,
            'product_price'=>$product_price,
            'product_image'=>$product_image,
            'product_quantity'=>$product_quantity,
            'product_stock'=>$product_stock
        );
        $_SESSION['cart'][$product_id] = $product_array;
    }
    calculateSubTotal();
    }elseif (isset($_POST['remove_product'])) {
        $prouct_id = $_POST['product_id'];
        unset($_SESSION['cart'][$prouct_id]);
        calculateSubTotal();
        }elseif(isset($_POST['edit_quantity'])){
        $product_id = $_POST["product_id"];
        $product_quantity = $_POST["product_quantity"];
        $product_array=$_SESSION['cart'][$product_id];
        $product_array["product_quantity"]=$product_quantity;

         $_SESSION["cart"][$product_id] = $product_array;
         calculateSubTotal();
    }
    function calculateSubTotal()
    {
        $total =0;
        foreach($_SESSION['cart'] as $key=>$value){
            $product =$_SESSION['cart'][$key];
            $price = $product['product_price'];
            $quantity = $product['product_quantity'];
            $total += ($price*$quantity);
        }
        $_SESSION["total"] = $total;
    }
    
?>

<!DOCTYPE html>
<html lang="zxx">

<?php include("partials/header.php");
?>


<body>
    <div class="main-sec inner-page">
        <!-- //header -->
        <?php include("partials/navbar.php");?>
        <!-- //header -->
    </div>
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde">Sepetiniz</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Ürünler</th>
                <th>Miktar</th>
                <th>Ara Toplam</th>
            </tr>

            <?php foreach ($_SESSION['cart'] as $key =>$value){ ?>

            <tr>
                <td>
                    <div class="product-info">
                        <img src="<?php echo $value['product_image']; ?>"/>
                        <div>
                            <a href="single.php?product_id=<?php echo $value['product_id'];?>"><p><?php echo $value['product_name'];?></p></a>
                            <small><span>TL</span><?php echo $value['product_price'];?></small>
                            <br>
                            <form method="post" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>"/>
                                <input type="submit" name="remove_product" class="remove-btn"value="Sil"/>
                             </form>
                           
                        </div>
                    </div>
                </td>

                <td>
                     <form method="post" action="cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>"/>
                            <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'];?>"/>
                            <input type="submit" class="edit-btn" value="Düzenle" name="edit_quantity"/>
                        </form>
                    
                </td>

                <td>
                    <span>TL</span>
                    <span class="product-price"><?php echo $value["product_quantity"] * $value["product_price"] ?></span>
                </td>
            </tr>
        <?php } ?>
         
        

            
        </table>


        <div class="cart-total">
          <table>
            
            <tr>
              <td>Toplam</td>
              <td>TL <?php echo $_SESSION['total'];?></td>
            </tr>
          </table>
        </div>
    

        <div class="checkout-container">
          <form method="post" action="checkout.php">
              <input type="submit" name="checkout" class="btn checkout-btn"value="Ödeme Yap"/>
          </form>
        </div>


    </section>

   <?php include("partials/footer.php");?>

</body>

</html>
