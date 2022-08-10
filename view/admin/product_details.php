<?php 
include('../../model/db.php');

if (session_id() === '') {
    session_start();
}	if (empty($_SESSION['username'])) {
	header("Location: ../login.php");
	}
?>
<?php

require '../../controller/admin/products.php';


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
<link href="../../style.css" rel="stylesheet">

<?php include "../partials/_nav.php"?>


<div id="main_div" class="center">
<?php 

require './nav.php';


?>
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

            <th>image</th>

            <th>Update</th>
            <th>Delete</th>



        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                
                <td><?php echo $product['name'] ?></td>
                <td><?php echo $product['description'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['writer_name'] ?></td>

                <td><?php echo $product['image'] ?></td>

               
                <td>
                    
                    <a href="dashboard_update_prod.php?id=<?php echo $product['id'] ?>"
                       class="btn btn-sm btn-outline-secondary">Update</a>

                </td>

                <td>
                    
                <form method="POST" action="">
                        <input type="hidden" name="delete_product_id" value="<?php echo $product['id'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;; ?>
        </tbody>
    </table>
</div>
