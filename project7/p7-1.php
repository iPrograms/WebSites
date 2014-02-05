<html>
<head>
<title>CS174 Project 7 Part 1</title></head>
<style type="text/css">
#response{
	color:red;
}
</style>
<body>

<script>
function checkUser(user)
{
var xmlhttp;    
if (user=="")
  {
  document.getElementById("response").innerHTML="";
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
     document.getElementById("response").innerHTML=xmlhttp.responseText;

    }
  }
xmlhttp.open("GET","p7-1-check-user-AJAX.php?name="+user,true);
xmlhttp.send();
}

</script>
  
  <div>
	<h3>CS174 Manzoor Ahmed TU TH 9:00 AM - 10:15 AM </h3>
	<div id="response">
   
    <?php  	
    	if(isset($_POST['submit'])){
    		
    		$name = $_POST['name'];
			$password = $_POST['password'];

			if(empty($name) || empty($password)){
				echo "<p style='color:red;'>Please provide all fields</p>";
			}
			else{

			$connection=new mysqli("localhost","cs174_01","Kvh1qTCP","cs174_01");
			//$connection=new mysqli("localhost","root","","174");

				// Check connection
				if (!mysqli_connect_errno($connection)){

					$find = "SELECT name from users where name ='$name'";
	
					if ($stmt = $connection->prepare($find)) {
			
					 /* execute query */
		    		$stmt->execute();

		    		/* store result */
		    		$stmt->store_result();
		    		
    				
    				if($stmt->num_rows > 0){
    					echo "<p style='color:red;'>$name is registered already! Please chose another user name</p>";
    				}
    				else{
						$sql = $connection->prepare("INSERT INTO users (name, password)
										 VALUES (?,?)");
										
										$sql->bind_param('ss',$name,$password);
										$sql->execute();
										$sql->close();
										echo "<p style='color:green;'>user $name registered!</p>";
						}
					}
				}
				else{
					echo "Can not connect to the database.Try again.";
				}
			}
	 }

	?>
	</div>		
		<div class ="form">
			<form action="" method ="post">
				<labe for="name">First Name</label><input type="text" name="name" id="name" onblur="checkUser(this.value);"/>
				<label for="password">Password</label><input type="password" name="password" id="password"/>
				<input type="submit" name="submit" id="submit" value ="Register"/>
			</form>
		</div>
  </div>
</body>
</html>