<?php
include "../classes/Product.php";

$product = new Product;

if(isset($_POST['btn_edit'])){
    $product->uptate($_POST);
}
?>
