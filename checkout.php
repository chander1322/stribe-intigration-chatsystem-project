<?php 
  require($_SERVER['DOCUMENT_ROOT']."/chatsystem/stripeconfig.php"); 
\Stripe\Stripe::setApiKey('sk_test_51MzDrADMbkQFDuuu6zqTKAOfSGogHNNNvZXsRxg5t4XteNmcuAR9aEVxgSZ2SIGnz8Xpq1UZeNkg3dBEeT5epUiP00H6tCtABl');


#create customer
// $customerdata=add_new_customer();
// echo"<pre>";
// print_r($customerdata);
// function add_new_customer(){
// $stripe = new \Stripe\StripeClient('sk_test_51MzDrADMbkQFDuuu6zqTKAOfSGogHNNNvZXsRxg5t4XteNmcuAR9aEVxgSZ2SIGnz8Xpq1UZeNkg3dBEeT5epUiP00H6tCtABl');
// $customer = $stripe->customers->create([
//     'description' => 'newcustomer1',
//     'email' => 'newcustomer1@example.com',
//     'payment_method' => 'pm_card_visa',
// ]);
//   return $customer;
// }

#create payment
// $paymentdata=create_payment();
// echo"<pre>";
// print_r($paymentdata);
// function create_payment(){
// \Stripe\Stripe::setApiKey('sk_test_51MzDrADMbkQFDuuu6zqTKAOfSGogHNNNvZXsRxg5t4XteNmcuAR9aEVxgSZ2SIGnz8Xpq1UZeNkg3dBEeT5epUiP00H6tCtABl');
// $intent = \Stripe\PaymentIntent::create([
//   'amount' => 1000,
//   'currency' => 'usd',
// ]);
// return $intent;
// }
session_start();
if(!empty($_SESSION['cart'])){
  $userName= $_SESSION['user_name'];
  $Email= $_SESSION['email'];
  $sum=50;
  foreach ($_SESSION['cart'] as $sessiondata) {
    $sum+=$sessiondata['price'];
  }

} 
?>
<form action="Stribesubmit.php" method="POST">
	<h1>Please make a pament</h1>
  <script
    src="https://checkout.stripe.com/checkout.js"
    class="stripe-button"
    data-key="<?php echo $Publishable_key?>"
    data-name="service payment"
    data-description="Your service payment designed t-shirt"
    data-amount="<?php echo $sum*100?>"
    data-email="<?php echo $email?>"
    data-image="https://enalo.in/components/assets/img/payment-link/banner-payment-links.svg"
    data-currency="USD">
  </script>
</form>