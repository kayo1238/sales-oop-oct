<?php
require_once "Database.php";

class User extends Database {
    // contains the logic of the app, CRUD

    # CREATE
    public function user($request){  // $request is equal to $_POST
        $first_name     = $request['first_name'];  // $_POST['first_name']
        $last_name      = $request['last_name'];
        $username       = $request['username'];
        $password       = $request['password'];

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (`first_name`, `last_name`, `username`, `password`)
                VALUES ('$first_name', '$last_name', '$username', '$password')";

        if($this->conn->query($sql)){
            header('location: ../views');     // go to index.php
            exit;                             // same as die()
        } else{
            die('Error creating the user: ' . $this->conn->error);
        }
    }

    # READ
    public function login($request){
        $username   = $request['username'];
        $password   = $request['password'];
        
        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = $this->conn->query($sql);
        // print_r($result);

        # 1. Check the username and if only 1.
        if($result->num_rows == 1){
            # 2. Check if the password is correct.
            $user = $result->fetch_assoc();
            // print_r($user);


            
        if(password_verify($password, $user['password'])){
            // Create sesion variable for future use.
            session_start();
            $_SESSION['id']         = $user['id'];  
            $_SESSION['username']   = $user['username'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['full_name']  = $user['first_name'] . " " . $user['last_name'];

            header('location: ../views/dashboard.php');
            exit;
        } else {
            die('Password is incorrect.');
        }
    }else {
            die('Username not found.');
        }
    }

    public function logout(){
        session_start();
        session_unset();   // remove session variables $_SESSION[]
        session_destroy(); // completery remove the sessionx.

        header('location: ../views');
        exit;
    }

    #READ(all)
    public function getAllProducts(){
        $sql = "SELECT * FROM products";

        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die('Error retrieving all proucts: ' . $this->conn->error);
        }
    }

     #READ(1 row)
    public function getProducts($id){
        $sql = "SELECT * FROM products WHERE id= $id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die('Error retrieving all products: ' . $this->conn->error);
        }
    }
}

?>