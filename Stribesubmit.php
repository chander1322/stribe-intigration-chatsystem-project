<?php 
// require("vendor/autoload.php");
require($_SERVER['DOCUMENT_ROOT']."/chatsystem/stripeconfig.php");

#create payment
$paymentdata=create_payment();
echo"<pre>";
print_r($paymentdata);
function create_payment(){
	session_start();
	if(!empty($_SESSION['cart'])){
		$userName= $_SESSION['user_name'];
		$Email= $_SESSION['email'];
	  	$sum=50;
		foreach ($_SESSION['cart'] as $sessiondata) {
			$sum+=$sessiondata['price'];
		} 
	}
	\Stripe\Stripe::setApiKey('sk_test_51MzDrADMbkQFDuuu6zqTKAOfSGogHNNNvZXsRxg5t4XteNmcuAR9aEVxgSZ2SIGnz8Xpq1UZeNkg3dBEeT5epUiP00H6tCtABl');
	$token = $_POST['stripeToken'];
	$intent = \Stripe\Charge::create([
	  'amount' => "$sum"*100,
	  'currency' => 'usd',
	  'description' => 'Example charge',
	  'source' => $token,
	]);
	echo "Payment successful!";
	return $intent;
}
?>