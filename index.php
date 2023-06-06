<?php 
	include("app/db.php");
	session_start();
	#category
	$category = "SELECT * FROM service_category";
	$CatResult=mysqli_query($con,$category);

	#Products
	$Product = "SELECT users.user_id,users.user_role,users.user_name,products.product_id,products.user_id,products.category,products.title,products.image,products.price,products.description FROM products INNER JOIN users ON products.user_id = users.user_id";
	$ProductResult=mysqli_query($con,$Product);
	$counter = 0;
	$result_per_page = 50;
	$number_of_result = mysqli_num_rows($ProductResult); 
	$number_of_page = ceil ($number_of_result / $result_per_page); 

	#Get visitor from database
	$query="SELECT * FROM visitor";
	$visitorResult=mysqli_query($con,$query);
	$number_of_visitor = mysqli_fetch_array($visitorResult); 


?>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!------ Include the above in your HEAD tag ---------->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap5.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="js/jquery.min.js"></script>
	<script src="js/custom.js"></script>
</head>
<div class="container">
	<div class="row">
		<aside class="col-md-3">
			<div class="card">
				<article class="filter-group">
					<header class="card-header">
						<a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
						<i class="icon-control fa fa-chevron-down"></i>
						<h6 class="title">Product Filters</h6>
						</a>
					</header>
					<div class="filter-content collapse show" id="collapse_1">
						<div class="card-body">
							<form class="pb-3">
								<div class="input-group">
							  		<input type="text" class="form-control" placeholder="Search">
							  		<div class="input-group-append">
								    	<button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
								  	</div>
								</div>
							</form>
							<select id="category_filter" class="display" style="width:100%">
					 			<option selected="true" disabled="disabled">Select the Product Category</option>
					    		<?php 
					    		while($row = mysqli_fetch_array($CatResult)) { ?>
					    			<option id="category_filter" value="<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></option>
						    		<?php } ?>
							</select>
						</div> <!-- card-body.// -->
					</div>
				</article> <!-- category-group  .// -->
				<article class="filter-group">
					<header class="card-header">
							<i class="icon-control fa fa-chevron-down"></i>
							<h6 class="title">Price filter </h6>
					</header>
					<div class="filter-content " id="collapse_5" s>
						<div class="card-body">
							<label>min price</label>
						  		<input type="number" class="min-value">
							<label >max price</label>
							<input type="number" class="max-value">
						</div><!-- card-body.// -->
						<button type="button" id="price_filter" class="btn btn-primary" data-toggle="modal" >Apply
						</button>
					</div>
				</article> <!-- price fialter-group .// -->
				<article class="filter-group">
					<header class="card-header">
							<i class="icon-control fa fa-chevron-down"></i>
							<h6 class="title">Feedback</h6>
					</header>
					<div class="filter-content " id="collapse_5">
						<div class="card-body">
							<label>Star Rating</label>
						  		<i class="fa fa-star" aria-hidden="true"></i>
						  		<i class="fa fa-star" aria-hidden="true"></i>
						  		<i class="fa fa-star" aria-hidden="true"></i>
						  		<i class="fa fa-star" aria-hidden="true"></i>
						  		<i class="fa fa-star" aria-hidden="true"></i>

						</div><!-- card-body.// -->
						
					</div>
				</article> <!-- price fialter-group .// -->
				<article class="filter-group">
					<header class="card-header">
						<a href="#" data-toggle="collapse" data-target="#collapse_5" aria-expanded="false" class="">
							<i class="icon-control fa fa-chevron-down"></i>
							<h6 class="title">More filter </h6>
						</a>
					</header>
					<div class="filter-content collapse in" id="collapse_5" >
						<div class="card-body">
							<label class="custom-control custom-radio">
						  		<input type="radio" name="myfilter_radio" checked="" class="custom-control-input">
							</label>

							<label class="custom-control custom-radio">
							  	<input type="radio" name="myfilter_radio" class="custom-control-input">
							</label>

							<label class="custom-control custom-radio">
							  	<input type="radio" name="myfilter_radio" class="custom-control-input">
								  <div class="custom-control-label">Used items</div>
							</label>

							<label class="custom-control custom-radio">
						  		<input type="radio" name="myfilter_radio" class="custom-control-input">
							</label>
						</div><!-- card-body.// -->
					</div>
				</article> <!-- fialter-group .// -->
			</div> <!-- card.// -->
		</aside>
		<main class="col-md-9">
			<header class="border-bottom mb-4 pb-3">
				<h3>Listing Product </h3>
				<h2>Number OF Visitor <?php echo $number_of_visitor['count']?></h2>
				<div class="form-inline">
					<span class="mr-md-auto">
						<?php echo $number_of_result.' Items';?>
					</span>
					<?php if(isset($_SESSION["user_id"]) && !empty($_SESSION['user_id'])){?>
						<div class="btn-group">
							<a href="cart.php" class=" cartpage btn btn-outline-secondary"> 
								Cart
							</a>
							<a href="homedashboard.php" class="btn btn-outline-secondary"> 
								Enter To Dashboard
							</a>
							<a href="loggedout.php" class="btn btn-outline-secondary"> 
								Logout
							</a>
						</div>
					<?php }else{ ?>
						<div class="btn-group">
							<a href="login.php" class="btn btn-outline-secondary"> 
								Login
							</a>
							<a href="signup.php" class="btn btn-outline-secondary"> 
								Register
							</a>
						</div>
					<?php } ?>
				</div>
			</header><!-- sect-heading -->
			<div class="row allProducts">
				<?php while ($product=mysqli_fetch_array($ProductResult) and ($counter < $result_per_page)) {?>
					<div class="col-md-4">
						<figure class="card card-product-grid">
							<div class="img-wrap"> 
								<span class="badge badge-danger"> NEW 
								</span>
								<a href="single.php?pid=<?php echo $product['product_id'] ?>" class="image"><img src="<?php echo 'uploads/'.$product['image'];?>" class="img-fluid">
								</a>
							</div> <!-- img-wrap.// -->
							<figcaption class="info-wrap">
							<div class="fix-height">
								<a href="single.php?pid=<?php echo $product['product_id']; ?>" class="title">
									<h4><?php echo $product['title'] ?></h4>
								</a>
								<div class="price-wrap mt-2">
									<span class="price"><?php echo '$'.$product['price'] ?>
									</span>
								</div> <!-- price-wrap.// -->
								<div class="price-wrap mt-2">
									<span class="user"><?php echo  $product['user_name']; ?></span>
									<span class="user"><?php echo  $product['user_id']; ?></span>
								</div> <!-- user-role.// -->
								<div class="price-wrap mt-2">
									<label>Product Quantity</label>
									<input type="number" class="product_quantity" value="1">
								</div> <!-- user Quantity// -->
							</div>
							<?php if(isset($_SESSION["user_id"])){?>
								<button type="button" id="contactmodal" class="btn btn-primary" data-toggle="modal" >
									<a href="single.php?pid=<?php echo $product['product_id'];?>" class="image" style="color: white;">Contact Us
									</a>
								</button>
								<button type="button" id="addtocart" class="btn btn-primary" data-toggle="modal" data-id="<?php echo $product['product_id'] ?>">Add to Cart</button>
							<?php } else{ ?>
								<div class="" id="exampleModalCenter<?php echo $product['product_id'];?>" style="display: none;" >
								  	<div class="modal-dialog modal-dialog-centered" role="document">
									    <div class="modal-content">
									      	<div class="modal-header">
									        	<button type="button" class="close" data-id="<?php echo $product['product_id'];?>">
										          	<span aria-hidden="true">&times;
										          	</span>
										        </button>
									      	</div>
									      	<div class="modal-body">
								        		<h3>Please Signup For Contact</h3> 
									      	</div>
									      	<div class="modal-footer">
										        <button type="button" class="btn btn-secondary"><a href="login.php" style="color: white;">Login</a></button>
										        <button type="button" class="btn btn-primary"><a href="signup.php" style="color: white;">Signup</a></button>
									      	</div>
									    </div>
								  	</div>
								</div>
									<button type="button" id="contactmodal" class="btn btn-primary" data-toggle="modal" data-id="<?php echo $product['product_id'] ?>"> Contact Us</button>
									<button type="button" id="addtocart" class="btn btn-primary" data-toggle="modal" data-id="<?php echo $product['product_id'] ?>">Add to Cart</button>

									<?php } ?>
							</figcaption>
						</figure>
					</div> <!-- col.// -->
				<?php $counter++ ; } ?>
			</div> <!-- row end.// -->
			<nav class="mt-4" aria-label="Page navigation sample">
				<ul class="pagination">
					<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
					<li class="page-item active"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">Next</a></li>
				</ul>
			</nav>
		</main>
	</div>
</div>
