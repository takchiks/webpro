<?php

ob_start();
session_start();



if(!isset($_SESSION['Clue'])||!isset($_SESSION['new_word'])){
	header("Location: menu.php");
}
if(isset($_POST['newWord'])){
	unset($_SESSION['count']);
	unset($_SESSION['indexes']);
	unset($_SESSION['word']);	
}
if(isset($_SESSION['return'])&&$_SESSION['return']){
	unset($_SESSION['count']);
	unset($_SESSION['indexes']);
	unset($_SESSION['word']);
	header("Location: menu.php");
}

$word['word']=$_SESSION['new_word'];
if(!isset($_SESSION['count'])){
	$_SESSION['count']=0;
}
if(!isset($_SESSION['word'])){
	$_SESSION['answer']= str_split($word['word']);
	$_SESSION['word'] ="";
}
if(!isset($_SESSION['indexes'])){
	$_SESSION['indexes']=array();
}
$temp_str="";

function isLetterPresent($letter, $word){
	$count = 0; 
	$temp_letter=strtolower($letter);
	$temp_array=str_split($temp_letter);
	$letter = $temp_array[0];
	
	$lower_word = strtolower($word);
	$word_array = str_split($lower_word);
	foreach($word_array as $key => $value){
		if(empty(trim($letter))){
			break;
		}
		if($value===$letter && !(in_array($key, $_SESSION['indexes']))){
			$count++;
			array_push($_SESSION['indexes'],$key);
		}		
	}
	
	if($count==0){
		$_SESSION['count']++;
	}
	
	
}

if(isset($_POST['hangman'])){
	isLetterPresent($_POST['userInput'],$word['word']);
	foreach($_SESSION['answer'] as $key=>$values){
		$prev = $temp_str;
		foreach($_SESSION['indexes'] as $key1=>$values1){
			if($key==$values1){
				$temp_str.=$_SESSION['answer'][$values1];
			}			
		}
		if($prev==$temp_str){
			$temp_str.="_";
		}
	}
	$_SESSION['word'] =$temp_str;
	
	
	
}

$hang[0]='hangy.gif';
$hang[1]='hang_1.png';
$hang[2]='hang_2.png';
$hang[3]='hang_3.png';
$hang[4]='hang_4.png';
$hang[5]='hang_5.png';
$hang[6]='hang_6.png';
$hang[7]='hang_7.png';
$hang[8]='hang_8.png';



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
	<br>
	<h4 class="p-top">
	Clue: <?= $_SESSION['Clue']?></h4>
<form action = "" method = "post">
	
	
	Your Guess: <input class="textbox" name = "userInput" type = "text" size="1" maxlength="1"  />
	<br>
	<div class="center half">
		<input class="btn-outline-purple" type = "submit" name="hangman"  value = "Check" />
		<input class="btn-outline-purple" type = "submit" name = "newWord" value = "Start over"/>
	</div>
</form>
</div>
<div class="word-col half green">
<?php 
	$p = 0;
	foreach($hang as $key => $value){
		if($key==$_SESSION['count']&& $_SESSION['word']!= $word['word']){
			$p++;
			echo "<img src='img/".$value."' class='hangman_img' alt='hangman'/>";
			break;
		}
	}
	if($_SESSION['count']>=(9)){
		echo "<img  src='img/hangman_home.gif' class='hangman_img hang' alt='hangman'/>";
	}
	if( $_SESSION['word']== $word['word']){
		$_SESSION['return']=true;
		echo "<img  src='img/hangy2.gif' class='hangman_img' alt='You win'/>";
	}
	
	echo "<h1 class='word'>".$_SESSION['word']."</h1>";
	if(9>=$_SESSION['count']){
		echo "<h5 class='word'>".(9-$_SESSION['count'])." lives left.</h5>";
	}else{
		unset($_SESSION['count']);
		unset($_SESSION['indexes']);
		unset($_SESSION['word']);
		header("Location: menu.php");
	}
	
	
		/*$search_array = str_split($_SESSION['word']);
		if (in_array($letter, $search_array)){
			break loop;
		}*/
ob_end_flush();
	
 ?>
 </div>
 </div>
 </div>
</body>
</html>