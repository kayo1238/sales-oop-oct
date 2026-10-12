<?php
session_start();

require_once "../classes/Product.php";

function getAllProduts() {
    $conn = connection();

    $sql = "SELECT * FROM sections";

    if ($result = $conn->query($sql)) {
        return $result;
    } else {
        die("Error retrieving all sections: " . $conn->error);
    }
}

function createProduct($name, $description, $price, $section_id) {
    $conn = connection();

    $sql = "INSERT INTO `products` (`name`, `description`, `price`, `section_id`)
                VALUES ('$name', '$description', $price, $section_id)";

    if ($conn->query($sql)) {
        header("location: products.php");
        //  GO to products.php if the query is successfull
        exit;
        //  same as die() 
    } else {
        die("Error adding a new product: " . $conn->error);
    }
}

if (isset($_POST['btn_add'])) {
    $name        = $_POST['name'];
    $description = $_POST['description'];
    $price       = $_POST['price'];
    $section_id  = $_POST['section_id'];

    createProduct($name, $description, $price, $section_id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
    <main class="container ">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1 class="fw-bold my-3 text-info text-center"><i class="fa-solid fa-box"></i>Add Product</h1>

                <form action="../actions/add-product.php" method="post">
                    <div class="mb-3">
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
                    <button type="submit" name="add" class="btn btn-info fw-bold mt-5 w-100">Add</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>