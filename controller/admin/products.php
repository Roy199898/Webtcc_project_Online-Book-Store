<?php
if (session_id() === '') {
    session_start();
}


function getProducts()
{
    $connection = new db();
    $conn=$connection->OpenCon();
    $result = $conn->query("SELECT * FROM books");
    return $result;
    //return json_decode(file_get_contents(__DIR__ .'../../../products.json'), true);
}

function getProductById($id)
{

    $connection = new db();
    $conn=$connection->OpenCon();
    $result = $conn->query("SELECT * FROM books WHERE id='$id'");
    return $result;
    // $products = getProducts();
    // foreach ($products as $product) {
    //     if ($product['id'] == $id) {
    //         return $product;
    //     }
    // }
    // return null;
}

function createProduct($data)
{


    $connection = new db();
    $conn=$connection->OpenCon();

    $name=$data['name'];
    $price=$data['price'];
    $description=$data['description'];
    $writer_name=$data['writer_name'];

     $sql = "INSERT INTO books (name, price, description, writer_name) VALUES('".$name."', '".$price."', '".$description."', '".$writer_name."')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['add_msg']='Product added successfully.';
       return true;
    } else {
        echo $sql;
        return false;

    }


    // $products = getProducts();

    // $data['id'] = rand(1000000, 2000000);

    // $products[] = $data;

    // putJson($products);

    // return $data;
}

function updateProduct($data, $id)
{
    $connection = new db();
    $conn=$connection->OpenCon();

    $name=$data['name'];
    $price=$data['price'];
    $description=$data['description'];
     $writer_name=$data['writer_name'];

    $sql = "UPDATE books SET name='$name', description='$description',price='$price',writer_name='$writer_name' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['update_msg']='Product Updated successfully.';
       return true;
    } else {
        return false;

    }
    
}

function deleteProducts($id)
{

    $connection = new db();
    $conn=$connection->OpenCon();

    $sql = "DELETE FROM books WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['delete_msg']='Product deleted successfully.';
       return true;
    } else {
        return false;

    }
    // $users = getProducts();

    // foreach ($products as $i => $product) {
    //     if ($product['id'] == $id) {
    //         array_splice($products, $i, 1);
    //     }
    // }

    // putJson($products);
}


function putJson($products)
{
    file_put_contents(__DIR__ . '../../../products.json', json_encode($products, JSON_PRETTY_PRINT));
}

function validateProduct($product, &$errors)
{
    $isValid = true;
    // Start of validation
    if (!$product['title']) {
        $isValid = false;
        $errors['title'] = 'Title is mandatory';
    }
    if (!$product['desc'] || strlen($product['desc']) < 6 || strlen($product['desc']) > 16) {
        $isValid = false;
        $errors['desc'] = 'desc is required and it must be more than 6 and less then 16 character';
    }

    if (!filter_var($product['price'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['price'] = 'This must be a valid number';
    }
    // End Of validation

    return $isValid;
}