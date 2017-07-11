<?php
$servername="localhost";
$username="root";
$password="";
$dbname="cloud";
$conn=mysqli_connect($servername, $username, $password, $dbname);
$user=$_POST['postusername1'];
$pass=$_POST['postpassword1'];
$date=$_POST['postdate1'];
$mobilenumber=$_POST['postmobile1'];
$email=$_POST['postemail1'];
$gender=$_POST['postgender1'];
$terms=$_POST['postterms1'];

$sql="select * from accounts where username='$user' or email='$email'";

$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if ($count==1) 
{
	echo "username or email address already registered";	
}

else

{
	$sql1="insert into accounts( username, password, mobilenumber, email, gender, terms, date )values('$user','$pass','$mobilenumber','$email','$gender','$terms','$date')";
	mysqli_query($conn,$sql1);	
	echo "sucessfully registered";
}

?>