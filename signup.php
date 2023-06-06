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
        <form method="post" action="app/http/signup.php" enctype="multipart/form-data">
            <div class="d-flex justify-content-center align-item-center flex-column">
                <img src="img/chat.png" class="w-25">
                <h3 class="display-4 fs-1 text-align-center">Sign Up</h3>    
            </div>
            <?php if(isset($_GET['error'])){ ?>
	            <div class="alert mb-3 alert-danger" role="alert">
			  		<?php echo htmlspecialchars($_GET['error']); ?>
				</div>
			<?php } 
				if(isset($_GET['name'])){
					$name= $_GET['name'];
				}else{
					$name='';
				}
				if(isset($_GET['user_name'])){
					$user_name= $_GET['user_name'];
				}else{
					$user_name='';
				}
				if(isset($_GET['email'])){
					$email= $_GET['email'];
				}else{
					$email='';
				}
			?>
            <div class="mb-3 form-group user-name">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
            </div>

            <div class="mb-3 form-group user-name">
                <label>User Name</label>
                <input type="text" class="form-control" name="user_name" value="<?php echo $user_name;?>">
            </div>

            <div class="mb-3 form-group user-name">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
            </div>
 
            <div class="mb-3 form-group user-password">
                <label>Password</label>
                <input type="password" class="form-control" id="User_pass" name="password">
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
                  <option value="Buyer">Buyer</option>
                  <option value="Seller">Seller</option>
                </select>
            </div>


            <div class="mb-3 form-group">
                <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                <a href="login.php" class="">Login</a>
            </div>
        </form>
    </div>
</body>
</html>