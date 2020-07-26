<?php
	$con = mysqli_connect("localhost","root","","diff_news");
?>

	<html>
		<head>
			<title> Defense News IP History</title>
			<?php include 'admin_header.php'; ?>
		</head>
		<body>
			<br><br><br><br><br>
			<center><p style="font-size:40px; font-style:Bahnschrift Light">Defense News IP History</p></center>
			<br><br><br><br>
			<div class="col-lg-offset-2 col-lg-8">
				<table class="table table-hover" border="1">
					<thead>
						<tr>
							<td><center>ID</center></td>
							<td><center>IP</center></td>
							<td><center>TIME STAMP</center></td>
						</tr>
					</thead>
					<tbody>
						<?php
							$data = "SELECT * FROM ip_history";
							$res = mysqli_query($con,$data);
							while($details=mysqli_fetch_array($res))
							{
							?>
								<tr>
									<td><center><?php echo $details['id']; ?></center></td>
									<td><center><?php echo $details['ip']; ?></center></td>
									<td><center><?php echo $details['time']; ?></center></td>
								</tr>
							<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</body>
	</html>
