
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login chat system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/custom.js"></script>
</head>
<body class="d-flex justify-content-center align-item-center vh-100">
    <div class="w-400 p-5 shadow-rounded">
        <form method="post" action="app/http/auth.php">
            <div class="d-flex justify-content-center align-item-center flex-column">
                <img src="img/chat.png" class="w-25">
                <h3 class="display-4 fs-1 text-align-center">Login</h3>    
            </div>
             <?php if(isset($_GET['error'])){ ?>
                <div class="alert mb-3 alert-danger" role="alert">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php }?>
             <?php if(isset($_GET['success'])){ 
                ?>
                <div class="alert alert-success mb-3" role="alert">
                    <?php echo htmlspecialchars($_GET['success']); ?>
                </div>
            <?php } ?>
            <div class="mb-3 form-group user-name ">
                <?php 
                    if(isset($_GET['login_user'])){

                    }
                ?>
                <label>User Name</label>
                <input type="text" name="user_name" class="form-control">
            </div>

            <div class="mb-3 form-group user-password">
                <label>Password</label>
                <input type="password" name="password" class="form-control" id="User_pass">
                <i class="fas fa-eye-slash" id="togglePassword"></i>
            </div>

            <div class="mb-3 form-group">
                <button type="submit" name="login_user" class="btn btn-primary">Login</button>
                <a href="signup.php" class="">Sign up</a>
            </div>
        </form>
    </div>
</body>
</html>