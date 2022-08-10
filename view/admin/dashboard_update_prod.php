<?php 
include('../../model/db.php');

if (session_id() === '') {
    session_start();
}	if (empty($_SESSION['username'])) {
	header("Location: ../login.php");
	}
	
	require '../../controller/admin/products.php';

	if (! isset($_SESSION['username'])) {
		header("Location: login.php");
	}
?>

<?php include "../partials/_nav.php"?>
<link href="../../style.css" rel="stylesheet">

<div style="text-align:center">
<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>

</div>
<br><br>

<div style="text-align:center">
	
<?php 
		include "./nav.php";
		echo "<br>";
		echo "<h2>Update Products</h3>";
		echo "<br>";
?>

<?php

if (!isset($_GET['id'])) {
    echo "not found";
    exit;
}



$productId = $_GET['id'];

$product = getProductById($productId);
if ($product->num_rows<1) {
    echo "not found";
    exit;
}
else{
	$product=$product->fetch_assoc();
}

// function updateProduct($data, $id)
// {
//     $products = getProducts();
//     foreach ($products as $i => $product) {
//         if ($product['id'] == $id) {
//             $products[$i] = array_merge($product, $data);
//         }
//     }

// 	// putJson($products);
//     file_put_contents(__DIR__ . '../../../products.json', json_encode($products));
	
// 	// return $updateProduct;

    
// }
// echo '<pre>';
// var_dump ($product);
// echo '</pre>';

// function putJson($products)
// {
//     file_put_contents(__DIR__ . '../../../products.json', json_encode($products, JSON_PRETTY_PRINT));
// }


$title  = $desc = $price =  $writer =  "";
$titleErrMsg = $descError = $priceError =$writerError = "";

  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // $product = array_merge($product, $_POST);
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
$writer = test_input($_POST['writer_name']);


$message = "";

if (empty($title)) {
	$is_valid=false;

    $titleErrMsg = "Title is Empty";
}

if (empty($desc)) {
	$is_valid=false;

    $descError = "Desc is Empty";
}

if (empty($price)) {
	$is_valid=false;

    $priceError = "Price is Empty";
    
}
if (empty($writer)) {
	$is_valid=false;

    $writerError = "writer name is Empty";
    
}


if($is_valid){
       if(updateProduct($_POST, $productId)){
        header("Location: product_details.php");
	   }
	   else{
		echo "<script>alert('Error occured')</script>";

	   }
	}
      
        

		// validation

}

?>
<div id="main_div" class="form-custom">
<form method="post" action="" enctype="multipart/form-data" novalidate>
			<h3>
                <?php if ($product['id']): ?>
                    Update Product for <b><?php echo $product['name'] ?></b>
                <?php else: ?>
                    Create new Product
                <?php endif ?>
            </h3>
		<fieldset>
			<legend>Product Update</legend>

			<label for="title">Title</label>
			<input type="text" name="name" id="title" value="<?php echo $product['name'] ?>" >
			<span style="color: red">*<?php echo $titleErrMsg; ?></span>

			<br><br>

            <label for="desc">Desc</label>
			<input type="text" name="description" id="desc" value="<?php echo $product['description'] ?>">
			<span style="color: red">*<?php echo $descError; ?></span>

			<br><br>
            <label for="price">Price</label>
			<input type="number" name="price" id="price" value="<?php echo $product['price'] ?>">
			<span style="color: red">*<?php echo $priceError; ?></span>

			<br><br>

			<br><br>
            <label for="price">Writer name</label>
			<input type="text" name="writer_name" id="price" value="<?php echo $product['writer_name'] ?>">
			<span style="color: red">*<?php echo $writerError; ?></span>

			<br><br>

		</fieldset>

		
		<!-- <input style="margin-top:10px" type="submit" name="submit" value="Submit"> -->
		<button class="btn btn-success">Submit</button>
	</form>

</div>


<?php include "../partials/footer.php"?>
</div>
</body>
</html>