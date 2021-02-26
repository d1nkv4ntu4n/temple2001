<?php
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD']=='POST'){
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

			//save to database
			$user_id=random_num(20);
			$query = "insert into users (user_id, user_name,password) values ('$user_id', '$user_name', '$password')";

			mysqli_query($con,$query);
			header("Location: login.php" );
			die;
			echo "Signup successfully";

		}else{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
        <title> User Login</title>
      <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    </head>
<body>

	

	<div id="box">
		<form method="post">
			<div class="container">
    		<div class="signup-box">
    		<div class="row">
    			<div class="col-md-6 signup-left">
    				<h2>Signup Here</h2>
    				<form action="validation.php" method="post">
    					<div class="form-group">
    						<label> Username </label>
    						<input type="text" name="user_name" class="form-control" required>
    					</div>
    				<div class="form-group">
    						<label> Password </label>
    						<input type="password" name="password" class="form-control" required>
    					</div>
    					<button type="submit" class="btn btn-primary"> Signup </button><br><br>
    					<a href="login.php">Click to Login</a>
    				</form>
    			</div>
    		</div>

			
		</form>
	</div>


</body>
</html>