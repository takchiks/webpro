<!Doctype html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Remove All</title>
</head>
<body>
<?php 
function remove_all($str, $char){
	$temp = str_split($str);
	$array;
	$new_str="";
	for($i=0; $i<count($temp);$i++){
		if(!empty($temp[$i])&& $temp[$i]!==$char){
			$new_str.=$temp[$i];
		}
	}
	print ($new_str);
	return $new_str;
	
	
}
remove_all("Summer is here!", 'e')


?>

<br>
<p align="center"> 
|&raquo;
  <a href="hello_world.php">Exercise 1</a>	&laquo;||&raquo;
  <a href="nested_for.php"> Exercise 2</a>	&laquo;||&raquo;
  <a href="triangle.php">Exercise 3</a>	&laquo;||&raquo;
  <a href="word_count.php">Exercise 4</a> 	&laquo;||&raquo;	
  <a href="countWords.php">Exercise 5</a> 	&laquo;||&raquo;
  <a href="remove_all.php">Exercise 6</a> 	&laquo;|
</p>

</body>
</html>	