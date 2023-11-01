
window.onload = function() {
    showFirstQuestion(); 
};

function showFirstQuestion(){
    document.getElementById('question1').style.display = 'block';
    document.getElementById('answers1').style.display = 'grid';
    document.getElementById('introQuestion1').style.display = 'block';
}
function good(numberOfQuestion){
    document.getElementById('correct'+numberOfQuestion).style.display = 'block';
    let element = elementSound("soundAcert")
    playSound(element)
    document.getElementById('answers'+numberOfQuestion).style.pointerEvents = 'none';
    closeModal()

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
    document.getElementById('introQuestion'+numberOfQuestion).style.display = 'block';
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

function comodinPublic(){
    let element = elementSound("soundPublic")
    playSound(element)
}

function statisticsPublic(){
    let element = elementSound("soundStatistics")
    playSound(element)
}

/* wild cart 50/50 */
function clickFifty(){
    const boton = document.getElementById("fifty")
    boton.style.backgroundColor= "#fff";  
    boton.style.pointerEvents = 'none'
    wildCart5050()             
}

function getElementClass(classElement){
    const element = document.getElementsByClassName(classElement);
    return element
}

function arrayCurrentAnswer(element, emptyArray){
    for (let i = 0; i < element.length; i++) {
        const pointerEventsValue = window.getComputedStyle(element[i]).pointerEvents;
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

/* comodin publico inicio*/ 
function addVowelToAnswer(){
    const answers = getElementClass("grid-item")
    const letters = ['a', 'b', 'c', 'd'];
    let indexLetter = 0;
    for (let i = 0; i < answers.length; i++) {
        let button = answers[i];
        button.innerText = letters[indexLetter] + "." + button.innerText; // Realiza alguna operación con cada botón
        indexLetter ++
        if (indexLetter == 4){
            indexLetter = 0
        }
    }
}
addVowelToAnswer()/*no borrar*/
function clickPublic(){
    const boton = document.getElementById("public")
    boton.style.backgroundColor= "#fff";  
    boton.style.pointerEvents = 'none'
    comodinPublic()
    openModalWithDelay()
    public()       
    alert("¡Es momento de usar el comodín del público! Observa a la izquierda de la pantalla. Verás las barras representando las respuestas votadas. La barra más grande indicará la respuesta más popular entre el público.")
    
}

function getAnswerOk(arrayElements, arrayPositionElement){
    for(let i = 0; i<arrayPositionElement.length; i++){
        let respOk = arrayElements[i].id
        console.log(respOk)
        if (respOk === "answerGood"){
            return arrayElements[i].innerText.charAt(0)
            
        }
    }
}

function generateStatistics(a, b, c, d){
    let barraA= getElementClass("barra a")
    console.log(barraA)
    let barraB= getElementClass("barra b")
    let barraC= getElementClass("barra c")
    let barraD= getElementClass("barra d")

    barraA[0].style.height = a + "%";
    barraB[0].style.height = b + "%"
    barraC[0].style.height = c + "%"
    barraD[0].style.height = d + "%"
}

function openModalWithDelay() {
    setTimeout(function() {
        openModal();
    }, 5000);
}

function openModal(){
    document.getElementById('modal').style.display = 'block';
    let element = elementSound("soundPublic")
    element.pause()
    statisticsPublic()
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';   
}

function public(){
    const answers = getElementClass("grid-item")
    console.log(answers)
    let answersArrayEmpty= []
    let answersArray = arrayCurrentAnswer(answers, answersArrayEmpty)
    console.log(answersArray)
    let answerOk = getAnswerOk(answers, answersArray)
    console.log(answerOk)
    numRandom = Math.floor(Math.random() * 10) + 1
    let data1 = Math.floor(Math.random() * (70 - 50 + 1)) + 50;
    console.log(data1)
    let data2 = Math.floor(Math.random() * (100 - data1));
    console.log(data2)
    let data3 = Math.floor(Math.random() * (100 - data1 - data2));
    console.log(data3)
    let data4 = 100 - (data1 + data2 + data3);
    console.log(data4)
    let a, b, c, d;
    
    if (numRandom <= 8){
        console.log("entro al if" + numRandom)
        console.log(answerOk)
        switch (answerOk) {
            
            case 'a':
                console.log(data4)
                a = data1;
                b = data2;
                c = data3;
                d = data4;
                generateStatistics(data1, data2, data3, data4)
                break;
            case 'b':
                a = data2;
                b = data1;
                c = data3;
                d = data4;
                generateStatistics(data2, data1, data3, data4)
                break;
            case 'c':
                a = data3;
                b = data2;
                c = data1;
                d = data4;
                generateStatistics(data3, data2, data1, data4)
                break;
            case 'd':
                a = data4;
                b = data2;
                c = data3;
                d = data1;
                generateStatistics(data4, data2, data3, data1)
                break;
        }
        console.log("a =", a);
        console.log("b =", b);
        console.log("c =", c);
        console.log("d =", d);
    }else{
        console.log("soy el else")
        a = data1;
        b = data2;
        c = data3;
        d = data4;
        generateStatistics(data1, data2, data3, data4)
    }
    
}
/* comodin publico fin*/

