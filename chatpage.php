<?php 
    include("app/db.php");
    session_start();
    if(isset($_GET['r_id'])){
        $currentUser=$_GET['s_id'];
        $pid=$_GET['p_id'];
        $r_id=$_GET['r_id'];
        // $currentUserName=$_SESSION['user_name'];
        $reciverChat="Select * from chat_conversion where (sender_id='$currentUser' and reciver_id='$r_id') OR (sender_id='$r_id' and reciver_id='$currentUser')";
        $reciverquery=mysqli_query($con,$reciverChat);
        $rows= mysqli_fetch_array($reciverquery);
        //user data
        $user_query="select * from users where user_id='$r_id'";
        $userrun=mysqli_query($con,$user_query);
        $user_info= mysqli_fetch_array($userrun);
}
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
<section style="background-color: #eee;">
  <div class="container py-5">

    <div class="row d-flex justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">

        <div class="card" id="chat1" style="border-radius: 15px;">
            <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
            style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <a href="single.php?<?php echo'pid='.$pid;?>"><i class="fas fa-angle-left"></i>Back</a>
                <p class="mb-0 fw-bold">Live chat with <?php echo $user_info['name']?></p>
                <a href="single.php?<?php echo'pid='.$pid;?>"><i class="fas fa-times"></i></a>
            </div>
            <div class="card-body">
                <div class="chathtml">
            <?php 
            while($row= mysqli_fetch_array($reciverquery)){
                    $align='';
                    if($currentUser==$row['sender_id']){
                        $align='end';
                    }
                    else{
                        $align='start';
                    }    
                  ?>  
                <div class="d-flex flex-row justify-content-<?php echo $align ;?> mb-4">
                    <!--    <img src="#"
                         alt="avatar 1" style="width: 45px; height: 100%;"> -->
                    <div class=" sender-data p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                        <p class=" chatmessage small mb-0"><?php echo $row['message']?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        </div>
           <!--  <div class="d-flex flex-row justify-content-end mb-4">
              <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                <p class="small mb-0">Thank you, I really like your product.</p>
              </div>
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                alt="avatar 1" style="width: 45px; height: 100%;">
            </div> -->

            <div class="form-outline">
              <textarea class="form-control" id="message" rows="4"></textarea>
              <button class=" btn btn-success form-label" current-user="<?php echo $currentUser;?>" reciver-user="<?php echo $r_id; ?>" p-id="<?php echo $pid;?>" id="sendsms" for="textAreaExample">send message</label>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
</section>

