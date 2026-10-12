<?php
session_start();

require_once "../classes/Product.php";  

# Create an object
$product_obj = new Product;

# Call the method
$all_product = $product_obj->getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    
    <!-- custom css -->
     <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand navbar-ligth bg-loght" style="margin-bottom: 100px; px-3">
        <div class="navbar-nav me-auto">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3"><i class="fa-solid fa-house"></i></h1>
            </a>
        </div>
        <div class="navbar-nav mx-auto">
            <span class="navbar-text"><?= "Welcome," . $_SESSION['first_name'] ?></span>
        </div>
        <div class="navbar-nav ms-auto h3">
                    <a href="../actions/logout.php" class="nav-link"><i class="fa-solid fa-user-xmark text-danger"></i></a>
        </div>
    </nav>

    <main class="row justify-content-center">
        <div class="col-8">
            <span class="h2 fw-bold">Product List</span>
            <span><a href="Add-product.php" class="h1 text-info text-decoration-none float-end">+</a></span>

            <table class="table table-hover aligin-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($product = $all_product->fetch_assoc()){
                    // print_r($user);    
                    ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['product_name'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['quantity'] ?></td>
                        <td>
                                <a href="edit-product.php?id=<?= $product['id'] ?>" class="btn btn-outline-warning" title="Edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="../actions/delete-product.php?id=<?= $product['id'] ?>" class="btn btn-outline-danger" title="Delete">
                                <i class="fa-regular fa-trash-can"></i>
                                </a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>    
    </main>
</body>
</html>