<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Quien Quiere Ser Millonario?</title>
    <link rel="icon" href="public/dolar.png" type="image/png">

</head>
<body>
        <?php
        if(isset($_POST['language'])){
            $language= $_POST['language'];
        }else{
            $language= "spanish";
        }

        session_destroy();
        session_start();
        $_SESSION['language'] = $language;
        $_SESSION['level'] = 1;
        if($language=="spanish"){
            echo "<div class='lengButton'>";
            echo "<p>Lenguaje: </p>";
            echo "<form action='index.php' method='POST'>";
                echo "<button id='espanol' name='language' value='spanish'><img src='public/spanishFlag.png'></button>";
                echo "<button id='english' name='language' value='english'><img src='public/englishFlag.jpg'></button>";
                echo  "<button id='catalan' name='language' value='catalan'><img src='public/catalanFlag.png'></button>";
            echo "</form>";
            echo "</div>";
            echo "<noscript>";
            echo "<div id='mensaje-js'>";
            echo "<p>¡JavaScript está deshabilitado en su navegador! Habilite JavaScript para jugar al Juego.</p>";
            echo "</div>";
            echo "</noscript>";
            echo "<h1 class='titIndex'>QUIEN QUIERE SER MILLONARIO?</h1>";
            echo "<div class='brief'>";
            echo "<div class='instructions'>";
            echo "<h3>Instrucciones:</h3>";
            echo "<ul>";
            echo "<li>Primero de todo, decida el lenguaje con el que va a jugar, puede jugar en inglés, castellano o catalán, el lenguaje solo se podrá cambiar en el menú de inicio</li>";
            echo "<li>Una vez elegido el lenguaje, puede iniciar el juego dándole al botón de JUGAR</li>";
            echo "<li>Cuando le des a JUGAR, le llevará a la página del juego donde saldrá ya la pregunta y sus respectivas posibles respuestas donde una será la correcta</li>";
            echo "<li>Si fallas la pregunta, habrás perdido y no podrás continuar, después aparecerán unos botones para volver al inicio o para guardar tus estadísticas en un ránking, donde le pedirá un nombre de usuario y seguidamente podrá volver al inicio</li>";
            echo "<li>Si aciertas la pregunta podrás continuar, aparecerá abajo otra pregunta de la misma dificultad y sus respuestas. Si acierta las 3 de la misma dificultad, podrá pasar al siguiente nivel, donde se borrarán las preguntas y aparecerá una nueva pregunta y será del mismo formato</li>";
            echo "<li>Finalmente, si ha respondido las 18 preguntas correctamente, habrá ganado y le llevará a una página de ganador donde podrá guardar sus estadísticas o volver al inicio</li>";
            echo "</ul>";
            echo "</div>";
            echo "<div class='briefImage'>";
            echo "<img src='public/chica-riendo-feliz-chaqueta-mezclilla-billetes-voladores-alrededor.jpg'>";
            echo "</div>";
            echo "</div>";
            echo "<div class='buttonsIndex'>";
            echo "<form id='buttonGame' action='game.php' method='POST' style=\"display: none;\">";
            echo "<a href='game.php'>JUGAR</a>";
            echo "</form>";
            echo "<form id='buttonRank' action='ranking.php' method='POST' style=\"display: none;\">";
            echo "<a href='ranking.php'>Hall of Fame</a>";
            echo "</form>";
            echo "</div>";
        }
        elseif($language=="catalan"){
            echo "<div class='lengButton'>";
            echo "<p>Llenguatge: </p>";
            echo "<form action='index.php' method='POST'>";
                echo "<button id='espanol' name='language' value='spanish'><img src='public/spanishFlag.png'></button>";
                echo "<button id='english' name='language' value='english'><img src='public/englishFlag.jpg'></button>";
                echo  "<button id='catalan' name='language' value='catalan'><img src='public/catalanFlag.png'></button>";
            echo "</form>";
            echo "</div>";
            echo "<noscript>";
            echo "<div id='mensaje-js'>";
            echo "<p>JavaScript està deshabilitat al vostre navegador! Habiliteu JavaScript per jugar al Joc.</p>";
            echo "</div>";
            echo "</noscript>";
            echo "<h1 class='titIndex'>QUI VOL SER MILLONARI?</h1>";
            echo "<div class='brief'>";
            echo "<div class='instructions'>";
            echo "<h3>Instruccions:</h3>";
            echo "<ul>";
            echo "<li>Primer de tot, decideixi el llenguatge amb què jugarà, pot jugar en anglès, castellà o català, el llenguatge només es podrà canviar al menú d'inici</li>";
            echo "<li>Un cop triat el llenguatge, podeu iniciar el joc donant-li al botó de JUGAR</li>";
            echo "<li>Quan li donis a JUGAR, el portarà a la pàgina del joc on sortirà ja la pregunta i les seves respostes possibles on una serà la correcta</li>";
            echo "<li>Si falles la pregunta, hauràs perdut i no podràs continuar, després apareixeran uns botons per tornar a l'inici o per desar les estadístiques en un rànquing, on demanarà un nom d'usuari i seguidament podrà tornar a l'inici</li>";
            echo "<li>Si encertes la pregunta podràs continuar, apareixerà avall una altra pregunta de la mateixa dificultat i les respostes. Si encerteu les 3 de la mateixa dificultat, podreu passar al següent nivell, on s'esborraran les preguntes i apareixerà una nova pregunta i serà del mateix format</li>";
            echo "<li>Finalment, si heu respost les 18 preguntes correctament, haureu guanyat i us portarà a una pàgina de guanyador on podreu guardar les vostres estadístiques o tornar a l'inici</li>";
            echo "</ul>";
            echo "</div>";
            echo "<div class='briefImage'>";
            echo "<img src='public/chica-riendo-feliz-chaqueta-mezclilla-billetes-voladores-alrededor.jpg'>";
            echo "</div>";
            echo "</div>";
            echo "<div class='buttonsIndex'>";
            echo "<form id='buttonGame' action='game.php' method='POST' style=\"display: none;\">";
            echo "<a href='game.php'>JUGAR</a>";
            echo "</form>";
            echo "<form id='buttonRank' action='ranking.php' method='POST' style=\"display: none;\">";
            echo "<a href='ranking.php'>Hall of Fame</a>";
            echo "</form>";
            echo "</div>";
        }
        elseif($language=="english"){
            echo "<div class='lengButton'>";
            echo "<p>Language: </p>";
            echo "<form action='index.php' method='POST'>";
                echo "<button id='espanol' name='language' value='spanish'><img src='public/spanishFlag.png'></button>";
                echo "<button id='english' name='language' value='english'><img src='public/englishFlag.jpg'></button>";
                echo  "<button id='catalan' name='language' value='catalan'><img src='public/catalanFlag.png'></button>";
            echo "</form>";
            echo "</div>";
            echo "<noscript>";
            echo "<div id='mensaje-js'>";
            echo "<p>Javascript is disabled on your browser! Please enable JavaScript to play the Game.</p>";
            echo "</div>";
            echo "</noscript>";
            echo "<h1 class='titIndex'>WHO WANTS TO BE A MILLIONAIRE?</h1>";
            echo "<div class='brief'>";
            echo "<div class='instructions'>";
            echo "<h3>Instructions:</h3>";
            echo "<ul>";
            echo "<li>First of all, decide the language you are going to play with, you can play in English, Spanish or Catalan, the language can only be changed in the start menu</li>";
            echo "<li>Once you have chosen the language, you can start the game by clicking the PLAY button</li>";
            echo "<li>When you click PLAY, it will take you to the game page where the question and its respective possible answers will appear, where one will be the correct one.</li>";
            echo "<li>If you fail the question, you will have lost and will not be able to continue. Afterwards, buttons will appear to return to the start or to save your statistics in a ranking, where it will ask you for a username and then you can return to the start.</li>";
            echo "<li>If you get the question right you will be able to continue, another question of the same difficulty and its answers will appear below. If you get all 3 of the same difficulty correct, you will be able to go to the next level, where the questions will be deleted and a new question will appear and it will be of the same format.</li>";
            echo "<li>Finally, if you have answered all 18 questions correctly, you will have won and will be taken to a winner page where you can save your statistics or return to the start</li>";
            echo "</ul>";
            echo "</div>";
            echo "<div class='briefImage'>";
            echo "<img src='public/chica-riendo-feliz-chaqueta-mezclilla-billetes-voladores-alrededor.jpg'>";
            echo "</div>";
            echo "</div>";
            echo "<div class='buttonsIndex'>";
            echo "<form id='buttonGame' action='game.php' method='POST' style=\"display: none;\">";
            echo "<a href='game.php'>PLAY</a>";
            echo "</form>";
            echo "<form id='buttonRank' action='ranking.php' method='POST' style=\"display: none;\">";
            echo "<a href='ranking.php'>Hall of Fame</a>";
            echo "</form>";
            echo "</div>";
        }
 
        ?>
        <script src="script.js"></script>
</body>
</html>