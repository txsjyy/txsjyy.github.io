var unshuffled = [];
function display(){
    start()
    var setN = Math.floor(Math.random() * 2)+1;
    var imgList = Array()
    for (i = 1; i<13; i++){
        imgList.push("PuzzleImages/puzzle"+setN+"/img"+setN+"-"+i+".jpg")
    }
    unshuffled = imgList;
    let shuffled = unshuffled
    .map(value => ({ value, sort: Math.random() }))
    .sort((a, b) => a.sort - b.sort)
    .map(({ value }) => value);

// This is the orginal method that didn't work
// I tried to put a var(type string) in the bracket of document.getElementById()
// and change their src to the image src
    // for (i = 0; i<12; i++){
    //     var idN = "img"+String(i);
    //     document.getElementById(idN).src = shuffled[i];
    // }

// then I found another way to get around it
    var imgArray = document.getElementsByTagName("img")
    for (i = 0; i<12; i++){
        imgArray[i+1].src = unshuffled[i];
    }
}
var flag = 1;
var timeCnt = 0;
function start(){
    setInterval(function() {
        if (flag != 1) {
        console.log("stop")
        return; 
    } else {
        timeCnt +=1 ;
        document.getElementById("timer").innerHTML = "Time you used : "+timeCnt +" s";
        console.log(timeCnt)
    }
    }, 1000)  
}
function stop(){
    flag = 0
    console.log("stop")
    if (test()){
        document.getElementById("result").innerHTML = "Congratulations! You got it!" ;
        console.log("sucess")
    } else{
        document.getElementById("result").innerHTML = "Better luck next time" ;
        console.log("fail")
    }
}
function test(){
    element = document.getElementById("grid")
    const images = document.querySelectorAll('img');
    let isCorrect = true;
    for (i = 0; i<12; i++){
        console.log(images[i+1].src )
        console.log(unshuffled[i])
        if (images[i+1].src != unshuffled[i]){
            isCorrect = false;
             break;
        }
    }
    return isCorrect
}

function grabber(event) {
    

    // Set the global variable for the element to be moved
    theElement = event.currentTarget;
    event.preventDefault()
    // Determine the position of the word to be grabbed, first removing the units from left and top
    posX = parseInt(theElement.style.left);
    posY = parseInt(theElement.style.top);
 
    // Compute the difference between where it is and where the mouse click occurred
    diffX = event.clientX - posX;
    diffY = event.clientY - posY;
 
    // Now register the event handlers for moving and dropping the word
    document.addEventListener("mousemove", mover, true);
    document.addEventListener("mouseup", dropper, true);
 
 }
 
 // The event handler function for moving the word
 function mover(event) {
    // Compute the new position, add the units, and move the word
    theElement.style.left = (event.clientX - diffX) + "px";
    theElement.style.top = (event.clientY - diffY) + "px";
 }
 
 // The event handler function for dropping the word
 function dropper(event) {
    // Unregister the event handlers for mouseup and mousemove
    document.removeEventListener("mouseup", dropper, true);
    document.removeEventListener("mousemove", mover, true);
 }