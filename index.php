<?php

$con = mysqli_connect("localhost","root","","diff_news");

@$http_client_ip = $_SERVER['HTTP_CLIENT_IP'];

@$http_forwarded_for = $_SERVER['HTTP_FORWARDED_FOR'];

$remote_addr = $_SERVER['REMOTE_ADDR'];

if(!empty($http_client_ip))
{
	$ip_addr = $http_client_ip;
}
else if(!empty($http_forwarded_for))
{
	$ip_addr = $http_forwarded_for;
}
else if(!empty($remote_addr))
{
	$ip_addr = $remote_addr;
}

$ip_data = "INSERT INTO ip_history(IP) VALUES('$ip_addr')";
$res = mysqli_query($con,$ip_data);

?>

<html>
	
	<head>
		<title> Defense News </title>
		<?php include 'header.php'; ?>
		<style>
			.collapsible
			{
				cursor : pointer;
			}
			.content
			{
			  padding: 0 18px;
			  display: none;
			  overflow: hidden;
			}
		</style>
	</head>
	
	<body style="background-color:#ebdfc7">
		<br><br>
		<!--<center><p style="font-size:45px; font-style:Bahnschrift Light">Latest News</p></center>-->
		<br><br><br><br>
		<?php
			
			$con = mysqli_connect("localhost","root","","diff_news");
			$data = "SELECT * FROM news_article ORDER BY time DESC";
			$res = mysqli_query($con,$data);
			while($d=mysqli_fetch_array($res))
			{
				//$str = $d['article_desc'];
				?>
				
				<!--<a href="article.php?id=<?php echo $d['news_id']?>"style="text-decoration:none; color:black">
						<div class="col-lg-4">
							<p style="font-size:25px; font-style:Bahnschrift Light"><?php echo $d['title'];?></p><br>
							<?php echo $d['time'];?><br><br>
							<img class="img-thumbnail" src="<?php echo $d['image'];?>"><br><br>
							<p><?php echo ''.substr($str,0,90).'...';?></p>
						</div>
				</a>-->
				
				
				<center><p class="col-lg-12 col-xl-12 col-xs-12 col-sm-12 col-md-12" style="font-size:25px; font-style:Bahnschrift Light"><?php echo $d['title'];?></p><br><br><br></center>
				<img class="img-thumbnail col-lg-8 col-lg-offset-2 col-xl-8 col-xl-offset-2 col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2" src="<?php echo $d['image'];?>"><br><br>
				<div class="col-lg-8 col-lg-offset-2 col-xl-8 col-xl-offset-2 col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2"><br><?php echo $d['time'];?></div>
				<i class="collapsible col-lg-offset-6  col-xs-offset-6 col-xl-offset-6 col-sm-offset-6 col-md-offset-6 fa fa-angle-down fa-4x"></i>
				<div style="font-size:20px" class="content col-lg-8 col-lg-offset-2 col-xl-8 col-xl-offset-2 col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
					<div style="text-align:justify"><?php echo $d['article_desc'];?></div>
					<br><br><br>
				</div>
				
				<?php
			}
		?>
		<br><br><br><br><br>
		<script>
			var coll = document.getElementsByClassName("collapsible");
			var i;

			for (i = 0; i < coll.length; i++) {
			  coll[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var content = this.nextElementSibling;
				if (content.style.display === "block") {
				  content.style.display = "none";
				} else {
				  content.style.display = "block";
				}
			  });
			}
		</script>
	</body>
	
</html>