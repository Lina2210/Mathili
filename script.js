
window.onload = function() {
    showFirstQuestion(); 
};

document.addEventListener('DOMContentLoaded', function() {
    var mensajeJS = document.getElementById('mensaje-js');
    mensajeJS.style.display = 'block';

    if (!document.body.hasAttribute('data-js-enabled')) {
        mensajeJS.style.display = 'block';
        modalOverlay.style.display = 'flex';
    }
});

function cerrarModal() {
    var modalOverlay = document.getElementById('modal-overlay');
    modalOverlay.style.display = 'none';
}

function showFirstQuestion(){
    document.getElementById('question1').style.display = 'block';
    document.getElementById('answers1').style.display = 'grid';
}
function good(numberOfQuestion){
    document.getElementById('correct'+numberOfQuestion).style.display = 'block';
    let element = elementSound("soundAcert")
    playSound(element)
    document.getElementById('answers'+numberOfQuestion).style.pointerEvents = 'none';
    if(numberOfQuestion==3){
        console.log("HOLA");
        document.getElementById('buttons').style.display = 'block';
    }else{
    showQuestion(numberOfQuestion+1);
    }
}

function bad(numberOfQuestion){
    document.getElementById('wrong'+numberOfQuestion).style.display = 'block';
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
function showQuestion(numberOfQuestion){
    document.getElementById('question'+numberOfQuestion).style.display = 'block';
    document.getElementById('answers'+numberOfQuestion).style.display = 'grid';
    document.getElementById('question'+numberOfQuestion).scrollIntoView({behavior:'smooth'})
}


function winSound(){
    let element = elementSound("soundWin")
    return playSound(element)
}
function displayBlock(id){
    let question = document.getElementById(id);
    if (question.style.display === "none"){
        question.style.display = "block"
    }

}

function loseSound(){
    let element = elementSound("soundLose")
    playSound(element)
    
}