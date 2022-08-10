

<?php

$title  = $desc = $price = $writer_name =  "";
$titleErrMsg = $descError = $priceError = $writerError ="";

// $product = [
//     'id' => '',
//     'title' => '',
//     'desc' => '',
//     'price' => '',
// ];

// function getProducts()
// {
//     return json_decode(file_get_contents(__DIR__ . '../../../products.json'), true);
// }

// function getProductById($id)
// {
//     $products = getProducts();
//     foreach ($products as $product) {
//         if ($product['id'] == $id) {
//             return $product;
//         }
//     }
//     return null;
// }

// function createProduct($data)
// {
//     $products = getProducts();

//     $data['id'] = rand(1, 20);

//     $products[] = $data;

//     putJson($products);

//     return $data;
// }
// function putJson($products)
// {
//     file_put_contents(__DIR__ . '../../../products.json', json_encode($products, JSON_PRETTY_PRINT));
// }


if ($_SERVER['REQUEST_METHOD'] === "POST") {


$is_valid=true;
    function test_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

$title = test_input($_POST['name']);
$desc = test_input($_POST['description']);
$price = test_input($_POST['price']);
$writer_name = test_input($_POST['writer_name']);


$message = "";

if (empty($title)) {
    $is_valid=false;

    $titleErrMsg = "name is Empty";
}

if (empty($desc)) {
    $is_valid=false;

    $descError = "Desc is Empty";
}

if (empty($price)) {
    $is_valid=false;

    $priceError = "Price is Empty";
    
}
if (empty($writer_name)) {
    $is_valid=false;

    $writerError = "writer name is Empty";
    
}


if ($is_valid) {
    createProduct($_POST);
}

}

?>

<div class="form-custom">
<label for="">

<?php 

if(!empty( $_SESSION['add_msg'])){
    echo  $_SESSION['add_msg'];
    $_SESSION['add_msg']='';
}

?>

</label>
<form method="post" onsubmit="return validate()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
		<fieldset>
			<legend>Product Add</legend>

			<label for="title">Title</label>
			<input type="text" name="name" id="name" value="<?php echo $product['name']??'' ?>" >
			<span id=name_error style="color: red">*<?php echo $titleErrMsg; ?></span>

			<br><br>

            <label for="desc">Desc</label>
			<input type="text" name="description" id="description" value="<?php echo $product['description']??'' ?>">
			<span id=description_error style="color: red">*<?php echo $descError; ?></span>

			<br><br>
            <label for="price">Price</label>
			<input type="number" name="price" id="price" value="<?php echo $product['price']??'' ?>">
			<span id=price_error style="color: red">*<?php echo $priceError; ?></span>

			<br><br>

            <br><br>
            <label for="price">Writer Name</label>
			<input type="text" name="writer_name" id="writer_name" value="<?php echo $product['writer_name']??'' ?>">
			<span id=writer_error style="color: red">*<?php echo $writerError; ?></span>

			<br><br>

		</fieldset>

		
		<input style="margin-top:10px" type="submit" name="submit" value="Submit">
	</form>

</div>
</body>
</html>


