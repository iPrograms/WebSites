<?php

$name = $_POST['name'];
$password = $_POST['password'];

$connection=new mysqli("localhost","root","","174");

	// Check connection
	if (!mysqli_connect_errno($connection)){

	$sql = $connection->prepare("INSERT INTO users 
								(name, price)
								VALUES (?,?)");
					
					$sql->bind_param('ss',$name,$password);
					$sql->execute();
					$sql->close();
					echo "user $name registered!";
	}
	else{
		echo "Can not connect to the database.Try again.";
	}
?>