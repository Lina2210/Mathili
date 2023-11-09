var countofGoods=0;
var segundos = 30;
window.onload = function() {
    const currentURL = window.location.href;
    const currentPage = currentURL.substring(currentURL.lastIndexOf('/') + 1);
    if(currentPage=="game.php"){

    if (localStorage.getItem('fiftyClicked')=='true') {
        disableButton('fifty');
    }
    if (localStorage.getItem('publicClicked')=='true') {
        disableButton('public');
    }
    if (localStorage.getItem('extraClicked')=='true') {
        disableButton('extra');
    }
    if (localStorage.getItem('callClicked')=='true'){
        disableButton('call');
    }
        showFirstQuestion();
        iniciarCronometro();
        mostrarTiempo(); 
        iniciarCuentaRegresiva();


    }
    if(currentPage=="index.php" || currentPage==""){
        showIndexButtons();
        resetearCronometro();
        resetButtons();
    }
    /*if(currentPage=="win.php"){
        console.log("entra1");
        sendValue(tiempo);
    }*/
};
function showIndexButtons(){
    document.getElementById('buttonRank').style.display='block';
    document.getElementById('buttonGame').style.display='block';
}
function showFirstQuestion(){
    document.getElementById('question1').style.display = 'block';
    document.getElementById('answers1').style.display = 'grid';
    document.getElementById('introQuestion1').style.display = 'block';
}
function good(numberOfQuestion){
    countofGoods=numberOfQuestion;
    document.getElementById('correct'+numberOfQuestion).style.display = 'block';
    var elements = document.getElementsByClassName('grid-item answer-good');
    elements[numberOfQuestion-1].style.backgroundColor = '#54bf58';
    let element = elementSound("soundAcert")
    playSound(element)
    document.getElementById('answers'+numberOfQuestion).style.pointerEvents = 'none';
    if(numberOfQuestion==3){
        detenerCuentaRegresiva();
        document.getElementById('buttons').style.display = 'block';
        document.getElementById('buttons').scrollIntoView({behavior:'smooth'});
        var wildcards = document.getElementsByClassName('wildcardsGame');
        wildcards[0].style.pointerEvents='none';
    }else{
    showQuestion(numberOfQuestion+1);
    }
}
function inicializeEndWin(){
    sendValue(tiempo,"win.php");
}
function inicializeEndLose(){
        sendValue(tiempo,"lose.php");
    
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
    if (element) {
        element.play();
    }
}

function loseSound(){
    let element = elementSound("soundLose")
    if (loser){
        playSound(element)
    }
}

function acertSound(){
    let element = elementSound("soundAcert")
    return playSound(element)
}
function showQuestion(numberOfQuestion){
    console.log(numberOfQuestion)
    document.getElementById('question'+numberOfQuestion).style.display = 'block';
    document.getElementById('answers'+numberOfQuestion).style.display = 'grid';
    document.getElementById('introQuestion'+numberOfQuestion).style.display = 'block';
    document.getElementById('question'+numberOfQuestion).scrollIntoView({behavior:'smooth'});
}

function winSound(){
    let element = elementSound("soundWin")
    if (victoria){
        playSound(element)
    }
}


function displayBlock(id){
    let question = document.getElementById(id);
    if (question.style.display === "none"){
        question.style.display = "block"
    }

}
function comodinPublic(){
    let element = elementSound("soundPublic")
    playSound(element)
}

function statisticsPublic(){
    let element = elementSound("soundStatistics")
    playSound(element)
}
function resetButtons(){
    localStorage.setItem('fiftyClicked', 'false');
    localStorage.setItem('publicClicked', 'false');
    localStorage.setItem('extraClicked', 'false');
    localStorage.setItem('callClicked', 'false');

}

function loseSound(){
    let element = elementSound("soundLose")
    playSound(element)
    
}
var tiempo = localStorage.getItem('tiempo') || 0;
var intervalo;
var intervalo2;
function iniciarCronometro() {
    intervalo = setInterval(function() {
        tiempo++;
        mostrarTiempo();
    }, 1000);
}

function detenerCronometro() {
    clearInterval(intervalo);
}

function resetearCronometro() {
    tiempo = 0;
    localStorage.setItem('tiempo', tiempo);
}

function mostrarTiempo() {
    let horas = Math.floor(tiempo / 3600);
    let minutos = Math.floor((tiempo % 3600) / 60);
    let segundos = tiempo % 60;

    document.getElementById("cronometro").textContent = `${String(horas).padStart(2, "0")}:${String(minutos).padStart(2, "0")}:${String(segundos).padStart(2, "0")}`;
    localStorage.setItem('tiempo', tiempo);
}

