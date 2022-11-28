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
    $user_id =1;
    $order_date=date("Y-m-d  H:i:s");
    $stmt=$conn->prepare("insert into orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date)
            values (?,?,?,?,?,?,?);");
    $stmt->bind_param("isiisss",$order_cost,$order_status,$user_id,$phone,$city,$adress,$order_date);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    
    echo $order_id;
    
}