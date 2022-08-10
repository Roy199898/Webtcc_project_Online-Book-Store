<?php 
include('../../model/db.php');

if (session_id() === '') {
    session_start();
}	if (empty($_SESSION['username'])) {
	header("Location: ../login.php");
	}
?>
<?php

require '../../controller/users.php';


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if(!empty($_POST['delete_seller_id'])){
        deleteSeller($_POST['delete_seller_id']);
    }
}

$sellers = getSellers();
if(empty($sellers))
{
    $sellers=[];
}


?>
<link href="../../style.css" rel="stylesheet">



<div class="center">
<?php 

require './nav.php';


?>
<a href="./add_seller.php">Add Seller</a>
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
            <th>email</th>
            <th>username</th>
            <th>Adress</th>

            <th>Phone no</th>
            <th>Delete</th>




        </tr>
        </thead>
        <tbody>
        <?php foreach ($sellers as $seller): ?>
            <tr>
                
                <td><?php echo $seller['name'] ?></td>
                <td><?php echo $seller['email'] ?></td>
                <td><?php echo $seller['username'] ?></td>
                <td><?php echo $seller['address'] ?></td>

                <td><?php echo $seller['phoneno'] ?></td>

                <td>
                    
                    <form method="POST" action="">
                            <input type="hidden" name="delete_seller_id" value="<?php echo $seller['id'] ?>">
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>

               
        
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
