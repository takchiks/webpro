<?php 

ob_start();
if(!isset($_COOKIE['login'])){
	header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Grandstander:ital,wght@0,100;1,500&display=swap');

/* DEMO-SPECIFIC STYLES */
.typewriter h2 {
  color: black;
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  border-right: .15em solid orange; /* The typwriter cursor */
  white-space: nowrap; /* Keeps the content on a single line */
  margin: 0 auto; /* Gives that scrolling effect as the typing happens */
  letter-spacing: .15em; /* Adjust as needed */
  animation: 
    typing 3.5s steps(30, end),
    blink-caret .5s step-end infinite;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: black }
}
#in
{
margin-left: 43%;
}
#scores
{
font-size: 25px;
background-color: #e7e7e7;
margin-left: 43%;
}

body
{
 background-color: yellow;
font-family: 'Grandstander', cursive;
font-size: 27px;

}
h1
{
	margin-left: 34%;
}

h2
{
	text-align: center;
}

.blinking{
    animation:blinkingText 1.2s infinite;
}
@keyframes blinkingText{
0%{   color: red;   }
47%{   color: #000; }
62%{   color: green; }
97%{   color:white; }
100%{  color: #000;   }
}
img
{
	margin-left: 37%;
}

a{
margin-left: 40%;}
p
{
	margin-left: 40%;
}

</style>
</head>
<body>
<img src="mario.gif">
<h1 class="blinking">"  GAMERS UTOPIA !  "</h1>
<div class="typewriter">
<h2>PLEASE SELECT A GAME YOU WANT TO PLAY</h2>
</div>
<br>

<br>
<a href="tic.php"># Tic Tac Toe</a> <input name="game"  type="radio"  value="tic">
<br>
<a href="rps/rps.php"># Rock Paper Scissors</a> <input name="game"  type="radio"  value="rps">
<br>
<a href="menu.php"> # Hangman</a> <input name="game"  type="radio"  value="hang">

<br>
<a href="logout.php"># Logout</a>

<br>
<form action="mainsubmit.php" method="post">

<br>
<input type="submit" name="List of scores" value="List of scores" id="scores">  
</form>
</body>
</html>
<?php ob_end_flush();?>