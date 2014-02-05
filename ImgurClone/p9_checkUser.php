<?php
//@Author Manzoor Ahmed

if(isset($_GET['name'])){
	$name = $_GET['name'];
	findUser($name);
}

if(isset($_GET['email'])){

$email = $_GET['email'];
findUsersEmail($email);	

}

function findUser($name){
	
$connection=new mysqli("localhost","cs174_01","","cs174_01");

	// Check connection
	if (!mysqli_connect_errno($connection)){

	$find = "SELECT username 
			 FROM register_users 
			WHERE username ='$name'";
	
		if ($stmt = $connection->prepare($find)) {
			
    		$stmt->execute();
    		$stmt->store_result();

    		if($stmt->num_rows > 0 ) {
    			echo "User exists already!, please provide another user name";	
    		}
		}
	}
	else{
		echo "Can not connect to the database.Try again.";
	}
}

//Avoids registration with duplicate emails 
function findUsersEmail($email){
	
$connection=new mysqli("localhost","cs174_01","","cs174_01");

	// Check connection
	if (!mysqli_connect_errno($connection)){

	$find = "SELECT email
			 FROM register_users 
			 WHERE email ='$email'";

		if ($stmt = $connection->prepare($find)) {
			
	
    		$stmt->execute();
    		$stmt->store_result();

    		if($stmt->num_rows > 0 ) {
    			echo "User with this email exists arlready!";	
    		}
		}
	}
	else{
		echo "Can not connect to the database.Try again.";
	}
}
?>