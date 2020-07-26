<?php

$con = mysqli_connect("localhost","root","","diff_news");;

$variable = $_GET['id'];

$art_data = "SELECT * FROM news_article WHERE news_id=$variable";

$dump = mysqli_query($con,$art_data);

$res = mysqli_fetch_array($dump);

?>

<html>

	<head>
		<title> <?php echo $res['title'] ?> </title>
		<?php include 'header.php'; ?>
	</head>
	
	<body>
		<br><br><br><br>
		<div class="col-lg-8 col-sm-8 col-md-8 col-lg-offset-2">
		
			<center><p style="font-size:40px"><?php echo $res['title'];?></p></center>
			<br><br>
			<img class="col-lg-12" src="<?php echo $res['image'];?>"><br><br>
			<p class="col-lg-12"><br><br><?php echo $res['time'];?></p><br><br>
			<p class="col-lg-12"><?php echo $res['article_desc'];?></p>
			<!--<p class="col-lg-12" style="font-size:25px; text-align:justify"><br><br></p>-->
		
		</div>
	</body>
</html>