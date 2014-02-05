<?php 

if($FILES["file"]["error"] > 0){
	
}

else{
		
$dir = "resume/";
		
$file_name = $FILES['file']['name'];
$file_size = $FILES['file']['size'];
$file_type = $FILES['file']['type'];

	if(file_exists($dir,$FILES['file']['temp_name']){
		echo "duplicate upload;";
	}
	else{
		move_uploaded_file($FILES['file']['name'],$dir);
		echo "</br>File uploaded!";
	}
}
?>