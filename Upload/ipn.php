<?php
require("config.php");
$web='http://'.$_SERVER['SERVER_NAME'];


$custom = $_GET['custom'];
$au = $_GET['Authority'];
$st = $_GET['Status'];
if($st == "OK")
{
		$check2 = mysql_query("SELECT * FROM `checked` WHERE `res`='{$au}'");
		$check = mysql_fetch_object($check2);

		$amount = $check->amount;
		$merchant = $check->merchant;
		$user = $check->user;
		$item_number = $check->item_number;
		$item_name = $check->item_name;

		$result = mysql_query("SELECT * FROM `transactions` WHERE `res`='{$au}' AND `refID` > 0 ");
		if (mysql_num_rows($result) == 1){
		echo '<meta http-equiv="refresh" content="5;URL='.$web.'"><link rel="stylesheet" href="css/style.css" type="text/css" /><link rel="stylesheet" href="css/themes/blue.css" type="text/css" /><div class="footer"><div><center><font color="white" size="5px"><b>متاسفانه اين خريد و شناسه تقلبي ميباشد</b><font></div></div>';
		}
		else
		{

		$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', array('encoding'=>'UTF-8'));
		$res = $client->PaymentVerification(
		array(
						'MerchantID'	 => $merchant ,
						'Authority' 	 => $au ,
						'Amount'		 => $amount
						)
		);

		if($res->Status == 100){
		mysql_query("UPDATE `users` SET `coins`=`coins`+'{$item_number}' WHERE `id`='{$custom}'");			
		mysql_query("INSERT INTO `transactions` (user, points, pack, refID, money, date) VALUES('{$user}', '{$item_number}', '{$item_name}', '{$refID}', '{$amount}', NOW())");
		echo '<meta http-equiv="refresh" content="5;URL='.$web.'"><link rel="stylesheet" href="css/style.css" type="text/css" /><link rel="stylesheet" href="css/themes/blue.css" type="text/css" /><div class="footer"><div><center><font color="white" size="5px"><b>با تشکر : سکه خریداری شده به حساب شما اضافه گشت</b><font></div></div>';
		}
		}
	}

?>
