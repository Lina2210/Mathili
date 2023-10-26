
window.onload = function() {
    showFirstQuestion();
    iniciarCronometro();
    mostrarTiempo();
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

function loseSound(){
    let element = elementSound("soundLose")
    playSound(element)
    
}
let tiempo = localStorage.getItem('tiempo') || 0;
let intervalo;

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
    mostrarTiempo();
}

function mostrarTiempo() {
    let horas = Math.floor(tiempo / 3600);
    let minutos = Math.floor((tiempo % 3600) / 60);
    let segundos = tiempo % 60;

    document.getElementById("cronometro").textContent = `${String(horas).padStart(2, "0")}:${String(minutos).padStart(2, "0")}:${String(segundos).padStart(2, "0")}`;
    localStorage.setItem('tiempo', tiempo);
}

//document.getElementById("iniciar").addEventListener("click", iniciarCronometro);
//document.getElementById("detener").addEventListener("click", detenerCronometro);
//document.getElementById("resetear").addEventListener("click", resetearCronometro);