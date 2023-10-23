function elementSound(id){
    let element = document.getElementById(id);
    return element;
}

function playSound(element){
    element.play();  

}

function stopSound(element){
    element.pause();
}

function winSound(){
    let element = elementSound("soundWin")
    return playSound(element)
}

function loseSound(){
    let element = elementSound("soundLose")
    playSound(element)
    
}

function acertSound(){
    let element = elementSound("soundAcert")
    playSound(element)
}