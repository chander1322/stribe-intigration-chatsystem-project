<?php
include("app/db.php");
session_start();
#get single product data
if(isset($_GET['pid'])){
    $Product_id= $_GET['pid'];
    $product_data="SELECT users.user_id,users.user_role,users.user_name,products.product_id,products.user_id,products.category,products.title,products.image,products.price,products.description FROM products INNER JOIN users ON products.user_id = users.user_id where product_id=$Product_id";
    $query=mysqli_query($con,$product_data);
    $featched_data= mysqli_fetch_array($query);
    $user_id = $featched_data['user_id'];
    $pid = $featched_data['product_id'];
    
}
if(isset($_SESSION['user_id'])){
    $currentUser=$_SESSION['user_id'];
    // $currentUserName=$_SESSION['user_name'];
    $reciverChat="Select * from chat_conversion where (sender_id='$currentUser' and reciver_id='$user_id') OR (sender_id='$user_id' and reciver_id='$currentUser')";
    $reciverquery=mysqli_query($con,$reciverChat);
}
?>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap5.css">
<link rel="stylesheet" type="text/css" href="css/fontawesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="js/jquery.min.js"></script>
<script src="js/custom.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
    <link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css"
        rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        $(function () {
            $("#dialog").dialog({
                modal: true,
                autoOpen: false,
                title: "jQuery Dialog",
                width: 500,
                margin:0,
                height: 500
            }).css('text-align','left');
            $("#btnShow").click(function () {
                $('#dialog').dialog('open');
            });
        });
    </script>
</head>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="<?php
                                echo 'uploads/'.$featched_data['image'];?>" width="250" /> </div>
                            <div class="thumbnail text-center"> <img onclick="change_image(this)" src="<?php
                                echo 'uploads/'.$featched_data['image'];?>" width="70"> <img onclick="change_image(this)" src="<?php
                                echo 'uploads/'.$featched_data['image'];?>" width="70"> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"><span class="ml-1"><a href="index.php"><i class="fas fa-angle-left"></i>Back</a></span> </div> <a href="cart.php"><i class="fa fa-shopping-cart text-muted"></i></a>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Orianz</span>
                                <h5 class="text-uppercase"><?php
                                echo $featched_data['title'];?></h5>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price"><?php
                                echo '$'.$featched_data['price'];?></span>
                                    <div class="ml-2"> <small class="dis-price">$59</small> <span>40% OFF</span> </div>
                                </div>
                            </div>
                            <p class="about"><?php
                                echo $featched_data['description'];?></p>

                            
                            <?php 
                                if(isset($_SESSION["user_id"])){?>
                                    <input type="text" class="pid" value="<?php
                                echo $featched_data['product_id'];?>" readonly>

                            <input type="text" class="reciever_id" value="<?php
                                echo $featched_data['user_id'];?>" readonly>

                             <input type="text" class="reciever_user_name"value="<?php
                                echo $featched_data['user_name'];?>" readonly>

                            <input type="text" class="sender_id"value="<?php
                                echo $_SESSION['user_id'];?>" readonly>
                            <div class="cart mt-4 align-items-center">
                                <div id="dialog" style="display: none" align="center">
                                    <div class="model-body">
                                    <?php 
                                    while($reveivechat=mysqli_fetch_array($reciverquery)){
                                        $currentUser=$_SESSION['user_id'];
                                        // $currentUserName=$_SESSION['user_name'];
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
                                            <input type="text" class="form-control chatinput"name="message">
                                             <button class="btn btn-danger text-uppercase mr-2 px-4" id="insertconversion" r_user-name="<?php echo $featched_data['user_name']?>"  r_user-id="<?php echo $featched_data['user_id']?>" s_user-id="<?php echo $_SESSION['user_id']?>" s_user-name="<?php echo $_SESSION['user_name']?>" product-id="<?php echo $featched_data['product_id']?>">Send</button> 
                                    </div> 
                                </div>
                                <!-- <button class="btn btn-danger text-uppercase mr-2 px-4" id="btnShow">Message</button>  -->
                                <button class="btn btn-danger text-uppercase mr-2 px-4" id="btntest"><a href="chatpage.php?r_id=<?php echo $featched_data['user_id']?>&s_id=<?php echo $_SESSION['user_id']?>&p_id=<?php echo $featched_data['product_id']?>" style="color: white;">Quick chat</button> 
                                <?php } 
                                else{ ?>
                                    <div class="cart mt-4 align-items-center"> 
                                        <button class="btn btn-danger text-uppercase mr-2 px-4">Contact Us</button> 
                                    </div>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>