<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Taku Fav Restaurant</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="page_1">
	<?php 
	if(isset($_POST['submit_order'])){
		$plates = $_POST['plates'];
		$total = 0.00;
		$total_inc_tax = 0.00;
		foreach($plates as $key => $value){
			if((isset($value)&& $value<=0)||(!isset($value))){
				unset($plates[$key]);
			}
		}
		if(isset($plates['Bones'])){
			$total += $plates['Bones']*2100;
		}
		if(isset($plates['Stk'])){
			$total+= $plates['Stk']*199;
		}
		if(isset($plates['Chops'])){
			$total+= $plates['Chops']*899;
		}
		$total_inc_tax = $total*0.10;
	 ?>
	 

	<div id="id1_1">
		<p class="p0 ft0">Taku's Fav Restaurant</p>
		<p class="p1 ft1">Order Results</p>
		<p class="p2 ft2">Order processed at <?php echo date("H:i\, jS F Y"); ?></p>
		<p class="p1 ft2">Your order is as follows: </p>
		<p class="p2 ft2">Plates ordered: 
		<?php foreach($plates as $key => $value){
			echo " ".$key.": ".$value."; ";
		}			?></p>
		<p class="p3 ft2"><?php echo ((count($plates)>0)?"Subtotal: $".number_format((float)$total, 2, '.', ''):"You did not order anything on the previous page! Subtotal: $0.00");?></p>
		<p class="p4 ft2">Total including tax: <?php echo " $".number_format((float)($total+$total_inc_tax), 2, '.', '');  ?></p>
		<p class="p5 ft2">Customer referred by <?php echo $_POST['find']?>.</p>
	</div>
	<?php }?>
</div>
</body>
</html>