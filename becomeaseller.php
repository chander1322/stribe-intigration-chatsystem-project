<head>
    <script src="js/jquery.min.js"></script>
	
</head>
<?php
include("app/db.php"); 
session_start();
$userid=$_SESSION['user_id'];
if(isset($_POST['becomeaseller'])){
	$Role="UPDATE users SET user_role = 'Buyer' WHERE user_id = $userid";
	mysqli_query($con,$Role);
	header("Location: homedashboard.php?role=becomeabuyer");
}
if(isset($_POST['becomeabuyer'])){
	$Role="UPDATE users SET user_role = 'Seller' WHERE user_id = $userid";
	mysqli_query($con,$Role);
	header("Location: homedashboard.php?role=becomeaseller"); 
}
?>