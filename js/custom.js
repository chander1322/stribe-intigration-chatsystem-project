jQuery(document).ready(function(){
  load_chat();
  //show hide password
  jQuery('#togglePassword').click(function(){
        if(jQuery(this).hasClass('fa-eye-slash')){
          jQuery(this).removeClass('fa-eye-slash');
          jQuery(this).addClass('fa-eye');
          jQuery('#User_pass').attr('type','text');
        }else{
          jQuery(this).removeClass('fa-eye');
          jQuery(this).addClass('fa-eye-slash');  
          jQuery('#User_pass').attr('type','password');
        }
    });
   //ajax category filter
    jQuery('#category_filter').on("change", function(){
        var category = jQuery(this).val();
        jQuery('.allProducts').css('opacity','.5');
        jQuery.ajax({
            type: 'POST',
            url : "app/http/filter.php",
            data:{
              category:category
            },
            success: function (data) {  
              jQuery(".allProducts").html('');
              jQuery(".allProducts").append(data);
              // totalRecord++;
              jQuery('.allProducts').css('opacity','1');
              console.log("yes");
            }
        });
        
    });
   //open popup box
    jQuery("button#contactmodal" ).each(function(index) {
      jQuery(this).on("click", function(){
          var data_id=jQuery(this).data('id');
          // alert(data_id);
        jQuery('div#exampleModalCenter'+data_id).css('display','flex');
      });
    });
    jQuery("button.close" ).each(function(index) {
       jQuery(this).on("click", function(){
          var data_id=jQuery(this).data('id');
          jQuery('div#exampleModalCenter'+data_id).css('display','none');
      });
    });

    //price filter
    jQuery('button#price_filter').click(function(e){
      var minval=jQuery('.min-value').val();
      var maxval=jQuery('.max-value').val();
      e.preventDefault();
      jQuery('.allProducts').css('opacity','.5');
      jQuery.ajax({
        type:'POST',
        url:'app/http/filter.php',
        data:{
              minval:minval,
              maxval:maxval
            },
            success: function (data) {  
             jQuery(".allProducts").html('');
              jQuery(".allProducts").append(data);
              // totalRecord++;
              jQuery('.allProducts').css('opacity','1');
            }
      });
    });
    //insert chat in database from frontend popupbox
    jQuery('button#insertconversion').click(function(){
     var r_user_id = jQuery(this).attr('r_user-id');
     var r_user_name = jQuery(this).attr('r_user-name');
     var s_user_id = jQuery(this).attr('s_user-id');
     var s_user_name = jQuery(this).attr('s_user-name');
     var product_id = jQuery(this).attr('product-id');
     var pid=jQuery('.pid').val();
     var sender_id=jQuery('.sender_id').val();
     var reciever_id=jQuery('.reciever_id').val();
     var userchat=jQuery('.chatinput').val();
     jQuery.ajax({
      type:'POST',
      url:'app/http/filter.php',
      data:{
            pid:pid,
            sender_id:sender_id,
            reciever_id:reciever_id,
            userchat:userchat
            
          },
          success: function (data) { 
          jQuery('.model-body').append("<div class='message'style='text-align: right;'>"+data+"</div>");
          console.log(data);
          jQuery('.chatinput').val(' ');
          }

     });
     // jQuery.ajax({
     //    type:'post',
     //    url:'app/http/filter.php',
     //    data:{
     //      r_user_id:r_user_id,
     //      r_user_name:r_user_name,
     //      s_user_id:s_user_id,
     //      s_user_name:s_user_name,
     //      product_id:product_id

     //    },
     //    success: function (data) { 
     //      jQuery('.model-body').append(data);
     //      // jQuery('.model-body').html(data);
     //      console.log(data);
     //      jQuery('.chatinput').val(' ');
     //     }

     //  });
    //  setInterval(function() {
    //     load_chat();
    // }, 1000);
    });
    //open popup on reply button dashboard
  // jQuery('button#btnmodal').each(function(index) {
  //     jQuery(this).on('click',function(){
  //       var user_id=jQuery(this).attr('userid');
  //        jQuery("#dialog").dialog({
  //               modal: true,
  //               autoOpen: false,
  //               title: "jQuery Dialog",
  //               width: 500,
  //               margin:0,
  //               height: 500
  //            }).css('text-align','left');
  //       jQuery('#dialog').dialog('open');
  //       jQuery('button#reply').attr('reciver-id',user_id);
  //       });

  // });

   jQuery('button#reply').click(function(){
         var sender_id=jQuery(this).attr('sender_id');
        var reciever_id=jQuery(this).attr('reciver-id');
        var pid=jQuery(this).attr('pid');
        var userchat=jQuery('.chatinput').val();
        alert('pid: '+pid+' send: '+sender_id+' recive: '+reciever_id+' chat: '+userchat);
        // exit;
            jQuery.ajax({
                type:'POST',
                url:'app/http/filter.php',
                data:{
                      pid:pid,
                      sender_id:sender_id,
                      reciever_id:reciever_id,
                      userchat:userchat
                      
                    },
                    success: function (data) { 
                    jQuery('.model-body').append("<div class='message'style='text-align: right;'>"+data+"</div>");
             ;
                    console.log(data);
                    jQuery('.chatinput').val(' ');
                    }

               });
     
        });
  jQuery('button#btntest').click(function(){
     var r_user_id = jQuery(this).attr('r_user-id');
     var r_user_name = jQuery(this).attr('r_user-name');
     var s_user_id = jQuery(this).attr('s_user-id');
     var s_user_name = jQuery(this).attr('s_user-name');
     var product_id = jQuery(this).attr('product-id');
     // alert(s_user_name);
    jQuery.ajax({
      type:'post',
      url:'app/http/filter.php',
      data:{
        r_user_id:r_user_id,
        r_user_name:r_user_name,
        s_user_id:s_user_id,
        s_user_name:s_user_name,
        product_id:product_id

      },
      success: function (data) { 
        jQuery('.dialog').html(data);
        console.log(data);
        jQuery('.chatinput').val(' ');
       }

    });
  })
  //insert chat and append
  jQuery('#sendsms').click(function(){
    var sender = jQuery(this).attr('current-user');
    var reciver = jQuery(this).attr('reciver-user');
    var product_id = jQuery(this).attr('p-id');
    var textaresms=jQuery('#message').val();
    jQuery.ajax({
      type:'POST',
      url:'app/http/filter.php',
      data:{
      sender:sender,
      reciver:reciver,
      product_id:product_id,
      textaresms:textaresms

      },
      success: function (data) { 
        load_chat();
      jQuery('.chathtml').append(data);
      ;
      console.log(data);
      jQuery('#message').val(' ');
      }
    });

  });
   setInterval(function() {
        load_chat();
    }, 3000);

// add products to cart
jQuery('button#addtocart').each(function(index) {
      jQuery(this).on('click',function(){
          var product_id = jQuery(this).attr('data-id');
          var quantity=jQuery(this).parent().find('.product_quantity').val();
          jQuery.ajax({
            type:'POST',
            url:'app/http/filter.php',
            data:{
            product_id:product_id,
            quantity:quantity
            },
            success: function (data) { 
              alert("product added success");
            }
          });  
      });
});
// remove product from cart
jQuery('.remove_item').each(function(index) {
      jQuery(this).on('click',function(){
        var remove_id = jQuery(this).attr('remove-id');
        jQuery(this).parents('.card-items').remove();
        jQuery.ajax({
            type:'POST',
            url:'app/http/filter.php',
            data:{
            remove_id:remove_id
            },
            success: function (response) { 
              alert('Item was deleted');
              location.reload(true);
               console.log(response);
            }
          });  
      });
    });
    // delete all items
    jQuery('button#deleteitems').on('click',function(){
      var unset="unset";
        jQuery.ajax({
            type:'POST',
            url:'app/http/filter.php',
            data:{
            unset:unset
            },
            success: function (response) { 
              alert('All Item was deleted');
              location.reload(true);
               console.log(response);
            }
          });  
      });
    });
// showing sms
function load_chat() {
   var sid = jQuery('#sendsms').attr('current-user');
    var rid = jQuery('#sendsms').attr('reciver-user');
    jQuery.ajax({
        type: 'post',
        url: 'app/http/filter.php',
        data:{
              loadsms:'loadsms',
              sid:sid,
              rid:rid
          },
        success: function(data) {
          jQuery('.chathtml').html('');
            jQuery('.chathtml').html(data);
            console.log(data);
        }
    });
}



