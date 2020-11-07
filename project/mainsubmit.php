

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Score list Here!</title>
	</head>
	
<body>

<table style="background-color:white;border-style: dotted;border-color: blue; padding:100px; width:100%; font-size:25px;">
 <tr><td><dt> <?php echo nl2br(file_get_contents( "score.txt")); ?></dt></td></tr>
</table>




</body>
</html>

<?php
if(isset($_POST["name"]) &&  isset($_POST["game"]))
{
$data1=$_POST['name'];
$data2=$_POST["game"];

if (( $_POST["game"] == "hang"))
{
$data3= "150";
}
if (( $_POST["game"] == "rps"))
{
$data3= "50";
}

if (( $_POST["game"] == "tic"))
{
$data3= "250";
}





$fs = fopen("score.txt","a");
  fwrite($fs , $data1 . "; " . $data2  ." ; " . $data3 . "\n");
  fclose($fs);
}
?>
</body>
</html> 