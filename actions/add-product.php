<?php
include "../classes/Product.php";

$product = new Product;

if(isset($_POST['add'])){
    $product->store($_POST);
}
?>

