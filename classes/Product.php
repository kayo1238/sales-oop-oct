<?php
require_once "Database.php";

class Product extends Database{
    // contains the logic of the app, CRUD

    public function logout(){
        session_start();
        session_unset();   // remove session variables $_SESSION[]
        session_destroy(); // completery remove the sessionx.

        header('location: ../views');
        exit;
    }

    #CREATE
    public function store($request){
        $product_name = $request['product_name'];
        $price        = $request['price'];
        $quantity     = $request['quantity'];

        $sql = "INSERT INTO products (`product_name`, `price`, `quantity`)
                VALUES ('$product_name', '$price', '$quantity')";

        if($this->conn->query($sql)){
            header('location: ../views/Dashboard.php');
            exit;
        }else{
            die('Error creating the product: ' . $this->conn->error);
        }

    }

    #READ(all)
    public function getAllProducts(){
        $sql = "SELECT * FROM products";

        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die('Error retrieving all users: ' . $this->conn->error);
        }
    }

     #READ(1 row)
    public function getProduct($id){
        $sql = "SELECT * FROM products WHERE id= $id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die('Error retrieving all users: ' . $this->conn->error);
        }
    }

    #UPDATE
    public function update($request){
        $id           = $request['id'];              // id of the product
        $product_name = $request['product_name'];           // $sql = "UPDATE" same value
        $price        = $request['price'];            // $sql = "UPDATE" same value
        $quantity     = $request['quantity'];             // $sql = "UPDATE" same value
        

        $sql = "UPDATE products                        
                SET product_name = '$product_name',  
                    price        = '$price',
                    quantity     = '$quantity'
                WHERE id = $id";

        if($this->conn->query($sql)){
            header('location: ../views/dashboard.php');
            exit;
        } else{
            die('Error updating the product:' . $this->conn->error);
        }
    }

    # DELETE
    public function delete($request){
        $id = $request['id'];

        $sql = "DELETE FROM products WHERE id = $id";

        if($this->conn->query($sql)){
            header('location: ../views/dashboard.php');
            exit;
        }else{
            die('Error deleting the pruduct: ' . $this->conn->error);
        }
    }
}

?>