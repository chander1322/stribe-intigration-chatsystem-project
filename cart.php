<?php 
  include("app/db.php");
  session_start();
  // $cartArr = $_SESSION['cart'];
  // $_SESSION['cart'] = $cartArr; 
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
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">
            <div class="row">
              <div class="col-lg-7">
                <h5 class="mb-3"><a href="index.php" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <?php $count=0; 
                    if(!empty($_SESSION['cart'])){
                    foreach ($_SESSION['cart'] as $item){ 
                      $count++;
                    } } 
                    ?>
                    <p class="mb-0">You have <?php echo $count;?> items in your cart</p>
                  </div>
                  <div>
                    <p class="mb-0"><button class="btn btn-danger" id="deleteitems">Delete all Items</button> </p>
                  </div>
                </div>
          <?php 
          $total_price = 0;
          if(!empty($_SESSION['cart'])){
              foreach ($_SESSION['cart'] as $item) { 
                 $product_price = $item['price']*$item['quantity'];
                  ?>

                <div class="card-items card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="uploads/<?php echo $item['image'] ?>"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5><?php echo $item['title'] ?></h5>
                          <!-- <p class="small mb-0">256GB, Navy Blue</p> -->
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0"><?php echo $item['quantity'] ?></h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0"><?php echo '$'.$product_price ?></h5>
                        </div>
                        <a href="javascript:void(0)" style="color: #cecece;"><i class="fas fa-trash-alt remove_item" remove-id="<?php echo $item['product_id'] ?>"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
               <?php 
                $total_price += $product_price;
              }
          }?>
              </div>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Card details</h5>
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                        class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                    </div>

                    <p class="small mb-2">Card type</p>
                    <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-visa fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-amex fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                    <form class="mt-4">
                      <div class="form-outline form-white mb-4">
                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                          placeholder="Cardholder's Name" />
                        <label class="form-label" for="typeName">Cardholder's Name</label>
                      </div>

                      <div class="form-outline form-white mb-4">
                        <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                          placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                        <label class="form-label" for="typeText">Card Number</label>
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="text" id="typeExp" class="form-control form-control-lg"
                              placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                            <label class="form-label" for="typeExp">Expiration</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="password" id="typeText" class="form-control form-control-lg"
                              placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                            <label class="form-label" for="typeText">Cvv</label>
                          </div>
                        </div>
                      </div>

                    </form>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2"><?php echo '$'.$total_price;?></p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <?php 
                      $delivery_charges=0;
                      if(empty($_SESSION['cart'])){
                         $delivery_charges=0;
                         $Grandtotal=0;
                      }else{
                        $delivery_charges=50;
                        $Grandtotal= $total_price+$delivery_charges;
                      }

                      ?>
                       <p class="mb-2"><?php echo '$'.$delivery_charges;?></p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total(Incl. taxes)</p>
                      <p class="mb-2 total-inc-all-text"><?php echo '$'.$Grandtotal;?></p>
                    </div>
                    <?php
                      if(!empty($Grandtotal)){?>
                         <a href="checkout.php"><button type="button" class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-between">
                        <span class="total-price payable-amount"><?php echo '$'.$Grandtotal;?></span>
                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                      </div>
                    </button></a><?php
                      }else{
                    ?>
                    <a href="#"><button type="button" class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-between">
                        <span class="total-price payable-amount"><?php echo '$'.$Grandtotal;?></span>
                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                      </div>
                    </button></a><?php } ?>

                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>