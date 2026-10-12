<?php
include "../classes/Product.php";

$product = new Product;
$product->delete($_GET);
?>