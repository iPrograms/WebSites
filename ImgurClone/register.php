<?php 

//@Author Manzoor Ahmed
//Register new user

session_start();		

?>
<html>
	<head>

			<title>Project 9</title>
			<!--
			 Project 9
			 CS 174 
			 -->
			<style type="text/css">

			#holder{
				
				padding:1% 0% 5% 10%;
				margin:auto;
				position:relative;
			}		

   			#formholder{
   				width:580px;
   				margin:2px;
   			}

   			.label{
   				width:150px;
   				float:left;
   				padding:0px 10px 10px 0px;
   				margin:10px;
   				font-family:helvetica,sans-serif;
   				font-size:16px;
   				color:black;
   			}
   			.input{
   				width:280px;
   				height:30px;
   				float:right;
   				margin:10px;
   				padding:0px 0px 0px 10px;
   			}
   			.button{
   				
   				float:right;
   				margin-top:10px;
   			}

			.red{
				color:red;
			}
			
			#gray{
				width:50%;
				height:auto;
				color:black;
				font-style:sans-serif,arial;
				size:16px;
				border:1px solid #bf9a18;
				padding:10px 10px 10px 15px;
				margin:0px 0px 15px 0px;
				background-color:#eed372;
			}
			#userclass,#lastnameclass,#firstnameclass,#phonennumberclass,#passwordclass{
				width:49.5%;
				color:red;
				font-style:sans-serif,arial;
				size:16px;
				padding:10px 10px 10px 15px;
				display:none;
				margin:5px;
				background-color:#eed18b;
			}
			#ok{
				width:538px;
				height:200px;
				color:black;
				font-style:sans-serif,arial;
				size:16px;
				padding:5px 5px 5px 0px;
				margin:10px 0px 5px 0px;
				background-color:#faeec2;
			}

		
			.button{
				padding:8px;
				width:200px;
				height:50px;
				font-size:12px;
				background-color:#EED372;
				box-shadow: 0 5px 5px -3px black;
			}
			.red{
				color:red;
			}
			.green{
				color:#51b14e;
			}
			#footer{
				width:100%;
				margin:10px;
			}
			.captcha{
				margin:40px 30px 0px 0px;
				padding-top:10px;
				float:left;
			}
				#main-holder{
				width:1200px;
				margin:auto;
			}

			#inner-holder{
				background-color:black;
			}

			#header{
				background-color:black;
				height:25px;
				padding:10px 10px 25px 10px;
			}

			#header span{
				font-size:30px;
				font-family:arial,sans-serif;
				font-size:20px bold;
				color:white;
			}
			
			#header ul,li{
				display:inline;
				color:#FFFFFF;
				list-style: none;
				margin:.5em;
			}
		
			td{
				padding-right:30px;
			}
			</style>
	</head>

<script>
function checkUser(user)
{
	var xmlhttp;    
	if (user=="")
	  {
	  document.getElementById("error").innerHTML="Required = *";
	  return;
	  }
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
		xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	     document.getElementById("error").innerHTML=xmlhttp.responseText;

	    }
	  }
	xmlhttp.open("GET","p9_checkUser.php?name="+user,true);
	xmlhttp.send();
}

function checkUsersEmail(email){
	var xmlhttp;    
	if (email=="")
	  {
	  document.getElementById("error").innerHTML="Required = *";
	  return;
	  }
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
		xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	     document.getElementById("error").innerHTML=xmlhttp.responseText;

	    }
	  }
	xmlhttp.open("GET","p9_checkUser.php?email="+email,true);
	xmlhttp.send();
}
</script>

<body>

<?php
$passwordError ="";
$firstnameError ="";
$lastnameError ="";
$usernameError ="";
$emailError="";
$userName = "";
$firstName = "";
$lastName ="";
$password = "";
$message = "";
$email="";
$captcha="";
$captcha_error ="";
$id ="";

?>
<div id="main-holder">
		<div id="inner-holder">	
		
			<div id="header"><span >imgur clone</span>
			
			</div>
		</div>
</div>		

