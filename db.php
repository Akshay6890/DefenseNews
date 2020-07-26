<?php

$con = mysqli_connect("localhost","root","","induce");

session_start();

if(isset($_POST['login']))
{
	$email=$_POST['email'];
    $password=$_POST['password'];
	if(!(empty($email)) and (!empty($password)))
	{
			$datae="SELECT * FROM signup WHERE username='$email'";
			$datap="SELECT * FROM signup WHERE password='$password'";
			$res1=mysqli_query($con,$datae);
			$res2=mysqli_query($con,$datap);
			$d = mysqli_fetch_array($res2);
		    if((mysqli_num_rows($res1)>0) and (mysqli_num_rows($res2)>0))
			{
				
				$_SESSION['id'] = $d['password'];
				require 'art.php';
			}
			if((mysqli_num_rows($res1)>0) and (mysqli_num_rows($res2)==0))
			{
				header("Location:login.php?msg=Password incorrect");
			}
			if((mysqli_num_rows($res1)==0) and (mysqli_num_rows($res2)>0))
			{
				header("Location:login.php?msg=Email incorrect");
			}
			if((mysqli_num_rows($res1)==0) and (mysqli_num_rows($res2)==0))
			{
				header("Location:login.php?msg=Email and Password incorrect");
			}
	}
	elseif((empty($email)) and (!empty($password)))
	{
			header("Location:login.php?msg=Email Cannot be empty");
	}	
	elseif((!empty($email)) and (empty($password)))
	{
		header("Location:login.php?msg=Password cannot be empty");
	}
	else
		header("Location:login.php?msg=Please fill all the fields");
}

if(isset($_POST['logout']))
{
	session_unset();
	session_destroy();
	require 'login.php';
}

?>