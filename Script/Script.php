<?php  

define('MERCHANT_KEY', 'here');
define('SALT', 'here');

define('PAYU_BASE_URL', 'https://secure.payu.in/'); //actual URL Use in production mode
define('SUCCESS_URL', 'http://sashibhusan.atwebpages.com/sucess.html');  //order sucess url replace with your complete url
define('FAIL_URL', 'http://sashibhusan.atwebpages.com/cancel.html');    //add complete url 
define('CANCEL_URL', 'http://sashibhusan.atwebpages.com/cancel.html');  
$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
$email = $_GET['email'];
$mobile = $_GET['mobile_no'];
$firstName = $_GET['first_name'];
$lastName =  $_GET['last_name'];
$totalCost = $_GET['amount'];
$hash         = '';
$hash_string = MERCHANT_KEY."|".$txnid."|".$totalCost."|"."productinfo|".$firstName."|".$email."|||||||||||".SALT;
$hash = strtolower(hash('sha512', $hash_string));
$action = PAYU_BASE_URL . '/_payment'; 
 
?>
<form action="<?php echo $action; ?>" method="post" name="payuForm" id="payuForm" style="display: none">
    <input type="hidden" name="key" value="<?php echo MERCHANT_KEY ?>" />
    <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
    <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
    <input name="amount" type="number" value="<?php echo $totalCost; ?>" />
    <input type="text" name="firstname" id="firstname" value="<?php echo $firstName; ?>" />
    <input type="email" name="email" id="email" value="<?php echo $email; ?>" />
    <input type="text" name="phone" value="<?php echo $mobile; ?>" />
    <textarea name="productinfo"><?php echo "productinfo"; ?></textarea>
    <input type="text" name="surl" value="<?php echo SUCCESS_URL; ?>" />
    <input type="text" name="furl" value="<?php echo  FAIL_URL?>"/>
  
    <input type="text" name="service_provider" value="payu_paisa"/>
    <input type="text" name="lastname" id="lastname" value="<?php echo $lastName ?>" />
</form>
<script type="text/javascript">
    var payuForm = document.forms.payuForm;
    payuForm.submit();
</script>

<?php
 
