<html>
<head><title>Seach Product</title>
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
	width:150px;
	height:30px;
	font-size: 14px;
	white-space:nowrap;
}
input[type="text"]{
	width:100%;
	height:100%;
}
td{
   
   width:300px;
   margin:10px;
   padding:10px;
 }


</style>
</head>
<body>

<div id="form-holder">
	<form action="" method="post">
	<table>
		<!-- Name, Description, Price, CountryOfOrigin-->
		<tr>
			<td><input type="text" name="input"  id="input" value="search"/></td>
			<td><input type="submit" name="submit" id="submit" value="Search"/>
		</tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr>
			<td>&nbsp;</td>
			<td><a href="p6-1.php">Add product</a></td>
		</tr>
	</table>
	</form>
</div>
<div>
	<?php
		if(isset($_POST['submit'])){
		
			$connection=new mysqli("localhost","cs174_01","","cs174_01");
			
			// Check connection
			if (!mysqli_connect_errno($connection))
			  {
			  
				$input = $_POST['input'];
				$error =0;

				if(empty($input)){
					$error=1;
				}

				if($error == 0){

					$sql = "SELECT * from products
					        WHERE name Like '%$input%'
							OR description LIKE '%$input%'
							";
					
					if ($result = $connection->query($sql)) {

					    /* fetch object array */
					    echo '<table>';
					   
					    while ($row = $result->fetch_row()){
		?>
						<tr>
							<td><?php echo $row[0]?></td>
							<td><?php echo $row[1]?></td>
							<td><?php echo '$'.$row[2]?></td>
							<td><?php echo $row[3]?></td>
		<?php
					    }
					    
					    echo '</table>';
					 }
				}
			    else{
			    	echo "No results";
			    }		
			    $connection->close();
		}
	}
	?>
</div>
</body>
</html>