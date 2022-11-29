<?php
session_start();

include("../partials/connect.php");
if(isset($_POST["place_order"])){
    $name = $_POST["name"];
    $email =$_POST["email"];
    $phone = $_POST["phone"];
    $city = $_POST["city"];
    $adress = $_POST["adress"];
    $order_cost =$_SESSION["total"];
    $order_status ="on_hold";
    $user_id =$_SESSION['userId'];
    $order_date=date("Y-m-d  H:i:s");
    $stmt=$conn->prepare("insert into orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date)
            values (?,?,?,?,?,?,?);");
    $stmt->bind_param("isiisss",$order_cost,$order_status,$user_id,$phone,$city,$adress,$order_date);
    $stmt->execute();
    
    $order_id = $stmt->insert_id;
    
        //Cart sessionundaki ürünleri çağırma
        foreach ($_SESSION['cart'] as $key => $value){
            $product = $_SESSION['cart'][$key];
            $product_id = $product['product_id'];
            $product_name =$product['product_name'];
            $product_image = $product['product_image'];
            $product_quantity = $product['product_quantity'];
            $product_price = $product['product_price'];
            $stmt1= $conn->prepare("insert into order_items(order_id,product_id,product_name,product_image,product_price,product_quantity,user_id,order_date)
        values(?,?,?,?,?,?,?,?)");

            $stmt1->bind_param("iissiiis",$order_id,$product_id,$product_name,$product_image,$product_price,$product_quantity,$user_id,$order_date);
            $stmt1->execute();


        }
        //unset($_SESSION["cart"]); //ödeme işlemi başarılı olduğunda 
        header('location: ../payment.php?order_status="Complate"');
}