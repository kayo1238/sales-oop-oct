<?php
require_once "../classes/Product.php";  

$product_obj = new Product;

$product = $product_obj->getProduct($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- custom css -->
     <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
     <nav class="navbar navbar-expand navbar-ligth bg-white" style="margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3 mb-0"><i class="fa-solid fa-house"></i></h1>
            </a>
            <div class="navbar-nav">
                <form action="../actions/logout.php" method="post" class="h3 d-flex">
                    <span><a href="../actions/logout.php" class="d-flex mb-0"><i class="fa-solid fa-user-xmark text-danger"></i></a></span>
                </form>
            </div>
        </div>
    </nav>
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="../actions/Edit-product.php" method="post">
                <div class="mb-3 ">
                    <label for="name" class="form-label">product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" max="50" required autofocus>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="price" class="form-label">Price</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                             <input type="number" name="price" id="price" class="form-control" step="any" required>
                        </div>
                    </div>
                    <div class="col">
                        <label for="quantity" class="form-label ms-3">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" required>
                     </div>
                </div>
                <button type="submit" name="edit" class="btn btn-warning fw-bold mt-5 w-100">Edit</button>
            </form>
        </div>
    </div>
</body>
</html>