<?php 
	include("../db.php");

	?>

	<?php
	#User Signup
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$pass=md5($password);
		$file=$_FILES['profile_img']['name'];
		$tmp_file=$_FILES['profile_img']['tmp_name'];
		$user_role=$_POST['user_role'];
		$allow_ext=array("jpg","jpeg","png");
		$extention = pathinfo($file, PATHINFO_EXTENSION);
		#select users from users table
		$query = "SELECT user_name FROM users WHERE user_name='$user_name'";
	    $result=mysqli_query($con,$query);
	    $row = mysqli_fetch_array($result);
		
		$data =  'name='.$name.'&user_name='.$user_name.'&email='.$email;
		if(empty($name)){
			$error="The Name is Required ";
			header("Location: ../../signup.php?error=$error&$data");
			exit;
		}elseif(empty($user_name)){
			$error="The User Name is Required";
			  header("Location: ../../signup.php?error=$error&$data");
			exit;
		}elseif(!empty($row)){
			$error= "Username already exists";
			header("Location: ../../signup.php?error=$error&$data");
			exit;
		}elseif(empty($email)){
			$error="The Email is Required";
			header("Location: ../../signup.php?error=$error&$data");
			exit;
		}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$error = "Invalid Email URL Please use like 'Examp4le@gmail.com'";
			header("Location: ../../signup.php?error=$error&$data");
			exit;
		}elseif(empty($password)){
			$error="The Password is Required";
			header("Location: ../../signup.php?error=$error&$data");
			exit;
		}elseif(!empty($file)){
			if(in_array($extention, $allow_ext)){
				$path="../../uploads/".$file;
				move_uploaded_file($tmp_file,$path);
				$sql= "insert into users(name,user_name,email,password,profile_img,user_role)values('$name','$user_name','$email','$pass','$file','$user_role')";
				mysqli_query($con,$sql);
				$success = "Account Created Successfull";
				header("Location: ../../login.php?success=$success");
				exit;
			}else{
				$error="upload only jpg, jpeg, and png file";
				header("Location: ../../signup.php?error=$error&$data");
				exit;
			}
		}
		else{
			$sql= "insert into users(name,user_name,email,password,profile_img,user_role)values('$name','$user_name','$email','$pass','$file','$user_role')";
				mysqli_query($con,$sql);
				$success = "Account Created Successfull";
				header("Location: ../../login.php?success=$success");
		}
	}

	
	#add product
	if(isset($_POST['AddNewProduct'])){
		$user_id = $_POST['user_id'];
		$category = $_POST['category'];
		$title = $_POST['title'];
		$imageFile=$_FILES['image']['name'];
		$tmp_file=$_FILES['image']['tmp_name'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$allow_img_ext=array("jpg","jpeg","png");
		$extention = pathinfo($imageFile, PATHINFO_EXTENSION);
		$data =  'category='.$category.'&title='.$title.'&price='.$price;
		if(empty($category)){
			$error="Select Category is Required ";
			header("Location: ../../homedashboard.php?error=$error&$data");
			exit;
		}elseif(empty($category)){
			$error="The User Name is Required";
			  header("Location: ../../homedashboard.php?error=$error&$data");
			exit;
		}elseif(empty($title)){
			$error= "The Title is Required";
			header("Location: ../../homedashboard.php?error=$error&$data");
			exit;
		}elseif(empty($price)){
			$error="The Price is Required";
			header("Location: ../../homedashboard.php?error=$error&$data");
			exit;
		}elseif(!empty($imageFile)){
			if(in_array($extention, $allow_img_ext)){
				$path="../../uploads/".$imageFile;
				move_uploaded_file($tmp_file,$path);
				$sql= "insert into products(user_id,category,title,image,price,description)values('$user_id','$category','$title','$imageFile','$price','$description')";
				mysqli_query($con,$sql);
				$success = "Add Product Successfull";
				header("Location: ../../homedashboard.php?success=$success");
				exit;
			}else{
				$error="upload only jpg, jpeg, and png file";
				header("Location: ../../homedashboard.php?error=$error&$data");
				exit;
			}
		}
		else{
			$sql= "insert into products(user_id,category,title,image,price,description)values('$user_id','$category','$title','$imageFile','$price','$description')";
				mysqli_query($con,$sql);
				$success = "Add Product Successfull";
				header("Location: ../../homedashboard.php?success=$success");
		}
	}
	#Delete Product from dashboard
	if(isset($_GET['d_id'])){
		$d_id = $_GET['d_id'];
		$delete = "DELETE FROM products WHERE product_id = '$d_id'";
		mysqli_query($con, $delete);
		header("Location: ../../homedashboard.php?action=delete");
	}
	#update Product
	if(isset($_GET['e_id'])){
		$e_id = $_GET['e_id'];
		$delete = "DELETE FROM products WHERE product_id = '$e_id'";
		mysqli_query($con, $delete);
		header("Location: ../../homedashboard.php?action=delete");
	}
	
?>