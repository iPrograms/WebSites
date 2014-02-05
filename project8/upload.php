<?php 
$url = parse_url('localhost');

if($_FILES["file"]["error"] > 0){
	
}

else{
		
	$dir = "resume/";		
	$file_name = $_FILES['file']['name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	
	echo $dir." ";
	echo $file_name." ";
	echo $file_size." ";
	echo $file_type." ";


	if(file_exists($dir,$_FILES['file']['tmp_name'])){
		echo "duplicate upload;";
		break;
	}

	if(file_exists($dir,$_FILES['file']['tmp_name'])){
		echo "file exists already";
		break;
	}

	else{
		move_uploaded_file($_FILES['file']['tmp_name'],$dir. $_FILES["file"]["name"]);
		echo "</br>File uploaded!";
	}	
}
?>