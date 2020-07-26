<?php

if(isset($_SESSION['id']))
{
	echo 'Hello';
}
else
{
	echo 'Bye';
}
?>

<html>
<form action="db.php" method="post"><input style="background:none; color:black; border:none" type="submit" value="Logout"name="logout"></form>
</html>