<?php
	/*******************************************************************************************
	*	
	*	Product_Edit.php
	*	
	*		This page has many security holes.
	*		1. Make a list of all the security holes using OWASP ZAP (even the informational and minor ones)
	*		2. Fix them
	*		3. Show me a clean scan (as you do it)
	*******************************************************************************************/
	
	// Create connection to database
	$mysqli = new mysqli("localhost","root","","test");

	if ($mysqli->connect_errno)
	{
		// terminate the current script with an error message
		exit("Failed to connect to MySQL: " . mysqli_connect_error());
	}
	
	$id = "";
	$Name = "";
	$Description = "";
	$Price = "";

	if( isset($_POST['Name']) )
	{
		$id = $_POST['id'];
		$Name = $_POST['Name'];
		$Description = $_POST['Description'];
		$Price = $_POST['Price'];

		// query the db
		$status = $mysqli->query("UPDATE products SET Name = '$Name', Description = '$Description', Price = $Price  WHERE id = $id");
	
		print("Product updated!<br/>");
	}


	if( isset($_GET['pid']) )
	{

		if( $Results = $mysqli->query("SELECT id, Name, Description, Price FROM products WHERE id = ".$_GET['pid']) )
		{
			if($row = $Results->fetch_assoc())
			{
				$id = $row['id'];
				$Name = $row['Name'];
				$Description = $row['Description'];
				$Price = $row['Price'];

				$DisplayCode = "<form method=\"POST\" action=\"Product_Edit.php?pid=$id\">";
				$DisplayCode .= "<label class='ProductLabel'>id:</label><span class='ProductSpan'>$id</span><br/>";
				$DisplayCode .= "<input type=\"hidden\" name=\"id\" value=\"$id\" />";
				$DisplayCode .= "<label class='ProductLabel'>Name:</label><input type=\"text\" name=\"Name\" value=\"$Name\" /><br/>";
				$DisplayCode .= "<label class='ProductLabel'>Description:</label><input type=\"text\" name=\"Description\" value=\"$Description\" /><br/>";
				$DisplayCode .= "<label class='ProductLabel'>Price:</label><input type=\"text\" name=\"Price\" value=\"$Price\" /><br/>";
				$DisplayCode .= "<input type=\"submit\" value=\"Update Product\" />";
				$DisplayCode .= "</form>";
				print($DisplayCode);

			}
		}
	}
	else
	{
		// redirect with this message
		echo "No pid parameter found in URL.<br/>";
		echo "URL should include something like ?pid=1<br/>";
	}
	
	$mysqli->close();

?>