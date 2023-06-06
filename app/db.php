<?php 
	$host="localhost";
	$user_name="root";
	$password="";
	$dbname="chatsystem";
	$con = mysqli_connect($host,$user_name, $password, $dbname);
	if(!isset($_COOKIE['visiter'])){
		setcookie('visiter','yes',time()+(60*60*24*30));
		mysqli_query($con,"update visitor set count = count+1");
	}
?>