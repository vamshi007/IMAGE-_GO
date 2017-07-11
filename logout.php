<?php

session_start();	
	 $a = $_SESSION["username"];
	echo $a." "."logged out";
 session_unset ( void );
header('Location:cloud.html');

?>