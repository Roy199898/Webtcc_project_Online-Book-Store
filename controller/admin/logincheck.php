<?php
include('../model/db.php');
session_start(); 

 $error="";
 $userNameError = $passwordError=  "";

// store session data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    function test_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

$username = test_input($_POST['username']);
$password = test_input($_POST['password']);

$message = "";



if (empty($username)) {
    $userNameError = "UserName is Empty";
}

if (empty($password)) {
    $passwordError = "Password is Empty";
    
}



if (!empty($_POST['username']) && !empty($_POST['password'])) {

$connection = new db();
$conobj=$connection->OpenCon();
$type='admin';

$userQuery=$connection->CheckUser($conobj,"users",$username,$password,$type);

if ($userQuery->num_rows > 0) {
    $userQuery=$userQuery->fetch_assoc();
    $_SESSION["username"] = $userQuery['username'];
    $_SESSION["password"] = $userQuery['password'];
    $_SESSION["type"]=$userQuery['type'];
    if( $_SESSION["type"]=='admin'){
        header("location: ../view/admin/product_details.php");
}
    elseif($_SESSION["type"]=='user'){
        header("location: ../view/product_info.php");

    }

   }
 else {
$error = "User not found";
}

}

}




?>