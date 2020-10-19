<!Doctype html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Word count</title>
</head>
<body>
<?php 
function word_count($word_count){
	$count=1;
	$word_count= trim($word_count);
	for($i=1; $i<strlen($word_count);$i++){
		if(preg_match("/\s/",$word_count{$i})&&($word_count{$i}!=$word_count{($i-1)})){
			$count++;			
		}
	}
	echo $count." words";
	return $count;	
}
word_count("hello, how are you?");

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