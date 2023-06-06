<!DOCTYPE html>
<html>
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

	   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
    <link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css"
        rel="stylesheet" type="text/css" />
   
</head>
<body>
<?php 
	include('app/db.php');
	$con = mysqli_connect($host,$user_name, $password, $dbname);
  #service category
  $category = "SELECT * FROM service_category";
  $CatResult=mysqli_query($con,$category);
	session_start();
	$currentUser=$_SESSION['user_id'];
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
	if(isset($_GET['role'])=='becomeabuyer'){
		?>
		<script type="text/javascript">
				jQuery(document).ready(function(){
          jQuery('.nav-tabs .nav-item:nth-child(2) a').trigger('click');
				});
		</script>
		<?php
	}
	if(isset($_GET['role'])=='becomeaseller'){
		?>
		<script type="text/javascript">
				jQuery(document).ready(function(){
          jQuery('.nav-tabs .nav-item:nth-child(1) a').trigger('click');
				});
		</script>
		<?php
	}

	#user profile info
	$query = "SELECT user_id,name,user_name,email,profile_img,user_role FROM users WHERE user_name='$UserName'";
  $result=mysqli_query($con,$query);
  $UserData = mysqli_fetch_array($result);
  $user_id=$UserData['user_id'];

  #message chat
	$message = "SELECT chat_conversion.chatid,chat_conversion.sender_id,chat_conversion.message,chat_conversion.reciver_id,chat_conversion.time,chat_conversion.pid,users.user_name,users.user_role,products.title,products.price from chat_conversion
	INNER JOIN users on chat_conversion.sender_id= users.user_id
	INNER JOIN products on chat_conversion.pid= products.product_id  ";
  $messageres=mysqli_query($con,$message);
  $messagedata = mysqli_fetch_array($messageres);
  // echo $pid=$messagedata['pid'];

#fetch chat
	$chats="Select * from chat_conversion";
	$chatquery=mysqli_query($con,$chats);
			
  #Products
  $Product = "SELECT * FROM products where user_id= '$UserId'";
	$ProductResult=mysqli_query($con,$Product);
	#redirect my product after delete
	if(isset($_GET['action']) =="delete"){
	 ?>
		<script type="text/javascript">
				jQuery(document).ready(function(){
          jQuery('.nav-tabs .nav-item:nth-child(4) a').trigger('click');
				});
		</script>
	<?php } 
	#user edit redirection
	if(isset($_GET['user_action']) =="edit_user"){
		$success=$_GET['success'];?>
	  <script type="text/javascript">
				jQuery(document).ready(function(){
          jQuery('.nav-tabs .nav-item:nth-child(2) a').trigger('click');
				});
		</script><?php }
	#product edit redirection
	if(isset($_GET['action']) =="edit"){
		// $success=$_GET['success'];
	 ?>
		<script type="text/javascript">
				jQuery(document).ready(function(){
          jQuery('.nav-tabs .nav-item:nth-child(4) a').trigger('click');
          alert("Row Deleted successful");
				});
		</script>
	<?php ?>
			<div class="alert mb-3 alert-success" role="alert">
			  		<?php //echo htmlspecialchars($_GET['success']); ?>
			</div><?php
	}  
