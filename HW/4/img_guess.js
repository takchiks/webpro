function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;
    while (0 !== currentIndex) {  
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;
  
      // And swap it with the current element.
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }
  
    return array;
}
count = 0;

var images= [
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/openImages/p1.gif", 
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/openImages/p2.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/openImages/p3.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/openImages/p4.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/openImages/p5.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/openImages/p6.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/openImages/p7.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/openImages/p8.gif",
"./img/kingjuliet.jpg",
"./img/mickymouse.jpg",
"./img/tomandjerry.jpg",
"./img/minions.jpg"
];
var digits = ["http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/1.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/2.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/3.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/4.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/5.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/6.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/7.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/8.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/9.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/10.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/11.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/12.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/13.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/14.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/15.gif",
"http://tinman.cs.gsu.edu/~raj/2010/sp10/project/hideImages/16.gif",
"./img/17.jpg",
"./img/18.jpg",
"./img/19.jpg",
"./img/20.jpg",
"./img/21.jpg",
"./img/22.jpg",
"./img/23.jpg",
"./img/24.jpg"
];


function imgDisplay(indexes ,images){
    document.getElementById("images").innerHTML = "<p><h1 class='heading'>Memorise matching image pairs</h1></p>";
    for(var i = 0; i<indexes.length; i++){
        document.getElementById("images").innerHTML  += "<div class='child'> <img src='" + images[indexes[i]] +"' /></div>";
    }
}
function digitsDisplay(){
    document.getElementById("images").innerHTML = "<p><h1 class='heading'>Select memorised matching pairs</h1></p>";
    for(var i = 0; i<indexes.length; i++){
        document.getElementById("images").innerHTML += "<div class='child' id='img"+i+"'> <a onclick='comparePrev(" + i + ")'><img src='" + digits[i] +"' /></a></div>";
    }
}
function comparePrev(p){
    if (indexes[p]==prev && prevInt!=p) {
        document.getElementById("img"+p).innerHTML = "<img src='" + images[indexes[p]] +"' />";
        document.getElementById("img"+prevInt).innerHTML = "<img src='" + images[indexes[prevInt]] +"' />";
        prev = indexes[p];
        prevInt = p;
    } else {
        document.getElementById("img"+p).innerHTML = "<img src='" + images[indexes[p]] +"' />";
        setTimeout(function(){
            document.getElementById("img"+p).innerHTML = "<div class='child' id='img"+ p +"'> <a onclick='comparePrev(" + p + ")'><img src='" + digits[p] +"' />";
        }, 100);
        prev = indexes[p];
        prevInt = p;
    }
}
function loadIndexes(ind){
    prev = 200;
    prevInt = 200;
    allIndexes = [[1,1,2,2,3,3,4,4,5,5,6,6,7,7,0,0],[1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,0,0],[1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10,11,11,0,0]]
    indexes = allIndexes[ind];
    document.getElementById("images").innerHTML = "<h1 class='heading'>Choose level of difficult to memorise images </h1>";
    document.getElementById("images").innerHTML += "<a class='btn' onclick='getReady(3)'> 3 Seconds </a>";
    document.getElementById("images").innerHTML += "<a class='btn' onclick='getReady(5)'> 5 Seconds </a>";
    document.getElementById("images").innerHTML += "<a class='btn' onclick='getReady(8)'> 8 Seconds </a>";
}
function getReady(m){
    document.getElementById("images").innerHTML = "<h1 >Get Set</h1>";
    document.getElementById("images").innerHTML += "<a class='btn' onclick='loadFirst("+m+")'> Go! </a>";
}
function loadFirst(sec){
    
    shuffle(indexes);
    imgDisplay(indexes,images);
    setTimeout(digitsDisplay, sec * 1000);
    if (indexes.length == 16) {
        count=120;
        var counter=setInterval(timer, 1000);
        var timeout = setTimeout(function(){alert("No time left");location.reload();}, 120 * 1000);
        
    }
    if (indexes.length == 20) {
        count=150;
        var counter=setInterval(timer, 1000);
        var timeout = setTimeout(function(){alert("No time left");location.reload();}, 150 * 1000);
    }
    if (indexes.length == 24) {
        count=180;
        var counter=setInterval(timer, 1000);
        var timeout = setTimeout(function(){alert("No time left");location.reload();}, 180 * 1000);
    }

}

function timer()
{
  count=count-1;
  if (count <= 0)
  {
    document.getElementById("timeleft").innerHTML = "<h1>"+count+" seconds left</h1>";
     clearInterval(counter);
     return;
  }
}
function reloadPage(){
    location.reload();
}