<?php
	session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD']=='POST'){
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name)&& !empty($password)&& !is_numeric($user_name)){

			//read from database
			
			$query = "select * from users where user_name = '$user_name' limit 1";

			$result = mysqli_query($con,$query);
			if($result){
				if($result && mysqli_num_rows($result)>0)
				{
					$user_data = mysqli_fetch_assoc($result);
					if($user_data['password']== $password)
					{
						$_SESSION['user_id'] =$user_data['user_id'];
						header("Location: index.html");
						die;
					}
				}
			}
			echo "wrong username or password";
			
		}else{
	 		echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
        <title>Login</title>
      <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    </head>
<body>

	

	<div id="box">
		<form method="post">
			<div class="container">
    		<div class="login-box">
    		<div class="row">
    			<div class="col-md-6 login-left">
    				<h2>Login here</h2>
    				<form action="validation.php" method="post">
    					<div class="form-group">
    						<label> Username </label>
    						<input id="text" type="text" name="user_name" class="form-control" required>
    					</div>
    				<div class="form-group">
    						<label> Password </label>
    						<input id="text" type="password" name="password" class="form-control" required>
    					</div>
    					<button id="button" type="submit" class="btn btn-primary"> Login </button><br><br>
    					<a href="signup.php">Click to Signup</a>
    				</form>
    			</div>

			
		</form>
	</div>

</body>
</html>