function sendValue(tiempo,document) {
    var xhr = new XMLHttpRequest();
xhr.open('POST', document, true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xhr.onload = function() {
  if (xhr.status === 200) {
    console.log('El formulario se envió con éxito');
    console.log(xhr.responseText);
  } else {
    console.error('Hubo un error al enviar el formulario');
  }
};

var params = 'time='+tiempo;
xhr.send(params);
}

function iniciarCuentaRegresiva() {
    var cronometroElemento = document.getElementById('cronometroAtras');
    intervalo2 = setInterval(function() {
      segundos--;
      cronometroElemento.textContent = "00:"+segundos;
  
      if (segundos === 0) {
        clearInterval(intervalo2);
        execFormTimeOver();
      }
    }, 1000);
  }
function detenerCuentaRegresiva() {
    clearInterval(intervalo2); 
  }
  function execFormTimeOver() {
    var form = document.getElementById("formTimeOver");
    form.elements['question'].value = countofGoods+1;
    form.submit();
    
}
var numOfRings=0;
function clickCall(language){
    detenerCronometro();
    detenerCuentaRegresiva();
    boton = document.getElementById("call")
    boton.style.pointerEvents='none';
    boton.style.backgroundColor= "#fff";
    localStorage.setItem('callClicked', 'true');
    let numRandom = Math.floor(Math.random() * 10) + 1;
    numOfRings = numRandom;
    showPhone(language);
    console.log(numRandom);
    setTimeout(function() {
        reproduceRing(numRandom);
    }, 2000);
    setTimeout(function() {
        document.getElementById("formPhone").style.display = 'block';
    }, 2000 +(5000*numRandom));
    
}
function sendRings(language){
    document.getElementById('startOfPhone').style.display = 'none';
    var numInput = document.querySelector("#inputRing").value;
    if (numInput == numOfRings) {
        document.getElementById('correctRing').style.display = 'block';
        good(countofGoods+1);
    } else {
        if(language=="catalan"){
            document.getElementById("incorrectRingMessage").innerText="¡Incorrecte! La resposta correcta era: "+ numOfRings;
        }
        else if(language=="spanish"){
            document.getElementById("incorrectRingMessage").innerText="¡Incorrecto! La respuesta correcta era: "+ numOfRings;

        }
        else if(language=="english"){
            document.getElementById("incorrectRingMessage").innerText="Wrong! The correct answer was: "+ numOfRings;
        }
        document.getElementById('wrongRing').style.display = 'block';
    }

}
function closePhone(){
document.getElementById('callPage').style.display = 'none';
iniciarCronometro();
iniciarCuentaRegresiva();
}
function reproduceRing(numVeces){
    let contador = 0;
    
    function playNextRing() {
        console.log("contador: ",contador);
        console.log("veces: ", numVeces);
        if (contador < numVeces) {
            let element = elementSound("soundPhone");
            doAnimation();
            playSound(element);
            contador++;
            setTimeout(playNextRing, 5500); 
        }
    }
    
    playNextRing();
}
function showPhone(language){
    if(language=="spanish"){
        document.getElementById("headPhone").innerText="¿Cuantas veces suena el teléfono?";
    }
    else if(language=="english"){
        document.getElementById("headPhone").innerText="How many times does the phone ring?";
    }
    else if(language=="catalan"){
        document.getElementById("headPhone").innerText="Cuantes vegades sona el telèfon?";
    }
    document.getElementById('callPage').style.display = 'block';
}
function doAnimation(){
    let animacion = [
        { transform: 'translate3d(-1px, 0, 0)' },
        { transform: 'translate3d(2px, 0, 0)' },
        { transform: 'translate3d(-4px, 0, 0)' },
        { transform: 'translate3d(4px, 0, 0)' }
    ];
    
    let elemento = document.getElementById("phonephoto"); // Asegúrate de tener un elemento con el id "miElemento"
    
    let animacionKeyframes = new KeyframeEffect(
      elemento,
      animacion,
      { duration: 1000, iterations: 3, fill: "forwards" }
    );
    
    let animacionGroup = new Animation(animacionKeyframes, document.timeline);
    
    animacionGroup.play();
}
function disableButton(buttonId) {
    const button = document.getElementById(buttonId);
    if (button) {
        button.style.pointerEvents = 'none';
        button.style.backgroundColor = "#fff";
    }
}
function inicializeButton(buttonId) {
    const button = document.getElementById(buttonId);
    if (button) {
        button.style.pointerEvents = 'block';
        button.style.backgroundColor = "#ffcc00";
    }
}
  function parteAEjecutar() {
    const answerBad = document.getElementsByClassName("answer-button");
    let arrayAnswer = [];

    for (let i = 0; i < answerBad.length; i++) {
        const pointerEventsValue = window.getComputedStyle(answerBad[i]).clientHeight;
        let clientHeight = answerBad[i].clientHeight;

        if (pointerEventsValue !== "none" && clientHeight !== 0) {
            arrayAnswer.push(i);
        }
    }

    console.log(arrayAnswer); // Muestra el contenido del array una vez terminado el bucle

    let deleteAnswer = arrayAnswer.slice(-3);
    let deleteIndex = Math.floor(Math.random() * deleteAnswer.length);
    deleteAnswer.splice(deleteIndex, 1);

    deleteAnswer.forEach(function (elemento) {
        document.getElementById(answerBad[elemento].id).style.display = 'none';
        document.getElementById(answerBad[elemento].id).style.pointerEvents = 'none';
    });
    }
function clickFifty(){
    boton = document.getElementById("fifty")
    boton.style.pointerEvents='none';
    boton.style.backgroundColor= "#fff";
    localStorage.setItem('fiftyClicked', 'true');
    parteAEjecutar()
}
function extraTime(){
    localStorage.setItem('extraClicked', 'true');
    boton = document.getElementById("extra")
    boton.style.pointerEvents='none';
    boton.style.backgroundColor= "#fff"; 
    segundos = segundos +30;
}
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

function clickPublic(){
    localStorage.setItem('publicClicked', 'true');
    detenerCuentaRegresiva();
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
function validateName() {
    document.getElementById('formUserName').addEventListener('submit', function(event) {
    var userName = document.getElementById('username').value;
    var forbiddenWords = ["coño", "puta", "joder", "franco", "hitler", "polla", "pene", "vagina", "follar", "sexo", "calvo", "chupapollas", "hijo de puta", "hija de puta", "tetas", "teta"];
    var minusName = userName.toLowerCase();
    for (var i = 0; i < forbiddenWords.length; i++) {
      if (minusName.includes(forbiddenWords[i])) {
        if (language=="spanish") {
            event.preventDefault();
            alert("El Input contiene una palabra prohibida, escriba otro Nombre");
        } else if (language=="catalan") {
            event.preventDefault();
            alert("L'Input conté una paraula prohibida, escriu un altre Nom");
        } else if (language=="english") {
            event.preventDefault();
            alert("The Input contains a prohibited word, type another Name")
        }
        break;
      }
    }
});
}
function openModal(){
    document.getElementById('modal').style.display = 'block';
    let element = elementSound("soundPublic")
    element.pause()
    statisticsPublic()
    iniciarCuentaRegresiva();
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';   
}

function getElementClass(classElement){
    const element = document.getElementsByClassName(classElement);
    return element
}
var clickCounter = 0;
function easterEgg(){
    clickCounter++;
    if (clickCounter === 10) {
        alert('EASTER EGG!!!')
        detenerCronometro();
    }
}

function public() {
    const answers = getElementClass("grid-item");
    let answersArrayEmpty = [];
    let answersArray = arrayCurrentAnswer(answers, answersArrayEmpty);
    let answerOk = getAnswerOk(answers, answersArray);
    numRandom = Math.floor(Math.random() * 10) + 1;
    let data1 = Math.floor(Math.random() * (70 - 50 + 1)) + 50;
    let data2 = Math.floor(Math.random() * (100 - data1));
    let data3 = Math.floor(Math.random() * (100 - data1 - data2));
    let data4 = 100 - (data1 + data2 + data3);

    let a, b, c, d;

    if (answersArray.length === 2) {
        let barras = {
            a: getElementClass("barra a"),
            b: getElementClass("barra b"),
            c: getElementClass("barra c"),
            d: getElementClass("barra d")
        };
        const arrayLetters = ["a", "b", "c", "d"];
        
        answersArray.forEach(element => {
            let barraName = "barra" + arrayLetters[element].toUpperCase();
        
            if (arrayLetters[element] === answerOk) {
                barras[arrayLetters[element]][0].style.height = "80%";
            } else {
                barras[arrayLetters[element]][0].style.height = "20%";
            }
        });
    } else {
        
        if (numRandom <= 8) {
            switch (answerOk) {
                case 'a':
                    a = data1;
                    b = data2;
                    c = data3;
                    d = data4;
                    generateStatistics(data1, data2, data3, data4);
                    break;
                case 'b':
                    a = data2;
                    b = data1;
                    c = data3;
                    d = data4;
                    generateStatistics(data2, data1, data3, data4);
                    break;
                case 'c':
                    a = data3;
                    b = data2;
                    c = data1;
                    d = data4;
                    generateStatistics(data3, data2, data1, data4);
                    break;
                case 'd':
                    a = data4;
                    b = data2;
                    c = data3;
                    d = data1;
                    generateStatistics(data4, data2, data3, data1);
                    break;
                default:
                    console.log("no corresponde a ninguna letra");
            }
            
        }
    }
}


function showMessage(event){
    event.preventDefault();
    let mensAddExit = document.getElementsByClassName("mensAddExit")
    let mensErrorAdd = document.getElementsByClassName("mensErrorAdd")
    let mensTypeFile = document.getElementsByClassName("mensTypeFile")
    let mensNoImg = document.getElementsByClassName("mensNoImg")

    mensAddExit[0].style.display = "block";
    mensErrorAdd[0].style.display = "block";
    mensTypeFile[0].style.display = "block";
    mensNoImg[0].style.display = "block";

}