$User_Role=$UserData['user_role'];
if($User_Role=="Seller"){

	?>

<div class="container-fluid mt-3">
  <!-- Nav tabs -->
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#Dashboard">Dashboard</a>
    </li>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#Profile">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#payments">Payments</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#myproduct">My Services</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://localhost/chatsystem">All User Services</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#message">Messages</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#contact">Contract</a>
    </li>
    <form method="post" action="becomeaseller.php">
		<button type="submit" name="becomeaseller"class="btn-success"id="change_u_r_s_t_b">Become a buyer</button>
	</form>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div id="Dashboard" class="container tab-pane active"><br>
      <h3><?php echo $UserData['user_role'].' ';?>Dashboard</h3>
      <!-- <h4><button>click to make buyer</button></h4> -->
     	<?php if(isset($_GET['success'])){ ?>
        <div class="alert mb-3 alert-success" role="alert">
	  			<?php echo htmlspecialchars($_GET['success']); ?>
				</div>
				<?php } 
			?>
      <?php if(isset($_GET['error'])){ ?>
        <div class="alert mb-3 alert-danger" role="alert">
			  		<?php echo htmlspecialchars($_GET['error']); ?>
				</div>
			<?php } 
				if(isset($_GET['category'])){
					$category= $_GET['category'];
				}else{
					$category='';
				}
				if(isset($_GET['title'])){
					$title= $_GET['title'];
				}else{
					$title='';
				}
				if(isset($_GET['price'])){
					$price= $_GET['price'];
				}else{
					$price='';
				}
			?>
      <div class="w-300 p-5 shadow-rounded">
        <form method="post" id="product_form" action="app/http/signup.php" enctype="multipart/form-data">
            <div class="d-flex justify-content-center align-item-center flex-column">
                <h3 class="display-4 fs-1 text-align-center">Add Product</h3>    
            </div>

			      <div class="mb-3 form-group user-name">
			          <input type="hidden" class="form-control" name="user_id" value="<?php echo $UserId;?>">
			      </div>

						<div class="mb-3 form-group">
							<label>Product category</label>
				     	<select class="form-select" name="category"aria-label="Default select example">
			          <option selected="true" disabled="disabled">Select the Product category</option>
								<?php 
									while($row = mysqli_fetch_array($CatResult)) { ?>
			          		<option value="<?php echo $row['category_name']?>"><?php echo $row['category_name']?></option>
									<?php 
									}
								?>
			        </select>
			      </div>

            <div class="mb-3 form-group user-name">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $title;?>">
            </div>

            <div class="mb-3 form-group user-name">
                <label>Image</label>
                <input type="file" class="form-control" name="image" value="">
            </div>

             <div class="mb-3 form-group user-password">
                <label>Price</label>
                <input type="text" class="form-control" id="price" value="<?php echo $price;?>" name="price">
            </div>

            <div class="mb-3 form-group user-name">
                <label>Short Description</label>
                <input type="text" class="form-control" name="description" value="">
            </div>

            <div class="mb-3 form-group">
                <button type="submit" name="AddNewProduct" class="btn btn-primary">Add</button>
                <!-- <a href="index.php" class="">Login</a> -->
            </div>
        </form>
    </div>
    </div>
    <div id="Profile" class="container tab-pane fade"><br>
      <h3>Profile</h3>
      <table id="example" class="display" style="width:100%">
	    <thead>
	        <tr>
            <th>Name</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Profile Image </th>
            <th>Role</th>
            <th>Action</th>
	        </tr>
	    </thead>
    	<tbody>
    		<tr>
    		<td><?php echo $UserData['name'];?></td>
    		<td><?php echo $UserData['user_name'];?></td>
    		<td><?php echo $UserData['email'];?></td>
    		<td><img src="<?php echo 'uploads/'.$UserData['profile_img'] ?> " height="100"></td>
    		<td><?php echo $UserData['user_role'];?></td>
    		<td><button type="btn"><a href="update_user_profile.php?u_id=<?php echo $UserData['user_id']?>&action=edit">Edit Profile</a></button></td>
    		</tr>
    	</tbody>
	</table>
    </div>
    <div id="payments" class="container tab-pane fade"><br>
      <h3>Payments</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
     <div id="myproduct" class="container tab-pane fade"><br>
      <h3>Products</h3>
       <table id="example" class="display" style="width:100%">
	    <thead>
	        <tr>
	            <th>Sr.N</th>
	            <th>Category</th>
	            <th>Title</th>
	            <th>Image</th>
	            <th>Price </th>
	            <th>Description</th>
	            
	        </tr>
	    </thead>
    	<tbody>
    		<?php 
    			$counter = 1;
					while ($product=mysqli_fetch_array($ProductResult)) {
    		?>
    		<tr>
    		<td><?php echo$counter;?></td>
    		<td><?php echo $product['category'];?></td>
    		<td><?php echo $product['title'];?></td>
    		<td><img src="<?php echo 'uploads/'.$product['image'] ?> " height="100"></td>
    		<td><?php echo '$'.$product['price'];?></td>
    		<td><?php echo $product['description'];?></td>
    		<td>
    			<button type="btn"><a href="productedit.php?e_id=<?php echo $product['product_id']?>&action=edit">edit</a></button>
    			<button id="deleteproduct" neme="delete" data-id="<?php echo $product['product_id']?>"><a href="app/http/signup.php?d_id=<?php echo $product['product_id']?>&action=delete">Delete</a></button>
    		</td>
    		</tr>
    	<?php 
    		$counter++;
    	} ?>
    	</tbody>
	</table>
    </div>
    <div id="message" class="container tab-pane fade"><br>
      <h3>Messages</h3>
		
		<?php
				while($reveivechat=mysqli_fetch_array($messageres)){
				    $currentUser=$_SESSION['user_id'];
				    $user_id=$reveivechat['sender_id'];
				    $reciver_id=$reveivechat['reciver_id'];
				    $align='';
				    if($currentUser==$user_id){
				        $align='right';
				    }
				    else{
				        $align='left';
				    }
				    ?>	

			<?php } ?>
				
    <table id="example" class="display" style="width:100%">
	    <thead>
	        <tr>
            <th>User Name</th>
            <th>Reply</th>
	        </tr>
	    </thead>
    	<tbody>
    		<?php
    			 $message="SELECT * from users where user_id != $currentUser";
					$messagequery= mysqli_query($con,$message);
					while($messagedata=mysqli_fetch_array($messagequery)){
						$currentUser=$_SESSION['user_id'];
				    $user_id=$messagedata['user_id'];

    		?>
    		<tr>
	    		<td><?php echo $messagedata['user_name'];?></td>
	    		<td><button type="button" class="btn btn-primary" id="btnmodal" userid="<?php echo $messagedata['user_id']?>">Reply</button></td>
    		</tr>
    	<?php }?>
    	<div id="dialog" style="display: none" align="center">
				<div class="model-body">
		<?php	
		$currentUser=$_SESSION['user_id'];
    $reciverChat="Select * from chat_conversion where (sender_id='$currentUser' and reciver_id='$user_id') OR (sender_id='$user_id' and reciver_id='$currentUser')";
    $reciverquery=mysqli_query($con,$reciverChat);
		while($reveivechat=mysqli_fetch_array($reciverquery)){
		    $currentUser=$_SESSION['user_id'];
		    $user_id=$reveivechat['sender_id'];
		    $align='';
		    if($currentUser==$user_id){
		        $align='right';
		    }
		    else{
		        $align='left';
		    }
		    ?>
      <div class="message"style="text-align: <?php echo $align;?>;"><?php echo $reveivechat['message'];?></div>
		<?php } ?>
			     
	      </div>
			<div class="modal-footer" style="margin-top:260px">
					<input type="text" class="form-control chatinput" name="message">
					<button class="btn btn-danger text-uppercase mr-2 px-4" id="reply" reciver-id=""  sender_id="<?php echo $currentUser; ?>" pid="5">Send</button> 
			</div> 
		</div>
    	</tbody>
	</table>
    </div>
    <div id="contact" class="container tab-pane fade"><br>
      <h3>Contract</h3>
      <p>Send ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>
<?php } else{
	echo"<h1>you are Buyer</h1";?>
	<div class="container-fluid mt-3">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
  	<a class="nav-link active" data-toggle="tab" href="#Profile">Profile</a>

    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#payments">Payments</a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link" href="http://localhost/chatsystem">All User Services</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#message">Messages</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#contact">Contact</a>
    </li>
		<form method="post" action="becomeaseller.php">
		<button type="submit" name="becomeabuyer"class="btn-success">Become a seller</button>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div id="Profile" class="container tab-pane fade"><br>
      <h3>Profile</h3>
      <table id="example" class="display" style="width:100%">
	    <thead>
	        <tr>
            <th>Name</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Profile Image </th>
            <th>Role</th>
            <th>Action</th>
	        </tr>
	    </thead>
    	<tbody>
    		<tr>
    		<td><?php echo $UserData['name'];?></td>
    		<td><?php echo $UserData['user_name'];?></td>
    		<td><?php echo $UserData['email'];?></td>
    		<td><img src="<?php echo 'uploads/'.$UserData['profile_img'] ?> " height="100"></td>
    		<td><?php echo $UserData['user_role'];?></td>
    		<td><button type="btn"><a href="update_user_profile.php?u_id=<?php echo $UserData['user_id']?>&action=edit">Edit Profile</a></button></td>
    		</tr>
    	</tbody>
	</table>
    </div>
    <div id="payments" class="container tab-pane fade"><br>
      <h3>Payments</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
     
    <div id="message" class="container tab-pane fade"><br>
      <h3>Messages</h3>
      <table id="example" class="display" style="width:100%">
	    <thead>
	        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>User Name</th>
            <th>User Type</th>
            <th>Message</th>
            <th>Time</th>
            <th>Reply</th>
	        </tr>
	    </thead>
    	<tbody>
    		<?php
    		
    			while($messagedata= mysqli_fetch_array($messageres)){
    		?>
  		<div id="dialog<?php echo $messagedata['chatid'];?>" style="display: none" align="center">
				<div class="model-body">
					<div class="message"style="text-align: left;"><?php echo $messagedata['message'];?></div>
				</div>
			<div class="modal-footer" style="margin-top:260px">
				<input type="text" class="form-control chatinput"name="message">
				<button class="btn btn-danger text-uppercase mr-2 px-4" id="reply">Send</button> 
			</div> 
		</div>
    		<tr>
	    		<td><?php echo $messagedata['title'];?></td>
	    		<td><?php echo '$'.$messagedata['price'];?></td>
	    		<td><?php echo $messagedata['user_name'];?></td>
	    		<td><?php echo $messagedata['user_role'];?></td>
	    		<td><?php echo $messagedata['message'];?></td>
	    		<td><?php echo $messagedata['time'];?></td>
	    		<td><button type="button" class="btn btn-primary" id="btnmodal" data-id="<?php echo $messagedata['chatid'];?>">Reply</button></td>
    		</tr>
    	<?php }?>
    	</tbody>
	</table>
    </div>
    <div id="contact" class="container tab-pane fade"><br>
      <h3>Contact</h3>
      <p>Send ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>
<?php } ?>
</body>
<a href="loggedout.php">log out</a>
<footer>
	
</footer>
</html>