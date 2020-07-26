	<html>
		<head>
			<title> Article Publish </title>
			<?php include 'admin_header.php'; ?>
			
		</head>
		
		<body>
				<?php 
					$con = mysqli_connect("localhost","root","","diff_news");
				?>
				<br><br><br><br>
				<center><p class="article_head">Article Publish
				<?php 
				if(isset($_SESSION['id']))
				{
					echo 'hi';
				}
				?>
				</p></center>
				<br><br>
				<div class="col-lg-8 col-lg-offset-2">
					<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						<div class="form-group">
							<input type="text" class="form-control" name="title" placeholder="What's the Title?">
							<br><br>
							<label> Image </label> <input type="file" name="img">
							<br><br>
							<textarea rows="10" cols="10" name="art_desc" placeholder="Description..." style="resize:none" class="form-control"></textarea>
							<br><br>
							<center><input type="submit" class="button" name="publish" value="Publish"></center>
						</div>
					</form>
				</div>
				<?php
					if(isset($_POST['publish']))
					{
						$title = $_POST['title'];
						$file_name = $_FILES['img']['name'];
						$tmp_name = $_FILES['img']['tmp_name'];
						$path="./images/".$file_name;
						move_uploaded_file($tmp_name,$path);
						$desc_article = $_POST['art_desc'];
						$data = "INSERT INTO news_article(title,image,article_desc) VALUES('$title','$path','$desc_article')";
						$res = mysqli_query($con,$data);
					}
				?>
		</body>
		
	</html>

