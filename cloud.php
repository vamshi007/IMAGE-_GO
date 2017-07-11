<!DOCTYPE html>
<html>
<head>




<?php
session_start();
?>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>



	function create()
	{

		var username1 = document.forms["form1"]["username1"].value;
		var password1 = document.forms["form1"]["password1"].value;
		var password2 = document.forms["form1"]["password2"].value;
		var mobilenum1 = document.forms["form1"]["mobilenum1"].value;
		var email1 = document.forms["form1"]["email1"].value;
		var gender1 = document.forms["form1"]["gender1"].value;
		var agree1 = document.forms["form1"]["agree1"].value;
		var date1 = document.forms["form1"]["date1"].value;
		var userlength=username1.length;
		var passlength1=password1.length;
		var passlength2=password2.length;
		var mobilelength1=mobilenum1.length;
		var emaillength=email1.length;
		var passreg= /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
		var mobireg= /^[0-9]{10,12}$/;
		var datereg=  /^(\d{4})(\/|-)(\d{1,2})(\/|-)(\d{1,2})$/;
		var postpassword;
		var postmobile;
		var i=0;
		var len;
 		var chosen="";
 		var postterms;
 		var postdate;
 		var postusername;
 		var postgender;
 		var postusername;




 		//username validation

		if (userlength<6) 
		{

			document.getElementById('user').innerHTML="Enter Minimum 6 characters";
		}
		else
		{

			document.getElementById('user').innerHTML="";
			postusername=username1;	
		}

		







		//password validation


		if(((passlength1)||(passlength2))<8)
	 	{
			document.getElementById('pass').innerHTML="Password contain atleast 8 characters";
		 	
		}
		 else if((((passlength1)&&(passlength2))>=8)&&(password1!=password2))
	 	{
	 		document.getElementById('pass').innerHTML="Password does'nt match";			
	 	}
	 	else if((passlength1&&passlength2>=8)&&(passlength1==passlength2))
	 	{
	 		if (password1.match(passreg))
	 		{
	 				document.getElementById('pass').innerHTML="";
	 	 			postpassword=password1;
	 	 			
	 	 	} 
	 	 	else
	 	 	{
	 	 			document.getElementById('pass').innerHTML="Password contains uppercase, lowercase, special characters and number. ";
	 	 	}
	 	}

	



	 	//mobile number validation

		if (mobilenum1.match(mobireg) ) 
	 	{
	 		document.getElementById('mobi').innerHTML="";	
	 		postmobile=mobilenum1;

	 	}
	 	else
	 	{
			document.getElementById('mobi').innerHTML="Enter valid mobile number"; 		
	 	}
	






	 	//gender validation
		 



		 len = document.forms.form1.gender1.length;
 			var i=0;
 			var chosen="";
			for (i = 0; i <len; i++) 
			{
				if (document.form1.gender1[i].checked) 
				{
					chosen = document.form1.gender1[i].value;
					document.getElementById('gender').innerHTML="";
					postgender=chosen;
				}
			}

			if (chosen == "") 
			{
				document.getElementById('gender').innerHTML="Select your gender";
			}



			//email validation


			if (emaillength==0) 
			{
				document.getElementById('email').innerHTML="Enter mail id";	
			} 
			else
			{
				document.getElementById('email').innerHTML="";
				postemail=email1;
			}




			//terms and condition validation


				if (document.form1.agree1.checked == false )
				{
						document.getElementById('terms').innerHTML="Read terms & conditions ";		
					
				}
				else
					
					{
						document.getElementById('terms').innerHTML="";
						postterms="I Accept";

					}





			//date validation

				if (date1.match(datereg))
				 	{
				 		document.getElementById('date').innerHTML="";
				 		postdate=date1;
				 	
				 	} 
				 	else
				 		{
				 					document.getElementById('date').innerHTML="Date should be in the form YYYY-MM-DD";

				 		}





//post the values thar are validate

			if (postusername==null||postpassword==null||postemail==null||postmobile==null||postdate==null||postterms==null||postgender==null) 
				{
						document.getElementById('formerror').innerHTML="Some thing went wrong in the form";						
				}
				 else
				 {
				 	$.post( 
                  "createaccount.php",
                  { postusername1:postusername, postpassword1:postpassword, postemail1:postemail, postmobile1:postmobile, postdate1:postdate, postterms1:postterms, postgender1:postgender },
                  function(data)
                   {
                     $('#user').html(data);
                     
                     
                   }
        				);
				 }
				


			







}
/*
function post()
{
var username = document.getElementById('username').value;
var password = document.getElementById('password').value;

 $.post( 
                  "loginvalidate.php",
                  { name:username,pass:password},
                  function(data)
                   {
                     $('#error').html(data);
                    window.location.href = "abc.html";
                     
                   }
        );





}
*/
</script>
</head>
<body>
<!--<div>
	<b>Login and start uploading</b>
<form method="POST" name="form" action="loginvalidate.php" >
 <input type="text" id="username" placeholder="username or email"  />
<input type="password" id="password" placeholder="password" />
<input type = "button" onclick="post()" value = "Login" />
<div id="error" ></div>

</form>
</div>
-->

<b>Login and start uploading</b>
<form method="post"  action="loginvalidate.php" >
<input type="text" name="username" placeholder="username or email"  />
<input type="password" name="password" placeholder="password" />
<input type = "submit" value = "Login" />
</form>






<div>
<b>Create an account</b>
<form method="POST" name="form1">
<p id="formerror"></p></br>
<input type="text" name="username1" placeholder="Username"/><p id="user"></p></br>
<input type="password" name="password1" placeholder="Password"/></br></br></br>
<input type="password" name="password2" placeholder="Reenter password"/><p id="pass"></p></br>
<input type="text" name="date1" placeholder="YYYY-MM-DD"/><p id="date"></p></br>
<input type="text" name="mobilenum1" placeholder="mobile number"/><p id="mobi"></p></br>
<input type="Email" name="email1" placeholder="Email"/><p id="email"></p></br>
<input type="radio" name="gender1" value="Male"><label>Male</label>
<input type="radio"  name="gender1" value="Female"><label>Female</label><p id="gender"></p></br>
<input type="checkbox" name="agree1"value="agree"><label>I agree the terms and conditions</label></br><p id="terms"></p>
<input type = "button" onclick="create()" value = "Signup" />
</form>
</div>
</body>
</html>