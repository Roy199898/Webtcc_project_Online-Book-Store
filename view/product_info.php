<?php 
include('../model/db.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
	if (! isset($_SESSION['username'])) {
		header("Location: ./login.php");
	}
?>
<?php

require '../controller/admin/products.php';


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if(!empty($_POST['delete_product_id'])){
        deleteProducts($_POST['delete_product_id']);
    }
}

$products = getProducts();
if(empty($products))
{
    $products=[];
}

?>
<link href="../style.css" rel="stylesheet">
<?php include "./partials/_nav.php"?>



<div class="center">

<label for="">

<?php 

if(!empty( $_SESSION['update_msg'])){
    echo  $_SESSION['update_msg'];
    $_SESSION['update_msg']='';
}

if(!empty( $_SESSION['delete_msg'])){
    echo  $_SESSION['delete_msg'];
    $_SESSION['delete_msg']='';
}

?>

</label>
    <table class="table center" border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>price</th>
            <th>writer name</th>
</tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                
                <td><?php echo $product['name'] ?></td>
                <td><?php echo $product['description'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['writer_name'] ?></td>

            
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
