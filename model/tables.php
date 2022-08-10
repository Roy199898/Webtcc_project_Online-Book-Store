<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookshop";//including database name as a connection variable
$conn = new mysqli($servername, $username, $password, $dbname);
//below is query string
$qry = "CREATE TABLE Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,    
name VARCHAR(40) NOT NULL,
email VARCHAR(30) NOT NULL,
username VARCHAR(10) NOT NULL,
password VARCHAR(10),
address VARCHAR(50) NOT NULL,
phoneno VARCHAR(30) NOT NULL, 
gender VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
image VARCHAR(30)
)";
$res = $conn->query($qry);//execute query
if($res)
{ echo "User table has been created successfully"; }
else
{ echo "error occurred"; }



$qry = "CREATE TABLE books (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,    
    name VARCHAR(40) NOT NULL,
    price INT(6) NOT NULL,
    description VARCHAR(30) NOT NULL,
    writer_name VARCHAR(30),
    image VARCHAR(30)

    )";
    $res = $conn->query($qry);//execute query
    if($res)
    { echo "book table has been created successfully"; }
    else
    { echo "error occurred"; }

$conn->close();
?>
