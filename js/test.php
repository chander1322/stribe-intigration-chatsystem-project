<?php 
include("../app/db.php");
	$category_name= $_POST['category'];
	echo"hellos";
	$Product = "SELECT * FROM products where category='$category_name'";
		$ProductResult=mysqli_query($con,$Product);
		$counter = 0;
		$max = 4;
		while ($product=mysqli_fetch_array($ProductResult) and ($counter < $max)) {?>
			<div class="col-md-4">
				<figure class="card card-product-grid">
					<div class="img-wrap"> 
						<span class="badge badge-danger"> NEW </span>
										<img src="<?php echo 'uploads/'.$product['image'];?>" class="img-fluid">
						<a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
					</div> <!-- img-wrap.// -->
					<figcaption class="info-wrap">
						<div class="fix-height">
							<a href="#" class="title"><h4><?php echo $product['title'] ?></h4></a>
							<div class="price-wrap mt-2">
								<span class="price"><?php echo '$'.$product['price'] ?></span>
								<!-- <del class="price-old">$1980</del> -->
							</div> <!-- price-wrap.// -->
						</div>
						<a href="#" class="btn btn-block btn-primary">Contact Us </a>
					</figcaption>
				</figure>
		</div> <!-- col.// -->
		<?php 
			$counter++ ;
	}
?>

