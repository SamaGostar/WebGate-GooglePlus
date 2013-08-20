<?php
	include("database.php");
	
	if($_SERVER['REQUEST_METHOD']!="POST") die("No data");
		
	$item_name = $_POST['item_name'];
	$item_number = $_POST['item_number'];
	$users = $_POST['user'];
	$fix = $_POST['item_name'];
	$merchant = $_POST['merchant'];
	$amount = $_POST['amount']; //Amount will be based on Toman
	$custom = $_POST['custom'];
	$callBackUrl = $_POST['url'] . '?custom=' . $custom;
	$client = new SoapClient('https://de.zarinpal.com/pg/services/WebGate/wsdl', array('encoding'=>'UTF-8'));
	$res = $client->PaymentRequest(
	array(
					'MerchantID' 	=> $merchant ,
					'Amount' 		=> $amount ,
					'Description' 	=> $item_name ,
					'Email' 		=> '' ,
					'Mobile' 		=> '' ,
					'CallbackURL' 	=> $callBackUrl
					)
	
 );
	
	mysql_connect($host,$user,$pass);
	@mysql_select_db($tablename) or die( "Unable to select database");
	if($res->Status == 100)
	{
	$query = "INSERT INTO checked VALUES ('', '$users', '$res->Authority', '$item_number','$item_name','$merchant','$amount')";
	mysql_query($query);
	}
	mysql_close();
  
	if($res->Status ==100){
		Header('Location: https://www.zarinpal.com/pg/StartPay/'.$res->Authority);
	}else{
		'ERR:'.$res->Status;
	}

?>
