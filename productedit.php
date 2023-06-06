<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap5.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/custom.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php 
  include("app/db.php");
  #service category
  $category = "SELECT * FROM service_category";
  $CatResult=mysqli_query($con,$category);
  session_start();
  #get user info from session
  if(isset($_SESSION['user_name'])){
		$UserName= $_SESSION['user_name'];
		$UserId=$_SESSION['user_id'];
		?>
		<h1><?php echo  $_SESSION['user_name']; ?> Dashboard</h1>
		<?php
	}
	else{
		header("Location: login.php");
		exit;
	}
	#edit product
	if(isset($_GET['e_id']) ){
		#Get single Product Info
		$e_id=$_GET['e_id'];
  	$Product = "SELECT * FROM products where product_id= '$e_id'";
		$ProductResult=mysqli_query($con,$Product);
		$row = mysqli_fetch_array($ProductResult);
		$user_id=$row['user_id'];
		$category=$row['category'];
		$title=$row['title'];
		$image=$row['image'];
		$price=$row['price'];
		$description=$row['description'];
	}
	#update product info
	if(isset($_POST['UpdateProduct'])){
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
			header("Location: productedit.php?error=$error&$data");
			exit;
		}elseif(empty($category)){
			$error="The User Name is Required";
			  header("Location: productedit.php?error=$error&$data");
			exit;
		}elseif(empty($title)){
			$error= "The Title is Required";
			header("Location: productedit.php?error=$error");
			exit;
		}elseif(empty($price)){
			$error="The Price is Required";
			header("Location: productedit.php?error=$error&$data");
			exit;
		}elseif(!empty($imageFile)){
			if(in_array($extention, $allow_img_ext)){
				$path="uploads/".$imageFile;
				move_uploaded_file($tmp_file,$path);
				$sql= "update products set user_id='$user_id',category='$category',title='$title',image='$imageFile',price='$price',description='$description' where product_id = '$e_id'";
				mysqli_query($con,$sql);
				$success = "Update Product Successfull";
				header("Location: homedashboard.php?action=edit&success='$success'");
				exit;
			}else{
				$error="upload only jpg, jpeg, and png file";
				header("Location: productedit.php?error=$error&$data");
				exit;
			}
		}
		else{
			$sql= "update products set user_id='$user_id',category='$category',title='$title',image='$imageFile',price='$price',description='$description' where product_id= '$e_id' ";
			mysqli_query($con,$sql);
			$success = "Update Product Successfull";
			header("Location: homedashboard.php?action=edit&success='$success'
					");
		}
	}
 ?>
<div class="w-300 p-5 shadow-rounded">
	<form method="post" id="product_form" enctype="multipart/form-data">
		<div class="d-flex justify-content-center align-item-center flex-column">
			<h3 class="display-4 fs-1 text-align-center">Edit Product</h3>    
		</div>
		<div class="mb-3 form-group user-name">
			<input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id;?>">
		</div>
		<div class="mb-3 form-group">
			<label>Product category</label>
			<select class="form-select" name="category"aria-label="Default select example">
				<option selected="true" disabled="disabled">Select the Product category</option>
				<?php 
				while($row = mysqli_fetch_array($CatResult)) { ?>
					<option <?php  if($category == $row['category_name']) { echo 'selected'; } ?> value="<?php echo $row['category_name']?>"><?php echo $row['category_name']?>
					</option>
				<?php } ?>
			</select>
		</div>

		<div class="mb-3 form-group user-name">
			<label>Title</label>
			<input type="text" class="form-control" name="title" value="<?php echo $title;?>">
		</div>

		<div class="mb-3 form-group user-name">
			<label>Image</label>
			<img src="<?php echo 'uploads/'.$image?>" height="50">
			<input type="file" class="form-control" name="image" value="<?php echo $image;?>">
		</div>

		<div class="mb-3 form-group user-password">
			<label>Price</label>
			<input type="text" class="form-control" id="price" value="<?php echo $price;?>" name="price">
		</div>

		<div class="mb-3 form-group user-name">
			<label>Short Description</label>
			<input type="text" class="form-control" name="description" value="<?php echo $description;?>">
		</div>

		<div class="mb-3 form-group">
			<button type="submit" name="UpdateProduct" class="btn btn-primary">Update</button>
			<button type="btn" name="UpdateProduct" class="btn btn-primary"><a href="homedashboard.php" style="color: white;">Cencel</a></button>
		<!-- <a href="index.php" class="">Login</a> -->
		</div>
	</form>
</div>
