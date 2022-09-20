<?php 
	require_once('top.php');
	// require_once('db/dbconnector.php');
    require_once('helper/pesapalV30Helper.php');

    $consumer_key = "qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW";
    $consumer_secret = "osGQ364R49cXKeOYSpaOnT++rHs=";

    $api = 'demo';

    $helper = new pesapalV30Helper($api);

    $access = $helper->getAccessToken($consumer_key, $consumer_secret);
    $access_token = $access->token;
    // echo $access_token;

        
    if(isset($_GET['OrderTrackingId']))
        $orderTrackingId = $_GET['OrderTrackingId'];
        
    
    $status = $helper->getTransactionStatus($orderTrackingId, $access_token);

    // var_dump($status)
    
    //At this point, you can update your database.
    //In my case i will let the IPN do this for me since it will run
    //IPN runs when there is a status change  and since this is a new transaction, 
    //the status has changed for UNKNOWN to PENDING/COMPLETED/FAILED
    // <b>Status: </b> <?php echo $status->payment_status_description 
?>
<h3>Callback/ return URl</h3>
<div class="row-fluid">
	<div class="span6">
        <b>PAYMENT RECEIVED SUCCESSFULLY</b>
        <blockquote>
         	<b>Order Tracking ID: </b> <?php echo $orderTrackingId; ?><br />
         	<b>Status: </b> <?php echo $status->payment_status_description; ?><br /> 
        </blockquote>
    </div>
</div>