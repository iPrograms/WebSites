<html>
<?php $input ="";?>
<head><title>Seach Product</title>

<script src="myjs/DataTables-1.9.4/media/js/jquery.js"></script>
<script src="myjs/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script src="http://datatables.net/download/build/jquery.dataTables.nightly.js"></script>

<style type="text/css">

	@import "myjs/DataTables-1.9.4/media/css/demo_page.css";
	@import "myjs/DataTables-1.9.4/media/css/demo_table.css";
	@import "myjs/DataTables-1.9.4/media/css/demo_table_jui.css";
	@import "myjs/DataTables-1.9.4/media/css/jquery.dataTables.css";
	@import "myjs/DataTables-1.9.4/media/css/jquery.dataTables_themeroller.css";
</style>

<script>
$(document).ready(function() {
    $('#dataTable').dataTable();
} );
</script>

</head>
<body>
<h3>Manzoor Ahmed CS174 TU TH 9:00 AM - 10:15AM</h3>
	<form action="" method="post">
	<table>
		<tr>
			<td><input type="text" name="input"  id="input" value=""></td>
			<td><input type="submit" name="sub" id="sub" value="Search"</td>
		</tr>
	</table>
	</form>

<table id="dataTable">
<thead>
        <tr>
            <th>Id</th>
            <th>Product</th>
            <th>Price</th>
            <th>Description</th>
            <th>Country</th>
        </tr>
    </thead>
<tbody>

<?php


//$connection=new mysqli("localhost","root","","174");
$connection=new mysqli("localhost","cs174_01","Kvh1qTCP","cs174_01");

if(isset($_POST['input'] )){
	$input = $_POST['input'];
	$error =0;

	if(empty($input)){
		$error=1;
	}

	if($error == 0){

	  $sql = "SELECT * from products where name='$input' OR description Like '%$input%'";
					
		  if ($result = $connection->query($sql)) {

		  while ($row = $result->fetch_assoc()) {

				print ("<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['price']."</td><td>".$row['description']."</td><td>".$row['country']."</td></tr>");
		  }
		}
		echo  "ran";
     }

	 else{
			    	print("No results");
		  }			
}
if(!isset($_POST['input'])){
	
	// Check connection
	
	if (!mysqli_connect_errno($connection))
	{
			$sql = "SELECT * from products";

			if ($result = $connection->query($sql)) {

			    /* fetch object array */
			    while ($row = $result->fetch_assoc()) {

				      print ("<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['price']."</td><td>".$row['description']."</td><td>".$row['country']."</td></tr>");
			     }    
			 }
	}
	
}
?>
</tbody>
 <tfoot>
          <tr>
            <th>Id</th>
            <th>Product</th>
            <th>Price</th>
            <th>Description</th>
            <th>Country</th>
          </tr>
        </tfoot>
</table>
</body>
</html>