<div id="holder">
	<div class="form-holder">

		<div id="error">
			<div id ="gray"><p>Required  = *</p>
				<?php

				if(isset($_POST['sub'])){
							
					if(isset($_POST['uname'])){
						$userName = $_POST['uname'];
					}
					if(isset($_POST['fname'])){
						$firstName = $_POST['fname'];
					}
					if(isset($_POST['lname'])){
						$lastName = $_POST['lname'];
					}
					
					if(isset($_POST['password'])){
						$password = $_POST['password'];
					}
					if(isset($_POST['email'])){
						$email= $_POST['email'];
					}
					
					$message = ""; //error message
					
					//regex 
					$nameReg = '/^[A-Z\a-z]{1,}$/';
					$userNameReg = '/^[a-zA-Z\-]+$/';
					$passwordReg ='/^[0-9a-zA-Z]{8,}$/';
					$emailReg ='/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/';

					if(!preg_match($passwordReg,$password)){
						
						$passwordError ="Password must be at least 8 characters and contain one digit<br/>";
						echo $passwordError;
					}
					if(preg_match($passwordReg,$password)){
						
						$passwordError ="ok";
					}

					if(!preg_match($userNameReg,$lastName)){
						$lastnameError = "Last name must contain characters only<br/>";
						echo $lastnameError;
					}

					if(preg_match($userNameReg,$lastName)){
						$lastnameError = "ok";
					}

					if(!preg_match($userNameReg,$firstName)){
						$firstnameError = "First name must only contain charachters<br/>";
						echo $firstnameError;
					}
					if(preg_match($userNameReg,$firstName)){
						$firstnameError = "ok";	
					}

					if(!preg_match($nameReg,$userName)){
						 $usernameError ="Username must be uppercase and lowercase characters<br/>";
						 echo $usernameError;
					}
					if(preg_match($nameReg,$userName)){
						 $usernameError ="ok";	 
					}
					if(!preg_match($emailReg,$email)){
						$emailError="Invalid Email address</br>";
						echo $emailError;
					}
					if(preg_match($emailReg,$email)){
						$emailError="ok";
					}
					if($_POST["recaptcha_challenge_field"]){
						
						require_once('recaptchalib.php');
						$privatekey = "6LcqquoSAAAAABlw8vYHfGkZe39ZtNnwa97It4I8";
						
						$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
								
						if (!$resp->is_valid) {
							$captcha_error ="Invalid Captcha Code</br>";
							echo $captcha_error;
						}
						else{
							$captcha_error ="ok";
						}
					}
					//output if all data is valid
					if($passwordError =="ok" &&
					   $firstnameError =="ok" &&
					   $lastnameError =="ok" &&
					   $usernameError =="ok" &&
					   $emailError =="ok" &&
					   $captcha_error =="ok"
					  )
						   {
							$connection=new mysqli("localhost","cs174_01","","cs174_01");
							
									// Check connection
									if (!mysqli_connect_errno($connection)){
	
										$hash_password = md5($password);
										
										$sql = $connection->prepare("INSERT INTO register_users 
																	(firstname,lastname,username,email,password)
																	VALUES (?,?,?,?,?)");
														
										$sql->bind_param('sssss',$firstName,$lastName,$userName,$email,$hash_password);
										$sql->execute();
										$sql->close();

										//get user's id
										if ($stmt = $connection->prepare("SELECT id 
																		  FROM register_users 
																		WHERE email=?")){
   
										   
										   $stmt->bind_param("s", $email);
										   $stmt->execute();
										   $stmt->bind_result($i);

											if($stmt->fetch()){
												$id = $i;
											}
										}

										$_SESSION['firstname'] = $firstName;
										$_SESSION['lastname'] = $lastName;
										$_SESSION['username'] = $userName;
										$_SESSION['email'] = $email;
										$_SESSION['id'] = $id;

										if(!headers_sent()){
												
												header("Location:http://cs34.cs.sjsu.edu/cs174_01/public_html/dashboard.php");
												
												exit;	
											}				
									}
									else{
										echo "Can not connect to the database.Try again."; //should be logged, for now outupt
									}
						   }
				}					
				?>
		</div>
	</div> <!-- error-->
	
	<div id="formholder">
		
		<form action="" method ="POST" name="form" id="form">
				<div class="label"> <label for="uname"  id="uname">User Name</label>
					<?php 
						if($usernameError =="")
						{
							echo '<span>*</span><br/>';
						}
						else if($usernameError =="ok"){
								echo '<span></span><br/>';
						}
						else{
							echo '<span class="red">*</span><br/>';
						}
					?>
				</div>

				<div class="input">
					<input type="text" name ="uname" id="uname" onblur="checkUser(this.value)" value='<?php echo $userName; ?>'/>
					
				</div>

				<div class="label">
					<label for="fname">First Name</label>
					
					<?php if($firstnameError =="")
					{
						echo '<span>*</span><br/>';
					}
					else if($firstnameError =="ok"){
							echo '<span></span><br/>';
					}
					else{
						echo '<span class="red">*</span><br/>';
					}
					?>
				</div>

				<div class="input">
					<input type="text" name ="fname" id="fname" value='<?php echo $firstName;?>'/>
				</div>
				
				<div class="label">
					<label for="lname">Last Name</label>
					<?php 
						if($lastnameError ==""){
							echo '<span>*</span><br/>';
						}
						else if($lastnameError =="ok"){
							echo '<span></span><br/>';
						}
						else{
							echo '<span class="red">*</span><br/>';
						}
					?>
				</div>

				<div class="input">
					<input type="text" name ="lname" id="lname" value='<?php echo $lastName; ?>'/>
				</div>

			
			<div class="label">
					<label for="password">Password</label>
					<?php 
						if($passwordError ==""){
							echo '<span>*</span><br/>';
						}
						else if($passwordError =="ok"){
							echo '<span></span><br/>';
						}
						else{
							echo '<span class="red">*</span><br/>';
						}
					?>
					
				</div>

				<div class="input">
					<input type="password" name ="password" id="password" value=""/>
				</div>
			
				<div class="label">
					<label for="email">Email</label>
					<?php 
						if($emailError ==""){
							echo '<span>*</span><br/>';
						}
						else if($emailError =="ok"){
							echo '<span></span><br/>';
						}
						else{
							echo '<span class="red">*</span><br/>';
						}
					?>
				</div>

				<div class="input">
					<input type="text" name ="email" id="email" onblur="checkUsersEmail(this.value)"value='<?php echo $email;?>'/>
				</div>
	
				<div class='captcha'>
				
					<?php
						require_once('recaptchalib.php');
						$publickey = "6LcqquoSAAAAACr3muIpGKOe9Bm4p-fj51JvYawL"; 		      
						echo recaptcha_get_html($publickey);
					
						echo '<div class="label"></label>';
						echo '<div class="btn_left"><input type="submit" value="Register me"  name="sub" id="sub"/></div>';
					?>	
				</div>
		</form>
	</div>
</div>
</body>
</html>		