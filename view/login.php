<?php 
   

	//session_start();

	if (isset($_SESSION['username'])) {
		header("Location: welcome.php");
	}
?>

<?php
include('../controller/admin/logincheck.php');

// if(isset($_SESSION['username']) ){
//   if($type=="seller")
//   {
//   // header("location: seller_home.php");
//   }
//   else if($type=="dguy")
//   {
//    //header("location: dguy.php");
//   }
//   else if($type=="admin")
//   {
//    //header("location: adminhome.php");
//   }
//   else
//   {
//    //header("location: buyerhome.php");
//   }

// } 
?>


<link href="login.css" rel="stylesheet">

<style>
    .form-custom {
  margin-left: 20%;
  margin-right: 20%;
  margin-top: 4%;
  
}
</style>

<?php

 $username = $password =    "";
 $signupError = "";


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    
}

// else {
//     echo $message;
// }

// if(  $username != "" && $password != "")  {
// if(isset($_POST['submit'] ) ){

    
//     $new_message = array(
//         "username" => $_POST['username'],
//         "password" => $_POST['password'],
//     );
   
//     if(filesize('data.json') > 0 ){
//         $records = json_decode(file_get_contents('data.json'));

//         foreach ($records as $record ) {
//             if($record->username == $username && $record->password == $password) {
//                 $_SESSION['username'] = $username;
//                 header('Location:welcome.php');
//             } else {
//                 $signupError = "Username or password invalid";
//             }
//         }
//     }
   
//  }
// }
// }

?>

<div class="form-custom">
<label for="">

<?php 

if(!empty( $_SESSION['signup_msg'])){
    echo  $_SESSION['signup_msg'];
    $_SESSION['signup_msg']='';
}

?>

</label>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
		<fieldset>
			<legend>Login</legend>

            <label for="Uname">UserName</label>
			<input type="text" name="username" id="Uname">
			<span style="color: red">*<?php echo $userNameError; ?></span>

			<br><br>

            <label for="password">Password</label>
			<input type="password" name="password" id="password">
			<span style="color: red">*<?php echo $passwordError; ?></span>

			<br><br>
            <label for=""><?php echo $error; ?></label>


		</fieldset>

		<input style="margin-top:10px" type="submit" name="submit" value="Login"><br>
		<span style="color: red"><?php echo $signupError; ?></span>

        <p>Create new account? <a href='./signup.php'> Register here </a></p>
	</form>

</div>
<?php include "partials/footer.php"?>
</body>
</html>
