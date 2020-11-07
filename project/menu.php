<?php
$answers_hard= array("Washington","Simula","Sailfish","Chongqing","Simula","Sailfish","Chongqing");
$clues_hard=array(
"Lastname of the first US President(Dollar bill)",
"First object oriented language",
"Fastest animal in water",
"Largest city in the world",
"First object oriented language",
"Fastest animal in water",
"Largest city in the world"
);
$answers_medium= array("Washington","Sailfish","Thirteen", "PHP", "Messi","Java","Water");
$clues_medium=array(
"Lastname of the first US President(Dollar bill)",
"Fastest animal in water",
"Number of Stripes on the American flag in words",
"What is the abbreviation for Hypertext Preprocessor",
"Soccer player who won 6 ballon d'or",
"Object oriented Language that is strong typed(since 1995)",
"The main constituent of Earth's hydrosphere"
);
$answers_easy= array("Thirteen","Fifty", "Messi","Woods","Giraffe","Bezos","Water");
$clues_easy=array(
"Number of Stripes on the American flag in words",
"Number of Stars on the American flag in words",
"Soccer player who won 6 ballon d'or",
"Most popular golfer's last name",
"Tallest Animal",
"Richest person in the world's last name",
"The main constituent of Earth's hydrosphere"
);
session_start();

if(isset($_SESSION['count'])){
	unset($_SESSION['count']);
}
if(isset($_SESSION['word'])){
	unset($_SESSION['word']);
	
}
if(isset($_SESSION['indexes'])){
	unset($_SESSION['indexes']);	
}

if(isset($_POST['hard'])){
	$index = rand(0,6);
	$_SESSION['Clue']=$clues_hard[$index];
	$_SESSION['new_word']=$answers_hard[$index];
	header("Location: hangman.php");
}
if(isset($_POST['medium'])){
	$index = rand(0,6);
	$_SESSION['Clue']=$clues_medium[$index];
	$_SESSION['new_word']=$answers_medium[$index];
	header("Location: hangman.php");
}
if(isset($_POST['easy'])){
	$index = rand(0,6);
	$_SESSION['Clue']=$clues_easy[$index];
	$_SESSION['new_word']=$answers_easy[$index];
	header("Location: hangman.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hangman</title>
<link rel="stylesheet" type="text/css" href="style_hang.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="word-col half" >

	<a href="main.php"> Home </a>
	<a href="menu.php"> Menu </a>
	<a href="logout.php"> Logout </a>
	<form class="p-top" action = "" method = "post">
		

		<input class="btn-outline-purple" type = "submit" name="hard"  value = "Hard Level" />
		<input class="btn-outline-purple" type = "submit" name="medium"  value = "Medium Level" />
		<input class="btn-outline-purple" type = "submit" name="easy"  value = "Easy Level" />
	</form>
</div>
<div class="word-col half">
<img src='img/hangman.gif' class='hangman_img' alt='hangman'/>
 </div>
 </div>
 </div>
</body>
</html>