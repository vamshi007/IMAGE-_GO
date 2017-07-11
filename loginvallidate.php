<?php

	$servername="localhost";
	$username="root";
	$password="";
	$dbname="login";
	$conn=mysqli_connect($servername, $username, $password, $dbname);
	$user=$_POST['name'];
	$pass=$_POST['pass'];
	$sql="select * from cloud where username='$user' and password='$pass'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);




	if ($count==2) 
	{
		echo "done";
	}
	else
	{
		echo "username  or password is wrong ";
	}













?>







	