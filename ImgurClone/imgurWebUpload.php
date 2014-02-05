
<?php
//@Author Manzoor Ahmed
session_start();


if(!isset($_SESSION['email'])){
	header("Location:login.php");
	exit;
}
else{

	if(isset($_POST['websubmit'])){
		
		$title = htmlentities($_POST['title']);
		$description = htmlentities($_POST['description']);
		$url = htmlentities($_POST['weburl']);
		$id = $_SESSION['id'];

		$connection=new mysqli("localhost","cs174_01","","cs174_01");

		if (!mysqli_connect_errno($connection)){
				
				 if ($stmt = $connection->prepare("INSERT INTO imgur 
							(id,title,description,img)
							VALUES (?,?,?,?)")){
														
					$stmt->bind_param('isss',$id,$title,$description,$url);
					$stmt->execute();
					$stmt->close();						
					}
					else{
						echo "errorr!!";	
					}

			if(!headers_sent()){
				header("Location:dashboard.php");
				exit;
			}

		}
		else{
			echo "connection error";
		}
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
				height:466px;
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
				margin:10px 200px 10px 200px;
				width:550px;
				height:550px;
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
				
				<li id="upload">Web upload</li>
		
			</ul>
</form>			
			</div>
			
			<div id="content">
			
			<form name="" method ="post" action="">
							
							<div id="hiddenweb">
								
									<label for="title">Title</label><br/>
									<input type="text" name="title" id="title"/><br/>
									<label for="description">Description</label><br/>
									<input type="text" name="description" id="description" value=""/><br/>
									<label for="weburl">URL</label><br/>
									<input type="text" name="weburl" id="weburl"/><br/>
									<input type="submit" name="websubmit" id="websubmit" value="Upload it"/>
							</div>
			</form>
				
		  	</div>

</div>
</body>
</html>
<?php 
}
?>
