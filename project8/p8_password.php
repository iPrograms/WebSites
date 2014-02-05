<?php
echo "<h3>Manzoor Ahmed  CS 174 Project 8  TU/TH 9:00AM - 10:15AM</h3>";

$password = $_GET['pwd'];
$inList = false;
$location= -1;
$strength = 0;

$lowerCase ='/[a-z]/';
$upperCase ='/[A-Z]/';
$digits = '/[0-9]/';
$others = '/[^a-zA-Z0-9]/';

##1. Is the password in the list of the 10,000 most common passwords? (true or false)
#2. If so, then where in the list is it ranked? (a number or -1 if it is not on the list)
#3. A number from 0 to 5 representing the strength of the password. 0 is very weak, while 5 is strong.
#To calculate the strength, give a password one point for each of the following criteria:
#1. 8 or more characters
#2. contains uppercase letters
#3. contains lowercase letters
#4. contains numbers
#5. contains other characters
#
#So, some example responses might be:
#[false, -1, 4]
##
	$file = file_get_contents('./passwords.txt', true);

	$file_lines = explode(PHP_EOL,$file);

	for($i=0;$i<count($file_lines);$i++){
		
		$cleaned = trim($file_lines[$i]);

		if($cleaned == $password){
			$inList = true;
			$location = $i+1;
			break;
		}
	}
	//echo count($file_lines);
	if(strlen($password)>= 8){
		$strength++;
	}

	if(preg_match($lowerCase,$password)){
		$strength++;
	}
	if(preg_match($upperCase,$password)){
		$strength++;
	}
	if(preg_match($digits,$password)){
		$strength++;
	}
	if(preg_match($others,$password)){
		$strength++;
	}

$build_array = array($inList,$location,$strength);
$jason = json_encode($build_array);
echo $jason;
?>