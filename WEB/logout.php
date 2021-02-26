 
<!DOCTYPE html>
<html>
<body>
	<div style="width: 150px; margin: auto; height: 500px; margin-top: 300px">
		<?php
		 include('connection.php');
		 session_destroy();
		 echo '<meta http-equiv ="refresh" content = "2;url = login.php">';
		 echo '<progress max=100><strong>Progress: 60% done.</strong></progress><br>';
		 echo '<span class ="itext"> Đang thoát...</span>';
		 ?>
		</div>

</body>
</html>