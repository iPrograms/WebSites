<?php

//@Author Manzoor Ahmed
//Login registered user

$email ="";
$password ="";

if(isset($_POST['sub'])){

	$email = $_POST['email'];
	$password = $_POST['password'];
	$hash_password = md5($password);
	$connection=new mysqli("localhost","cs174_01","","cs174_01");
	
			if (!mysqli_connect_errno($connection)){
				
				 if ($stmt = $connection->prepare("SELECT id,firstname,lastname,username,email 
												   FROM register_users 
												   WHERE email=? 
												   AND password =?")) {
   
					   /* bind parameters for markers */
					   $stmt->bind_param("ss", $email,$hash_password);
					   echo $hash_password;
					   $stmt->execute();
					   $stmt->bind_result($id,$fn, $ln,$un,$em);

								/* fetch value */
							   if($stmt->fetch()){
								
								session_start();

								$_SESSION['firstname'] = $fn;
								$_SESSION['lastname'] = $ln;
								$_SESSION['username'] = $un;
								$_SESSION['email'] = $em;
								$_SESSION['id'] = $id;

									if(!headers_sent()){
													
										header("Location:http://cs34.cs.sjsu.edu/cs174_01/public_html/dashboard.php");
										exit;	
									}		
								}
							
				}
			}
			else{
				echo "Connection error, try again";
			}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Login Form</title> 

<style type="text/css">
#container{
	margin:10px 100px 0px 200px;
}

#errors{
	display:none;
}
#errors p{
	color:red;
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

</style>
</head>

<body>
<div id="main-holder">
		<div id="inner-holder">	
			<div id="header"><span >imgur clone</span>
			</div>
		</div>
</div>	
	<form action="" method="post">

		<div id="container">
			<div id="errors">
				<p id="login">Invalid Log in information</p>
			</div>
			<div>
				<label>Email</label>
				<input type="text" name="email" id="email" size="25"/>
			</div>
			<div>
				<label>Password</label>
				<input type="password" name="password" id="password" size="25"/>
			</div>
			<div>
				<input type="submit" name="sub" id="sub" value="Log in"/>
			</div>
		</div>	
	</form>
</body>
</html>
