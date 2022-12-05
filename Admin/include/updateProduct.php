<?php
if(isset($_POST["submit"])){
    $id =$_POST["product_idd"];
    $product_name = $_POST["product_name"];
    $product_category = $_POST["product_category"];
    $product_description = $_POST["product_description"];
    $product_image = $_POST["product_image"];
    $product_price = $_POST["product_price"];
    $product_color = $_POST["product_color"];
    $product_stock = $_POST["product_stock"];
    $product_special_offer=0;
    include ("connect.php");

    $product_stock = $_POST["product_stock"];
    $stmt=$conn->prepare("update products set product_name=?,product_category=?,product_description=?
      ,product_image=?,product_price=?,product_color=?,product_stock=?,product_special_offer=? where product_id=?");
    $stmt->bind_param("ssssisiii",$product_name,$product_category,$product_description,$product_image,$product_price,$product_color,$product_stock,$product_special_offer,$id);
    $stmt->execute();
    header("location: ../products.php");
    exit();
}

