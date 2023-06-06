<?php 
include("../db.php");
session_start();
#category filter
if(isset($_POST['category'])){
	$category_name= $_POST['category'];
	$Product = "SELECT users.user_role,users.user_name,products.product_id,products.user_id,products.category,products.title,products.image,products.price,products.description FROM products INNER JOIN users ON products.user_id = users.user_id where products.category='$category_name'";
		$ProductResult=mysqli_query($con,$Product);
		$counter = 0;
		$max = 4;
		while ($product=mysqli_fetch_array($ProductResult) and ($counter < $max)) {?>
			<div class="col-md-4">
				<figure class="card card-product-grid">
					<div class="img-wrap"> 
						<span class="badge badge-danger"> NEW </span>
							<a href="single.php?pid=<?php echo $product['product_id'] ?>" class="image"><img src="<?php echo 'uploads/'.$product['image'];?>" class="img-fluid">
							</a>
					</div> <!-- img-wrap.// -->
					<figcaption class="info-wrap">
						<div class="fix-height">
							<h4><a href="single.php?pid=<?php echo $product['product_id']; ?>" class="title"><?php echo $product['title'] ?></a>
							</h4>
							<div class="price-wrap mt-2">
								<span class="price"><?php echo '$'.$product['price'] ?></span>
								<!-- <del class="price-old">$1980</del> -->
							</div> <!-- price-wrap.// -->
							<div class="price-wrap mt-2">
								<span class="user"><?php echo  $product['user_name']; ?></span>
							</div> <!-- user-role.// -->
						</div>
						<?php 
						if(isset($_SESSION["user_id"])){?>
							<button type="button" id="contactmodal" class="btn btn-primary" data-toggle="modal" ><a href="single.php?pid=<?php echo $product['product_id'] ?>" class="image" style="color: white;">Contact Us</a></button>
						<?php } 
						else{ ?>
							<div class="" id="exampleModalCenter<?php echo $product['product_id'];?>" style="display: none;" >
							  <div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
							        <button type="button" class="close" data-id="<?php echo $product['product_id'];?>">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        ...tester
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-id="<?php echo $product['product_id'];?>">Close</button>
							        <button type="button" class="btn btn-primary">Save changes</button>
							      </div>
							    </div>
							  </div>
							</div>
							<button type="button" id="contactmodal" class="btn btn-primary" data-toggle="modal" data-id="<?php echo $product['product_id'] ?>"> Contact Us</button>
						<?php } ?>
					</figcaption>
				</figure>
		</div> <!-- col.// -->
	<?php 
	$counter++ ;
	}
	die;
}
#show products with limit
if(isset($_POST['maxval']) && isset($_POST['minval'])){
	 $minval= $_POST['minval'];
	 $maxval= $_POST['maxval'];
	$Product = "SELECT users.user_role,users.user_name,products.product_id,products.user_id,products.category,products.title,products.image,products.price,products.description FROM products INNER JOIN users ON products.user_id = users.user_id where products.price between $minval and $maxval";
		$ProductResult=mysqli_query($con,$Product);
		$counter = 0;
		$max = 4;
		while ($product=mysqli_fetch_array($ProductResult) and ($counter < $max)) {?>
			<div class="col-md-4">
				<figure class="card card-product-grid">
					<div class="img-wrap"> 
						<span class="badge badge-danger"> NEW </span>
							<a href="single.php?pid=<?php echo $product['product_id'] ?>" class="image"><img src="<?php echo 'uploads/'.$product['image'];?>" class="img-fluid">
							</a>
					</div> <!-- img-wrap.// -->
					<figcaption class="info-wrap">
						<div class="fix-height">
							<h4><a href="single.php?pid=<?php echo $product['product_id']; ?>" class="title"><?php echo $product['title'] ?></a>
							</h4>
							<div class="price-wrap mt-2">
								<span class="price"><?php echo '$'.$product['price'] ?></span>
								<!-- <del class="price-old">$1980</del> -->
							</div> <!-- price-wrap.// -->
							<div class="price-wrap mt-2">
								<span class="user"><?php echo  $product['user_name']; ?></span>
							</div> <!-- user-role.// -->
						</div>
						<?php 
						if(isset($_SESSION["user_id"])){?>
							<button type="button" id="contactmodal" class="btn btn-primary" data-toggle="modal" ><a href="single.php?pid=<?php echo $product['product_id'] ?>" class="image" style="color: white;">Contact Us</a></button>
						<?php } 
						else{ ?>
							<div class="" id="exampleModalCenter<?php echo $product['product_id'];?>" style="display: none;" >
							  <div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
							        <button type="button" class="close" data-id="<?php echo $product['product_id'];?>">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        ...tester
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-id="<?php echo $product['product_id'];?>">Close</button>
							        <button type="button" class="btn btn-primary">Save changes</button>
							      </div>
							    </div>
							  </div>
							</div>
							<button type="button" id="contactmodal" class="btn btn-primary" data-toggle="modal" data-id="<?php echo $product['product_id'] ?>"> Contact Us</button>
						<?php } ?>
					</figcaption>
				</figure>
		</div> <!-- col.// -->
	<?php 
	$counter++ ;
	}
	die;
}
#contactus button popup
if(isset($_POST['userchat'])){
	$pid = $_POST['pid'];
	$sender_id=$_POST['sender_id'];
	$reciever_id= $_POST['reciever_id'];
	$userchat= $_POST['userchat'];
	
	if(function_exists('date_default_timezone_set')) {
    	date_default_timezone_set("Asia/Kolkata");
	}
	$time= date("Y-m-d h:i:sa");
	$insertsms="insert into chat_conversion(pid,sender_id,reciver_id,message,time) value('$pid','$sender_id','$reciever_id','$userchat','$time')";
		mysqli_query($con,$insertsms);
		echo $userchat;
		if(isset($_POST['r_user_id'])){
		$r_user_id= $_POST['r_user_id'];
		$r_user_name = $_POST['r_user_name'];
		$s_user_id = $_POST['s_user_id'];
		$s_user_name = $_POST['s_user_name'];
		$product_id = $_POST['product_id'];
		$reciverChat="Select * from chat_conversion where (sender_id='$s_user_id' and reciver_id='$r_user_id' and pid='$product_id') OR (sender_id='$r_user_id' and reciver_id='$s_user_id' and pid='$product_id')";
		    $reciverquery=mysqli_query($con,$reciverChat);
			   	while($data=mysqli_fetch_array($reciverquery)){
					$align='';
					if($s_user_id == $data['sender_id']){
						$align='right';
					}
					else{
						$align='left';
					}
					?>
					<div class="message"style="text-align: <?php echo $align;?>;"><?php echo $data['message'];?>
				 	</div>
				<?php }
			}
	die;
}

