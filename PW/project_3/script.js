
(function (){
	var myAudio = new Audio("gamejazz.mp3");
	var endGame = new Audio("gametheme.mp3");
	var PUZZ_SIZE = 15;
	var PIECE_SIZE = 100;
	var ROWS_COLS = 4;
	var emptyX = 0;
	var emptyY = 0;
	var totalMoves = 0;
	var solvable = true;
	window.onload = startup;
	 
	function startup(){
		createPieces();
		backgroundSelector();
		returnBG();
		shuffleButton();
		winCounter();
	}
	 
	
	function createPieces(){
		var x = 0;
		var y = 0;
		var count = 0;
		var puzzle = document.getElementById("puzzlearea"); 
		for (var i = 0; i < PUZZ_SIZE; i++){
			var value = i + 1;
			 
			if (count == ROWS_COLS){
				x = 0;
				y += PIECE_SIZE;
				count = 0;
			}
			var piece = document.createElement("div");
			piece.className = "piece"; 
			piece.innerHTML = value;
			piece.id=i;
			 
			piece.value = false;
			piece.style.left = x + "px";
			piece.style.top = y + "px";
			piece.style.backgroundPosition = -x + "px " + -y +"px";
			 
			piece.onmouseover = movablePiece;
			 
			piece.onmouseup = makeMovable;
			 
			piece.onmouseout = naturalBorder;
			puzzle.appendChild(piece);
			count++;
			x += PIECE_SIZE;
		}
		 
		emptyX = x;
		emptyY = y;
	}
	 
	function movePiece(thisPiece){
		if ((thisPiece.value === true)){ 
			 
			var tempX = parseInt(thisPiece.style.left);
			var tempY = parseInt(thisPiece.style.top);
			 
			thisPiece.style.left = emptyX + "px";
			thisPiece.style.top = emptyY + "px";
			 
			thisPiece.value = false;
			 
			emptyX = tempX;
			emptyY = tempY;
			 
			if (solvable === true){
				checkSolved();
			}
		}
	}
	function moveColPiece(thisPiece){
		if ((thisPiece.value === true)){ 
			var tempX = parseInt(thisPiece.style.left);
			var tempY = parseInt(thisPiece.style.top);
			var x = parseInt(thisPiece.style.left);
			var y = parseInt(thisPiece.style.top);
			var Xtemp=0;
			var Ytemp=0;
			var the_pieces =  document.querySelectorAll(".piece");
			the_pieces.forEach(element => {
				Ytemp= parseInt(element.style.top);
				Xtemp= parseInt(element.style.left);
				if(testRowX(element)&& y<emptyY &&(y<Ytemp && Ytemp<emptyY)){
					Xtemp = Xtemp;
					Ytemp = Ytemp + PIECE_SIZE;
					document.getElementById(element.id).style.left = Xtemp + "px";
					document.getElementById(element.id).style.top = Ytemp + "px";
				}
				if(testRowX(element)&& y>emptyY &&(y>Ytemp && Ytemp>emptyY)){
					Xtemp = Xtemp;
					Ytemp = Ytemp - PIECE_SIZE;
					document.getElementById(element.id).style.left = Xtemp + "px";
					document.getElementById(element.id).style.top = Ytemp + "px";
				}
				if(testRowY(element)&& x<emptyX &&(x<Xtemp && Xtemp<emptyX)){
					Xtemp = Xtemp + PIECE_SIZE;
					Ytemp = Ytemp;
					document.getElementById(element.id).style.left = Xtemp + "px";
					document.getElementById(element.id).style.top = Ytemp + "px";
				}
				if(testRowY(element)&& x>emptyX &&(x>Xtemp && Xtemp>emptyX)){
					Xtemp = Xtemp - PIECE_SIZE;
					Ytemp = Ytemp;
					document.getElementById(element.id).style.left = Xtemp + "px";
					document.getElementById(element.id).style.top = Ytemp + "px";
				}

				
			});
			
			if(testRowX(thisPiece)&& tempY<emptyY){
				tempX = tempX;
				tempY = tempY + PIECE_SIZE;
			}
			if(testRowX(thisPiece)&& tempY>emptyY){
				tempX = tempX;
				tempY = tempY - PIECE_SIZE;
			}
			if(testRowY(thisPiece)&& tempX<emptyX){
				tempX = tempX  + PIECE_SIZE;
				tempY = tempY;
			}
			if(testRowY(thisPiece)&& tempX>emptyX){
				tempX = tempX - PIECE_SIZE;
				tempY = tempY;
			}
			 
			document.getElementById(thisPiece.id).style.left = tempX + "px";
			document.getElementById(thisPiece.id).style.top = tempY + "px";
			 
			thisPiece.value = false;
			 
			emptyX = x;
			emptyY = y;
			 
			if (solvable === true){
				checkSolved();
			}
		}
	}
	 
	function movablePiece(){
		if (testX(this) || testY(this) || testRowX(this) || testRowY(this)){
			 
			highlightPiece(this);
		}
	}
	 
	function makeMovable(){
		totalMoves = totalMoves + 1;
		movesCounter();
		if(testX(this) || testY(this)){
			movePiece(this);
		}
		if((testRowX(this)|| (testRowY(this) )&&!(testX(this) || testY(this)))){

			moveColPiece(this);
		}
	}
	 
	function naturalBorder(){
		this.style.border = "5px solid black";
		this.style.color = "black";
		this.style.cursor = "default";
		this.value = false;
	}
	 
	function backgroundSelector(){
		var select = document.getElementById("background");
		select.onchange = puzzleBG;
	}
	 
	function puzzleBG(){
		var bg = document.getElementById("background").value;
		var pieces = document.querySelectorAll(".piece");
		for (var i = 0; i < pieces.length; i++){
			pieces[i].style.backgroundImage = 'url(' + bg + ')';
		}
		localStorage["background"] = bg;
	}
	 
	function highlightPiece(thisPiece){
		thisPiece.style.border = "5px solid blue";
		thisPiece.style.color = "blue";
		thisPiece.style.cursor = "pointer";
		thisPiece.value = true;
	}
	 
	function shuffleButton(){
		var button = document.getElementById("shuffle");
		button.onclick = boardShuffle;
	}
	 
	function boardShuffle(){
		totalMoves=0;	
		movesCounter();
		endGame.pause();	
		myAudio.pause();
		myAudio.currentTime = 0;
		
		myAudio.play();
		 
		document.getElementById("winner").innerHTML = "";
		 
		solvable = false;
		var pieces = document.getElementsByClassName("piece");
		 
		for(var i = 0; i < 1000; i++){
			var neighbors = [];
			for (var j = 0; j < pieces.length; j++){
				if ( testX(pieces[j]) || testY(pieces[j])){
					neighbors.push(pieces[j]);
				}
			}
			var sP = Math.floor(Math.random() * neighbors.length);
			neighbors[sP].value = true;
			movePiece(neighbors[sP]);
			neighbors[sP].value = false;
		}
		 
		solvable = true;
	}
	 
	function checkSolved(){
		var solveX = 0;
		var solveY = 0;
		var count = 0;
		var complete = 0;
		var pieces = document.getElementsByClassName("piece");
		 
		for (var i = 0; i < pieces.length; i++){
			if (count == ROWS_COLS){
				solveX = 0;
				solveY += PIECE_SIZE;
				count = 0;
			}
			 
			if (parseInt(pieces[i].style.left) == solveX && parseInt(pieces[i].style.top) == solveY){
				complete++;
			} else {
				complete = 0;
			}
			count++;
			solveX += PIECE_SIZE;
		}
		 
		if (complete == PUZZ_SIZE){	
			myAudio.pause();
			myAudio.currentTime = 0;
			endGame.play();
			document.getElementById("winner").innerHTML = "Winner!! Congratulations, You Won! <br> Shuffle again";
			var wins = localStorage["winCount"];
			wins++;
			localStorage["winCount"] = wins;
			winCounter();
		} else{
			 
			document.getElementById("winner").innerHTML = "";
		}
	}
	 
	function testX(thisPiece){
		if( parseInt(thisPiece.style.left) == emptyX){
			if(parseInt(thisPiece.style.top) == (emptyY - PIECE_SIZE) || parseInt(thisPiece.style.top) == (emptyY + PIECE_SIZE)){
				return true;
			}
		}
	}
	 
	function testY(thisPiece){
		if ( parseInt(thisPiece.style.top) == emptyY){
			if (parseInt(thisPiece.style.left) == (emptyX - PIECE_SIZE) || parseInt(thisPiece.style.left) == (emptyX + PIECE_SIZE)){
				return true;
			}
		}
	}
	 
	function testRowX(thisPiece){
		if( parseInt(thisPiece.style.left) == emptyX){
			 
				return true;
			 
		}
	}
	 
	function testRowY(thisPiece){
		if ( parseInt(thisPiece.style.top) == emptyY){
			 
				return true;
			 
		}
	}
	 
	function returnBG(){
		if(localStorage["background"]){
			var bg = document.getElementById("background");
			bg.value = localStorage["background"];
			var pieces = document.querySelectorAll(".piece");
			for (var i = 0; i < pieces.length; i++){
				pieces[i].style.backgroundImage = 'url(' + bg.value + ')';
			}
		}
	}
	 
	function winCounter(){
		var win = document.getElementById("winCount");
		if (!localStorage["winCount"]){
			localStorage["winCount"] = 0;
		} 
		win.innerHTML = "Total Wins: " +  localStorage["winCount"];
	}
	function movesCounter(){
		
		document.getElementById("totalMoves").innerHTML = "Moves played: " +  totalMoves;
	}
})();

