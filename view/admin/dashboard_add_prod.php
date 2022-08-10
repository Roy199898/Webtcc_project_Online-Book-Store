<?php


include('../../model/db.php');

if (session_id() === '') {
    session_start();
}	if (empty($_SESSION['username'])) {
	header("Location: ../login.php");
	}

	if (! isset($_SESSION['username'])) {
		header("Location: login.php");
	}
	require '../../controller/admin/products.php';

?>
<?php include "../partials/_nav.php"?>
<link href="../../style.css" rel="stylesheet">
<script src="../../script.js"></script>



<div style="text-align:center">
<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>

</div>
<br><br>

<div id="main_div" style="text-align:center">
	
<?php 
		include "./nav.php";
		echo "<br>";
		echo "<h2>Add Products</h3>";
		echo "<br>";
		include "./create.php";
?>
<?php include "../partials/footer.php"?>
</div>
</body>
</html>