#chat insert on chat button
if(isset($_POST['sender'])){
	$sender=$_POST['sender'];
	$reciver=$_POST['reciver'];
	$product_id=$_POST['product_id'];
	$textaresms=$_POST['textaresms'];

		if(function_exists('date_default_timezone_set')) {
    	date_default_timezone_set("Asia/Kolkata");
	}
	$time= date("Y-m-d h:i:sa");
	if(!empty($textaresms)){
	$insertsms="insert into chat_conversion(pid,sender_id,reciver_id,message,time) value('$product_id','$sender','$reciver','$textaresms','$time')";
		mysqli_query($con,$insertsms);
		?>
        <div class="d-flex flex-row justify-content-end mb-4">
            <!--    <img src="#"
                 alt="avatar 1" style="width: 45px; height: 100%;"> -->
            <div class=" sender-data p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                <p class=" chatmessage small mb-0"><?php echo $textaresms;?></p>
            </div>
        </div>
          
	<?php }
 }

#select chat data from databas
// function chatdata(){
// 	if (isset($_SESSION['username'])) {
// 		if(isset($_POST['r_id'])){
// 	        $currentUser=$_GET['s_id'];
// 	        $r_id=$_GET['r_id'];
// 	        $currentUserName=$_SESSION['user_name'];
// 	        $reciverChat="Select * from chat_conversion where (sender_id='$currentUser' and reciver_id='$r_id') OR (sender_id='$r_id' and reciver_id='$currentUser')";
// 	        $reciverquery=mysqli_query($con,$reciverChat);
// 	        while($row=mysqli_fetch_array($reciverquery)){
// 	        	echo $row['message'];
// 	        }
// 		}
// 	}
// }
// chatdata();

#add to cart item
 if(isset($_POST['product_id']) && !empty($_POST['product_id'])){
 	// print_r($_SESSION);
 	$product_id=$_POST['product_id'];
 	$data="Select * from products where product_id='$product_id'";
 	$product_info=mysqli_query($con,$data);
 	$allData=mysqli_fetch_array($product_info);
 	$cart=array(
			'product_id'=> $_POST['product_id'],
		 	'quantity'=> $_POST['quantity'],
			'title'=> $allData['title'],
			'image'=> $allData['image'],
			'price'=> $allData['price']
		);
	$_SESSION['cart'][$_POST['product_id']]=$cart;
 }
#remove item from cart
 if(isset($_POST['remove_id']) && !empty($_POST['remove_id'])){
		// $_SESSION['remove_id']=$_POST['remove_id'];
		$cartArr = $_SESSION['cart'];
		unset($cartArr[$_POST['remove_id']]);
		$_SESSION['cart'] = $cartArr;
		echo'1'; 
 }	
 #delete all items
if(isset($_POST['unset']) && !empty($_POST['unset'])){
	unset($_SESSION['cart']);
}
#loadsms with ajax
if(isset($_POST['loadsms'])){
	        $currentUser=$_POST['sid'];
	        $r_id=$_POST['rid'];
	        $currentUserName=$_SESSION['user_name'];
	        $reciverChat="Select message,sender_id,reciver_id, DATE_FORMAT(time, '%H:%i') as time from chat_conversion where (sender_id='$currentUser' and reciver_id='$r_id') OR (sender_id='$r_id' and reciver_id='$currentUser')";
	        $reciverquery=mysqli_query($con,$reciverChat);
	        while($row=mysqli_fetch_array($reciverquery)){
	        	$align='';
					if($currentUser == $row['sender_id']){
						$align='end';
					}
					else{
						$align='start';
					}
					?>

					<div class="d-flex flex-row justify-content-<?php echo $align?> mb-4">
					<!--    <img src="#"
					alt="avatar 1" style="width: 45px; height: 100%;"> -->
					<div class=" sender-data p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
					<p class=" chatmessage small mb-0"><?php echo $row['message'];?></p>
					</div>
					<p><?php echo $row['time'];?></p>
					</div>
				<?php }
	        }
		
		
 
 
?>

