
<?php

$name = $_GET['name'];
findUser($name);

function findUser($name){

$connection=new mysqli("localhost","root","","174");

	// Check connection
	if (!mysqli_connect_errno($connection)){

	$find = "SELECT name from users where name ='$name'";
	
		if ($stmt = $connection->prepare($find)) {
			
			 /* execute query */
    		$stmt->execute();

    		/* store result */
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
?>