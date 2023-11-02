let countofGoods=0;
window.onload = function() {
    const currentURL = window.location.href;
    const currentPage = currentURL.substring(currentURL.lastIndexOf('/') + 1);
    if(currentPage=="game.php"){
        showFirstQuestion();
        iniciarCronometro();
        mostrarTiempo(); 
        iniciarCuentaRegresiva();
    }
    if(currentPage=="index.php" || currentPage==""){
        resetearCronometro();
    }
};

    if (localStorage.getItem('fiftyClicked')=='true') {
        disableButton('fifty');
    }//else{inicializeButton('fifty');}
    if (localStorage.getItem('publicClicked')=='true') {
        disableButton('public');
    }//else{inicializeButton('public');}
    if (localStorage.getItem('extraClicked')=='true') {
        disableButton('extra');
    }//else{inicializeButton('extra');}
        showFirstQuestion();
        iniciarCronometro();
        mostrarTiempo(); 
        iniciarCuentaRegresiva();


    }
    if(currentPage=="index.php" || currentPage==""){
        resetearCronometro();
        resetButtons();
    }
    /*if(currentPage=="win.php"){
        console.log("entra1");
        sendValue(tiempo);
    }*/
};
function showFirstQuestion(){
    document.getElementById('question1').style.display = 'block';
    document.getElementById('answers1').style.display = 'grid';
    document.getElementById('introQuestion1').style.display = 'block';
}
function good(numberOfQuestion){
    countofGoods++;
    document.getElementById('correct'+numberOfQuestion).style.display = 'block';
    let element = elementSound("soundAcert")
    playSound(element)
    document.getElementById('answers'+numberOfQuestion).style.pointerEvents = 'none';
    if(numberOfQuestion==3){
        detenerCuentaRegresiva();
        document.getElementById('buttons').style.display = 'block';
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
    document.getElementById('question'+numberOfQuestion).scrollIntoView({behavior:'smooth'});
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
function comodinPublic(){
    let element = elementSound("soundPublic")
    playSound(element)
}

function statisticsPublic(){
    let element = elementSound("soundStatistics")
    playSound(element)
}
function resetButtons(){
    console.log("okkkkk");
    localStorage.setItem('fiftyClicked', 'false');
    localStorage.setItem('publicClicked', 'false');
    localStorage.setItem('extraClicked', 'false');

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

let tiempo = localStorage.getItem('tiempo') || 0;
let intervalo;
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
    var segundos = 30;
    var cronometroElemento = document.getElementById('cronometroAtras');
    intervalo2 = setInterval(function() {
      segundos--;
      cronometroElemento.textContent = "00:"+segundos;
  
      if (segundos === 0) {
        clearInterval(intervalo2);
        alert("implementar lose");
      }
    }, 1000);
  }
function detenerCuentaRegresiva() {
    clearInterval(intervalo2); 
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

var clickCounter = 0;
function easterEgg() {
    clickCounter++;
    if (clickCounter === 10) {
        alert('EASTER EGG!!!')
        detenerCronometro();
    }
}
