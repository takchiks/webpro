<!Doctype html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Count Words</title>
</head>
<body>
<?php 

function countWords($str){
	$str = trim($str);
	$a = explode(" ",$str);
	$array;
	for($i=0; $i<count($a);$i++){
		if(!empty($a[$i])&& isset($a[$i])){
			$array[$a[$i]]=0;
		}
	}
	for($i=0; $i<count($a);$i++){
		if(!empty($a[$i])){
			$array[$a[$i]]++;
		}
	}
	
	print_r($array);
	return $array;
	
}
countWords("hello, how are you?");

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