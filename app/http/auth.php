<?php 
include("../db.php");
session_start();
if(isset($_POST['login_user'])){
			  $login_user_name=$_POST['user_name'];
              $login_password=md5($_POST['password']);
			  $login_data = '&user_name='.$login_user_name.'&password='.$login_password;
              if(empty($login_user_name)){
              	$error="User Name is Required";
              	header("Location: ../../login.php?error=$error&$login_data");
              }
              elseif(empty($login_password)){
              	$error="User Password is Required";
              	header("Location: ../../login.php?error=$error&$login_data");
              }else{
              	$query="SELECT * FROM users WHERE user_name='$login_user_name' and password='$login_password'";
				$result = mysqli_query( $con, $query);
              	$row = mysqli_fetch_array($result);
		        if(!$row){
		            $error= "No existing user or wrong password.";
		            header("Location: ../../login.php?error=$error");
					exit;
		        }
		        else {
		        	$_SESSION['user_id']=$row['user_id'];
	              	$_SESSION['user_name']=$row['user_name'];
	              	$_SESSION['password']=$row['password'];
	              	$_SESSION['email']=$row['email'];
		            header("Location: ../../homedashboard.php");
		        }
              


              }
		}
?>