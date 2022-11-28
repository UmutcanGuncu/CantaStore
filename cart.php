<?php declare(strict_types=1) ?>

<?php
error_reporting(0);
session_start();
if(isset($_POST['add_to_cart']))
{
    $product_id = $_POST['product_id'];
    if(isset($_SESSION['cart']))
    {
        $products_array_ids= array_column($_SESSION['cart'],"product_id");
        if(!in_array('product_id', $products_array_ids)){
           $product_array = array(
                'product_id'=>$_POST["product_id"],
                'product_name'=>$_POST["product_name"],
                'product_price'=>$_POST["product_price"],
                'product_image'=>$_POST["product_image"],
                'product_quantity'=>$_POST["product_quantity"],

            );
           $_SESSION['cart'][$product_id] = $product_array;
        }else{
            echo '<script>alert("Ürün Zaten Eklendi");</script>';
            //echo '<script>window.location="index.php";</script>';
        }
        
    }else{
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];
        $product_array = array(
            'product_id'=>$product_id,
            'product_name'=>$product_name,
            'product_price'=>$product_price,
            'product_image'=>$product_image,
            'product_quantity'=>$product_quantity,
            
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
    <style>
     /* Cart */
         .cart table{
            width: 100%;
            border-collapse: collapse;
        }

        .cart .product-info{
            display: flex;
            flex-wrap: wrap;
        }

        .cart th{
            text-align: left;
            padding: 5px 10px;
            color:#fff;
            background-color: #3369e7;
        }

        .cart td{
            padding: 10px 20px;
        }

        .cart td img{
            width: 80px;
            height: 80px;
            margin-right: 10px;
        }

        .cart td input{price
            width: 40px;
            height: 30px;
            padding: 5px;
        }

        .cart td a{
            color:#3369e7;

        }

        .cart .remove-btn{
            color: #3369e7;
            text-decoration: none;
            font-size: 14px;
            background-color: none;
            border:none;
            width: 100%;
        }

        .cart .edit-btn{
            color: #3369e7;
            text-decoration: none;
            font-size: 15px;
            background-color: #fff;
            border: none;
            


        }

        .cart .product-info p{
            margin: 3px;
        }

        .cart-total{
            display: flex;
            justify-content: flex-end;
        }

        .cart-total table{
            width: 100%;
            max-width: 500px;
            border-top: 3px solid #3369e7;;
        }

        td:last-child{
            text-align: right;
        }

        th:last-child{
            text-align: right;
        }

        .checkout-container{
            display: flex;
            justify-content: flex-end;
        }

        .checkout-btn{
            background-color: #3369e7;
            color: #fff;
        }

    </style>
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
                            <p><?php echo $value['product_name'];?></p>
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
