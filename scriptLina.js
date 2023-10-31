
window.onload = function() {
    showFirstQuestion(); 
};


/* wild cart 50/50 */
function clickFifty(){
    boton = document.getElementById("fifty")
    boton.style.backgroundColor= "#fff";  
    boton.style.pointerEvents = 'none'
    wildCart5050()             
}

function getElementClass(classElement){
    element = document.getElementsByClassName(classElement);
    return element
}

function arrayCurrentAnswer(element, emptyArray){
    for (let i = 0; i < element.length; i++) {
        const pointerEventsValue = window.getComputedStyle(element[i]);
        let clientHeight = element[i].clientHeight;

        if (pointerEventsValue !== "none" && clientHeight !== 0) {
            emptyArray.push(i);
        }
    }
    return emptyArray
}

function getAnswersToDelete(array){
    let currentAnswer = array.slice(-3);
    let deleteIndex = Math.floor(Math.random() * currentAnswer.length);
    currentAnswer.splice(deleteIndex, 1);

    return currentAnswer
}

function deleteText(array, element){
    array.forEach(function (posicionButton) {
        element[posicionButton].innerText = "";
        element[posicionButton].style.pointerEvents = 'none'
    });
}

function wildCart5050() {
    const answerBad = getElementClass("answer-button");
    let emptyArray = []
    let arrayAnswer = arrayCurrentAnswer(answerBad, emptyArray)
    console.log(arrayAnswer);
    let deleteAnswer = getAnswersToDelete(arrayAnswer)
    deleteText(deleteAnswer, answerBad)

}

/*Mostrar preguntas*/
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

