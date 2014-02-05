<?php
session_start();
$id = $_SESSION['id'];

if(!isset($_SESSION['email'])){
	header("Location:login.php");
	exit;
}
else{
	if(isset($_POST['upload'])){
		
		exit;
	}
	if(isset($_POST['web'])){
		header("Location:imgurWebUpload.php");
		exit;
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
			<title>imgur clone</title>
			<!--Manzoor Ahmed
			 Final Project
			 CS 174 M W 900-1015
			 -->
			<style type="text/css">

			body{
				background-color:#EEEEEE;
				font-family:arial;
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
		
			#content{
				background-color:#FFFFFF;
				height:auto;
				padding:35px 0px 0px 25px;
				padding-right: 5px;
			}
			
			#left-content{
				width: 680px;
				height:700px;
				padding:40px 0px 0px 20px;
				margin-right:10px;
				float:left;
				
			}

			.p{
				margin:10px 10px 0px 300px;
				color:#444444;
				font-weight:bold;
			}
		
			#right-content{
				width: 450px;
				padding:10px;
				margin:1px;
				float:right;
			}
		
			#right-content span{
				font:bold;
			}
			
			#movie-container{
				border:1px solid #EEEABB;
				height:auto;
				background-color:#FFFACC; 
			}

			.movie{
				
				height:140px;		
			}

			.movie-left{
				
				float:left;
				margin:5px 5px 0px 25px;
			}

			.movie-right{
				width:660px;
				float:right;
				margin:10px 10px 0px 10px;
			}

			.bold{
				
				font-size:22px;
			}

			.name{
				
				font-size:20px;
			}
			
			#footer{
				background-color:#FFFFFF;
				height:15px;
				padding:5px;
			}
		
			#footer ul{
				padding:0px;
				margin:0px;
			}
			
			#footer li{
				display:inline;
				color:#000000;
				font-size:11px;
				margin:.7em;
			}

			.h{
				margin-left:25px;
				margin-right:25px;
				color:gray;
			}
			#rigth-content#info{
				width:200px;
				height:100px;
				margin:1px;
				padding:2px;
			}
			#hiddenweb{
				margin:10px 10px 10px 0px;
				display:none;
				width:250px;
				height:250px;
				float:right;
			}
			#hiddenweb1{
				margin:10px 20px 10px 0px;
				display:none;
				width:350px;
				height:250px;
				float:left;
			}
			</style>
				
			
	</head>

<body>
<div id="main-holder">
		<div id="inner-holder">	
		<form name="" method="post">
			<div id="header"><span >imgur clone</span>

			<ul>
				<li>random mode</li>
				<li id="upload">upload</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>Update Account</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>

			</ul>
</form>			
			</div>
			
			<div id="content">
			
				<div id="left-content">
					
					<h3><?php echo $_SESSION['firstname'];?>'s uploaded images</h3>
					
					<?php

						$connection=new mysqli("localhost","cs174_01","","cs174_01");

					 if($Results = $connection->query("SELECT * FROM imgur WHERE id = ".$id) ){
							echo "<table>";
							
							while($row = $Results->fetch_assoc())
							{
								
								$Name = $row['title'];
								$Description = $row['description'];
								$Img = $row['img'];

								echo '<tr>
									 	<td>'.$Name.'</td>
									 </tr>';
								echo '<tr>
									 	<td>'.$Description.'</td>
									 </tr>';
								echo '<tr>
									 	<td><img src='.$Img.'  width="200" height="200"/></td>
									 </tr>';
							}
							echo '</table>';
						}
					?>
				</div>
					<div id="rigth-content"><span class="bold">Upload images</span>

						<form name="" method="post" action="">
							<div>
								<input type="submit" name="upload" id="upload" value="Upload"/>
								<input type="submit" name="web" id="web" value ="Web"/>
							</div>
						</form>
						</div>
					</div>
				</div>
		
		  <div>
		  			
		  </div>
			<div id="footer">
				<ul>
					<li>&copy 2013 clone, Inc.</li>
					<li>About Us</li>
					<li>Contact Us</li>
					<li>Blog</li>
				</ul>
			</div>
		</div>
</div>
</body>
</html>
<?php 
}
?>