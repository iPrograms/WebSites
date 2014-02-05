<html>
<head><title>Add New Product</title>
<style>
	#form-holder,#error{
		margin:0 auto;
		padding:100px 50px 50px 200px;
	}
	input[type="button"],input[type="submit"]{
	
	border:1px solid #adc5cf;
	background: #e4f1f9; /* Old browsers */
	background: -moz-linear-gradient(top, #e4f1f9 0%, #d5e7f3 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e4f1f9), color-stop(100%,#d5e7f3)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #e4f1f9 0%,#d5e7f3 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #e4f1f9 0%,#d5e7f3 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #e4f1f9 0%,#d5e7f3 100%); /* IE10+ */
	background: linear-gradient(top, #e4f1f9 0%,#d5e7f3 100%); /* W3C */
	height:30px;
	padding:0 0 0 2px;
	margin:0px;
	color:#7da2aa;
	cursor: pointer;
	width:650px;
	height:30px;
	font-size: 14px;
	white-space:nowrap;
}
</style>
</head>
<body>

<div id="form-holder">
	<form action="" method="post">
	<table>
		<!-- Name, Description, Price, CountryOfOrigin-->
		<tr><td colspan="4"><a href="p6-2.php">Search Product</a></td></tr>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Country</th>
		</tr>
		<tr>
			<td><input type="text" name="name"  id="name"/></td>
			<td><input type="text" name="description"  id="description"/></td>
			<td><input type="text" name="price"  id="price"/></td>
			<td><input type="text" name="country"  id="country"/></td>
		</tr>
		<tr><td colspan="4">&nbsp;</td></tr>
		<tr>
			
			<td colspan="4"><input type="submit" name="sub" id="sub" value="Add"/></td>
		</tr>
	</table>
	</form>
</div>
<div id="error">
	<?php
		if(isset($_POST['sub'])){
		
			
			$connection=new mysqli("localhost","cs174_01","","cs174_01");
			
			// Check connection
			if (!mysqli_connect_errno($connection))
			  {
			  
				$name =       $_POST['name'];
				$description= $_POST['description'];
				$price=       $_POST['price'];
				$country=     $_POST['country'];
				$error =0;

				if(empty($name) || empty($description) || empty($price) || empty($country)){
					$error=1;
				}

				if($error == 0){

					$sql = $connection->prepare("INSERT INTO products(name, price, description, country)
												VALUES (?,?,?,?)");
					
					$sql->bind_param('sdss',$name,$price,$description,$country);
					$sql->execute();
					$sql->close();
					echo "Product $name inserted";
				}
			    else{
			    	echo "Please provide all product information";
			    }		
		}
	}
	?>
</div>
</body>
</html>