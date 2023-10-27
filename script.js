
window.onload = function() {
    showFirstQuestion(); 
};

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
        document.getElementById('buttons').style.display = 'block';
        document.getElementById('buttons').scrollIntoView({behavior:'smooth'})
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