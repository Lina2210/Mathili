
window.onload = function() {
    showFirstQuestion(); 
};
function showFirstQuestion(){
    document.getElementById('question1').style.display = 'block';
    document.getElementById('1').style.display = 'block';
}
function good(){
    document.getElementById('correct').style.display = 'block';
    let element = elementSound("soundAcert")
    document.getElementById('1').style.pointerEvents = 'none';
    playSound(element)
}

function bad(){
    document.getElementById('wrong').style.display = 'block';
    let element = elementSound("soundLose")
    playSound(element)
}
function elementSound(id){
    let element = document.getElementById(id);
    return element;
}

function playSound(element){
    return element.play();
}
function loseSound(){
    let element = elementSound("soundLose")
    return playSound(element)
}

function acertSound(){
    let element = elementSound("soundAcert")
    return playSound(element)
}

