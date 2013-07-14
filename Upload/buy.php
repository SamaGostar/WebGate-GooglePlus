<?php
include('header.php');
?>
<div class="block medium right">
			<div class="top"><?if(isset($data->login)) {?>		
					<h1>خريد سکه</h1> 
            </div>
			<div class="content">		
<?
  $pack2 = mysql_query("SELECT * FROM `c_pack` ORDER BY `id` ASC");
  for($j=1; $pack = mysql_fetch_object($pack2); $j++)
{
$pay = "<b>قيمت : {$pack->price} تومان</b>
<form action=\"zarinpal.php\" method=\"post\">
<input type=\"hidden\" name=\"merchant\" value=\"{$site->zarinpal}\">
<input type=\"hidden\" name=\"item_name\" value=\"{$pack->name}\">
<input type=\"hidden\" name=\"item_number\" value=\"{$pack->coins}\">
<input type=\"hidden\" name=\"amount\" value=\"{$pack->price}\">
<input type=\"hidden\" name=\"custom\" value=\"{$data->id}\">
<input type=\"hidden\" name=\"user\" value=\"{$data->login}\">
<input type=\"hidden\" name=\"url\" value=\"{$site->site_url}/ipn.php\" />
<input type=\"image\" src=\"http://www.zarinpal.com/img/merchant/merchant-6.png\" name=\"submit\" alt=\"پرداخت!\"></form>";
?>
<div class="purchase">
<div class="purchase-hdr">خريد <? echo $pack->coins;?> سکه </div>
<?echo $pay;?>
</div>
<?}?>
<?}else{?><script>document.location.href='index.php'</script><?}?>	
		</div>
	</div>
<? include('footer.php');?>
<p align="center">Online Payment With Zarinpal By <a href="http://aryan-translators.ir/" target="blank">Hamed.Ramzi</a>.</p>
