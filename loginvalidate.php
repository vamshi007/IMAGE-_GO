<?php
	session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="cloud";
	$conn=mysqli_connect($servername, $username, $password, $dbname);
	/* $user=$_POST['name'];
	$pass=$_POST['pass']; */
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$_SESSION["username"] = $user;
	$sql="select * from accounts where (username='$user' or email='$user') and password='$pass'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);




	if ($count==1) 
	{
		

		/*echo "login success";*/
		header('Location:abc.html');

		
	

	}
	else
	{
		echo "username  or password is wrong ";
	}













?>







	