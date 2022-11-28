<?php

include ("partials/connect.php");
$stmt = $conn->prepare("Select * from products Limit 4");

$stmt->execute();

$featured_product = $stmt->get_result();