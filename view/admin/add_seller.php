
<?php

require '../../controller/users.php';
require '../../model/db.php';

?>

<?php include "../partials/_nav.php";?>
<link href="../../style.css" rel="stylesheet">
<?php include "./nav.php"?>


<style>
    .form-custom {
  margin-left: 20%;
  margin-right: 20%;
  margin-top: 4%;
  
}
</style>

<?php

$fullname  = $username = $password =  $email = $address = $phone =  "";
$fullnameErrMsg = $userNameError = $passwordError= $emailErrMsg = $addressErrMsg = $phoneErrMsg = "";


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    function test_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
$is_valid=true;    

$fullname = test_input($_POST['name']);
$username = test_input($_POST['username']);
$password = test_input($_POST['password']);
$email = test_input($_POST['email']);
$address = test_input($_POST['address']);
$phone = test_input($_POST['phoneno']);


$message = "";

if (empty($fullname)) {
    $is_valid=false;    

    $fullnameErrMsg = "Name is Empty";
}

if (empty($username)) {
    $is_valid=false;    

    $userNameError = "UserName is Empty";
}

if (empty($email)) {
    $is_valid=false;    

    $emailErrMsg = "Email is Empty";
    
}
// else {
//     $is_valid=false;    

//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $emailErrMsg = "Please correct your email";
//     }
// }
if (empty($password)) {
    $is_valid=false;    

    $passwordError = "Password is Empty";
    
}
if (empty($address)) {
    $is_valid=false;    
    $addressErrMsg = "Address is Empty";
    
}
if (empty($phone)) {
    $is_valid=false;    

    $phoneErrMsg = "Phone is Empty";
    
}


if($is_valid){

    if(addSeller($_POST)){

echo 'seller added';    }
}


// if($fullname != "" && $username != "" && $email != "" && $password != "")  {
// if(isset($_POST['submit'] ) ){

    
//     $new_message = array(
//         "fullname" => $_POST['fullname'],
//         "username" => $_POST['username'],
//         "email" => $_POST['email'],
//         "password" => $_POST['password'],
//     );
   
//     if(filesize('data.json') == 0 ){
//         $first_record = array($new_message);
//         $data_to_save = $first_record;
//     }else{
       
//         $old_records = json_decode(file_get_contents('data.json'));
//         array_push($old_records, $new_message);

//         $data_to_save = $old_records;
//     }

//     $isSaved = file_put_contents('data.json', json_encode($data_to_save, JSON_PRETTY_PRINT), LOCK_EX);

//     if($isSaved){
//         $success = "Message is stored successfully";
//     }else{
//         $error = "Error storing message, please try again";
//     }
   
// }
// header('Location:login.php');

// }
}
?>

<div id="main_div" class="form-custom">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
		<fieldset>
			<legend>Add Seller</legend>

			<label for="fname">FullName</label>
			<input type="text" name="name" id="fname" >
			<span style="color: red">*<?php echo $fullnameErrMsg; ?></span>

			<br><br>

            <label for="Uname">UserName</label>
			<input type="text" name="username" id="Uname">
			<span style="color: red">*<?php echo $userNameError; ?></span>

			<br><br>

			<label for="email">Email</label>
			<input type="email" name="email" id="email">
			<span style="color: red">*<?php echo $emailErrMsg; ?></span>

			<br><br>
            <label for="password">Password</label>
			<input type="password" name="password" id="password">
			<span style="color: red">*<?php echo $passwordError; ?></span>

            <br><br>
            <label for="password">Address</label>
			<input type="text" name="address" id="password">
			<span style="color: red">*<?php echo $addressErrMsg; ?></span>

            <br><br>
            <label for="password">Phone</label>
			<input type="number" name="phoneno" id="password">
			<span style="color: red">*<?php echo $phoneErrMsg; ?></span>

			<br><br>

		</fieldset>

		
		<input style="margin-top:10px" type="submit" name="submit" value="Add Seller">
	</form>

</div>
<?php include "../partials/footer.php"?>
</body>
</html>