<?php
class pesapalDatabase{
	
	var $conn;
	
	public function __construct(){
		$this->conn =  $this->connectToDB();
	}

	function connectToDB(){
		$host		=	"localhost"; // Host name
		$username	=	"root"; // Mysql username
		$password	=	""; // Mysql password
		$db_name	=	"pesapal3"; // Database name
		
		// Connect to server and select database.
		$mysqliconn = mysqli_connect($host, $username, $password)or die("cannot connect".mysqli_connect_error($mysqliconn));
		mysqli_select_db($mysqliconn,$db_name)or die("cannot select DB");
		
		// Check connection
		if (mysqli_connect_errno($mysqliconn))
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		
		return $mysqliconn;
	}

    function store($data){
			
		$currency	=	$data['currency'];
		$amount		=	$data['amount'];
		$status		=	'PLACED'; // You could use your own status. This means no payment has been made.
		$referenceNo	=	$data['reference'];
		$userId 	= 	$this->getUser($data);
		
		//check if the record exists
		$sql ="SELECT id FROM transactions WHERE `referenceNo` = '".$referenceNo."'";
		$transaction = mysqli_query($this->conn,$sql );
		
		if(!mysqli_num_rows($transaction)) {
			$sql = "INSERT INTO transactions (`currency`, `amount`, `status`, `referenceNo`, `userId`) ". 
				   "VALUES ('".$currency."', '".$amount."','PLACED','".$referenceNo."','".$userId."')";	   
				   
			mysqli_query($this->conn,$sql);
			$transactionId 	= mysqli_insert_id($this->conn); //return id of the new user created
			
			if(! $transactionId )
				die('Could not enter transaction details: ' . mysqli_error($this->conn));
		}
		
		mysqli_close($this->conn);
	}
	
	function getUser($data){
		$sql	 = "SELECT id FROM users WHERE email='".$data['email']."' ";
		$user	 = mysqli_fetch_array(mysqli_query($this->conn,$sql), MYSQLI_ASSOC);
		$userId = $user['id'];

		if(!$user['id']) {
			$firstName	=	$data['first_name'];
			$lastName	=	$data['last_name'];
			$email		=	$data['email'];
			$phoneNo	=	$data['phone_number'];
			
			$sql 		= "INSERT INTO users (`first_name`, `last_name`, `email`,`phone`) ". 
			       		  "VALUES ('".$firstName."', '".$lastName."','".$email."','".$phoneNo."')";
						  
			$user		= mysqli_query($this->conn,$sql);
			$userId 	= mysqli_insert_id($this->conn); //return id of the new user created
			
			if(! $userId )
				die('Could not enter user details: ' . mysqli_error($this->conn));	
		}
		
		return 	$userId;
	}
	
	
	function updateTransaction($transaction){

		$status 					= $transaction['status'];
		$payment_method 			= $transaction['payment_method'];
		$pesapalMerchantReference	= $transaction['pesapal_merchant_reference'];
		$pesapalTrackingId 			= $transaction['pesapal_transaction_tracking_id'];
		
		$sql	= "UPDATE transactions ".
				  "SET `status`= '".$status."',`paymentMethod`= '".$payment_method."',`trackingId`= '".$pesapalTrackingId."' ".
			      "WHERE `referenceNo`= '".$pesapalMerchantReference."'";
				  
		$thequery = mysqli_query($this->conn,$sql);
		if($thequery)
			$updated = true;
		else
			$updated = false;
			
			
		mysqli_close($this->conn);
		
		if($updated)
			return true;
		else	
			return false;
	}
}