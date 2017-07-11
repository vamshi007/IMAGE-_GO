<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="cloud";

	session_start();
	 $a = $_SESSION["username"];
	 if(!file_exists($a))
	 {
	 	mkdir($a);
    	$file_path = "$a/";
     	$file_path = $file_path . basename( $_FILES['fileToUpload']['name']);
    	if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_path)) 
    	{
        	echo "success";


    	} 
    	else
    	{
        echo "fail";
    	}
	 }
	 else
	 {
	 		$file_path = "$a/";
     		$file_path = $file_path . basename( $_FILES['fileToUpload']['name']);
    		if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_path)) 
    		{
        		echo "success";
        		
    		} 
    		else
    		{
        		echo "fail";
        		
    		}
	 }
	 
















 ?>