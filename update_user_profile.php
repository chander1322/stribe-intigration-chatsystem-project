<?php 
include("app/db.php");
session_start();
#select users data from database
if(isset($_GET['action'])=="edit_user"){
	$u_id= $_GET['u_id'];
	$query = "SELECT * FROM users WHERE user_id='$u_id'";
    $user=mysqli_query($con,$query);
    $userdata=mysqli_fetch_array($user);
}
#update users data
if(isset($_POST['update_user'])){
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
		$sql= "update users set name='$name',user_name='$user_name',email='$email',password='$pass',profile_img='$file',user_role='$user_role' where user_id= '$u_id' ";
		mysqli_query($con,$sql);
		$success = "User update Successfull";
		header("Location: homedashboard.php?user_action=edit_user&success='$success'
					");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login chat system</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap5.css">

    <script src="js/jquery.js"></script>
    <script src="js/custom.js"></script>
</head>
<body class="d-flex justify-content-center align-item-center vh-100">
    <div class="w-300 p-5 shadow-rounded">
        <form method="post" enctype="multipart/form-data">
            <div class="d-flex justify-content-center align-item-center flex-column">
                <img src="img/chat.png" class="w-25">
                <h3 class="display-4 fs-1 text-align-center">Update User info</h3>    
            </div>
            <div class="mb-3 form-group user-name">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $userdata['name'];?>">
            </div>

            <div class="mb-3 form-group user-name">
                <label>User Name</label>
                <input type="text" class="form-control" name="user_name" value="<?php echo $userdata['user_name'];?>" readonly>
            </div>

            <div class="mb-3 form-group user-name">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $userdata['email']?>">
            </div>
 
            <div class="mb-3 form-group user-password">
                <label>Password</label>
                <input type="password" class="form-control" id="User_pass" name="password" value="<?php echo $userdata['password'];?>">
                <i class="fas fa-eye-slash" id="togglePassword"></i>
            </div>
            <div class="mb-3 form-group">
                <label>Profile Picture</label>
                <input type="file" class="form-control" name="profile_img">
            </div>

            <div class="mb-3 form-group">
                <label>User Role</label>
                <select class="form-select" name="user_role"aria-label="Default select example">
                  <option selected="true" disabled="disabled">Select the User Role</option>
                  <?php if($userdata['user_role']=='Buyer'){?>
                  	<option value="Buyer" selected>Buyer</option>
                  	<option value="Seller">Seller</option>
                  <?php } else{?>
                  	<option value="Seller" selected>Seller</option>
                  	<option value="Buyer">Buyer</option>

          			<?php } ?>
                </select>
            </div>


            <div class="mb-3 form-group">
                <button type="submit" name="update_user" class="btn btn-primary">Update User Profile</button>
                <a href="login.php" class="">Login</a>
            </div>
        </form>
    </div>
</body>
</html>