<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
	<?php 
	$data="";
	$i=0;
	$len=count($_POST);
	if(empty(trim($_POST['name']))||empty($_POST['section'])||empty($_POST['card_type'])||empty((int)$_POST['card_number'])){
		?>
		<h1>Sorry</h1>
		<p>You didn't fill out the form completely. <a href="buyagrade.html">Try again?</a></p>
		<?php
	}else{
	foreach($_POST as $key=>$value){
		$i++;
		if ($i == $len - 1) {
			$data.=$value."\n";
			break;
		} 
		$data.= $value.";";
	}
	file_put_contents("sucker.html",$data,FILE_APPEND);
	?>
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd><?php echo $_POST['name']; ?></dd>

			<dt>Section</dt>
			<dd><?php if(isset($_POST['section'])) echo $_POST['section']; ?></dd>

			<dt>Credit Card</dt>
			<dd><?php echo $_POST['card_number']." (".$_POST['card_type'].")"; ?></dd>
		</dl>
		<pre><?php echo file_get_contents("sucker.html");?></pre>
	<?php } ?>
	</body>
</html> 