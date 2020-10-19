<!Doctype html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Nested For</title>
</head>
<body>
<?php 
	for($i = 0; $i<5;$i++){
		for($j = 0; $j<=$i;$j++){
			echo "*";
		}
		echo "<br>";
	}
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