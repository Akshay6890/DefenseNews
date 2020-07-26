<?php

	if(!empty($_GET['msg']))
	{
		$message = $_GET['msg'];
	}
	else
	{
		$message = '';
	}

?>

<html>
	<head>
		<title> Defense News | Login </title>
		<?php include 'header.php'; ?>
	</head>
	<body>
		<br><br><br><br><br><br><br>
		<center><p style="font-size:30px; font-style:Bahnschrift Light">LOGIN</p></center><br><br>
		<div class="col-lg-4 col-lg-offset-4">
			<form action="db.php" method="post">
			
				<center><p style="font-size:25px; color:red"><?php echo $message;?></center>
				
				<br>
				
				<input type="email" name="email" class="form-control" placeholder="Username"><br><br>
				
				<input type="password" name="password" class="form-control" placeholder="Password"><br><br>
				
				<center><input type="submit" name="login" value="Login"></center><br>
				
			</form>
		</div>
	</body>
</html>