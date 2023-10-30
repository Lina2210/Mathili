<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="style.css">
    <script src="script.js"></script>
    <title>Play</title>
</head>
<body>
    <audio id="soundLose">
        <source src="Sounds/080047_lose_funny_retro_video-game-80925.mp3" type="audio/mpeg">
    </audio>

    <audio id="soundAcert">
        <source src="Sounds/qacer.mp3" type="audio/mpeg">
    </audio>
    <?php
    session_start();
        /*if(isset($_SESSION['points'])){
            $points=$_SESSION['points'];
        }else{
            $_SESSION['points']=0;
        }*/
        $language = $_SESSION['language'];
        $level = $_SESSION['level'];
        if ($language=="spanish") {
            $extraTime = "TIEMPO EXTRA";
            $audience = "PÚBLICO";
        } elseif ($language=="catalan") {
            $extraTime = "TEMPS EXTRA";
            $audience = "PÚBLIC";
        } elseif ($language=="english") {
            $extraTime = "EXTRA TIME";
            $audience = "AUDIENCE";
        }
        echo "<div class='wildcardsGame'>";
        echo "<button id='fifty' onclick='clickFifty()'>50%</button>";
        echo "<button onclick=''>$extraTime</button>";
        echo "<button onclick=''>$audience</button>";
        echo "</div>";
        $arrayOfQuestionsAndAnswers = choose3RandomQuestionsandAnswers($level,$language);
        writeHtml($arrayOfQuestionsAndAnswers,$language,$level);
        $_SESSION['level']=++$level;
        
        

        function writeHtml($arrayOfQuestionsAndAnswers, $language,$level){
            $numberOfQuestion = 0;
            $correctmessage=correctmessage($language);
            $wrongmessage=wrongmessage($language);
            foreach($arrayOfQuestionsAndAnswers as $lineOfInformation){
                if(substr($lineOfInformation,0,1)=="*"){
                    echo "<h2 id=correct$numberOfQuestion style=\"display: none;\">$correctmessage</h2>";
                    echo "<h2 id=wrong$numberOfQuestion style=\"display: none;\">$wrongmessage</h2>";
                    $numberOfQuestion++;
                    echo "</div>";
                    $question= substr($lineOfInformation,1,strlen($lineOfInformation));
                    echo "<div id='introQuestion$numberOfQuestion' style=\"display:none;\">";
                    echo "<h3 id=question$numberOfQuestion style=\"display: none;\"> $question</h3>";
                    /* level1 */
                    if(trim(substr($lineOfInformation,2))=="¿En qué siglo se creó el fútbol?" || trim(substr($lineOfInformation,2))=="En quin segle es va crear el futbol?" || trim(substr($lineOfInformation,2))=="In What Century Was Soccer Created?") {
                        echo "<img src='public/fotos preguntas/1/In What Century Was Soccer Created.jpg' alt='In What Century Was Soccer Created'>";
                    } elseif(trim(substr($lineOfInformation,2))=="¿Qué hizo Gandhi por el mundo?" || trim(substr($lineOfInformation,2))=="Què va fer Gandhi pel món?" || trim(substr($lineOfInformation,2))=="What Did Gandhi Do For The World?") {
                        echo "<img src='public/fotos preguntas/1/What Did Gandhi Do For The World.PNG' alt='What Did Gandhi Do For The World'>";
                    } elseif(trim(substr($lineOfInformation,2))=='¿Quiénes fueron los que utilizaron la palabra “alborigen”?' || trim(substr($lineOfInformation,2))=='Qui van ser els que van utilitzar la paraula "alborigen"?' || trim(substr($lineOfInformation,2))=='Who Were The Ones Who Used The Word "Alborigen"?') {
                        echo "<img src='public/fotos preguntas/1/Who Were The Ones Who Used The Word  Alborigen .webp' alt='Who Were The Ones Who Used The Word  Alborigen'>";
                    }
                    /* level2 */
                    if(trim(substr($lineOfInformation,2))=="¿Cuánto duró aproximadamente la guerra entre Palestina e Israel?" || trim(substr($lineOfInformation,2))=="Quant de temps va durar aproximadament la guerra entre Palestina i Israel?" || trim(substr($lineOfInformation,2))=="Approximately How Long Did The War Between Palestine And Israel Last?") {
                        echo "<img src='public/fotos preguntas/2/Approximately How Long Did The War Between Palestine And Israel Last.jpg' alt='Approximately How Long Did The War Between Palestine And Israel Last>";
                    } elseif(trim(substr($lineOfInformation,2))=="¿Cuántos territorios conquistó el Imperio Británico?" || trim(substr($lineOfInformation,2))=="Quants territoris va conquerir l'Imperi Britànic?" || trim(substr($lineOfInformation,2))=="How Many Territories Did The British Empire Conquer?") {
                        echo "<img src='public/fotos preguntas/2/How Many Territories Did The British Empire Conquer.jpg' alt='How Many Territories Did The British Empire Conquer'>";
                    } elseif(trim(substr($lineOfInformation,2))=='¿Qué come habitualmente el Reino Unido?' || trim(substr($lineOfInformation,2))=='Què menja normalment el Regne Unit?' || trim(substr($lineOfInformation,2))=='What Do The Uk Usually Eat?') {
                        echo "<img src='public/fotos preguntas/2/What Do The Uk Usually Eat.jpg' alt='What Do The Uk Usually Eat'>";
                    }
                    /* level3 */
                    if(trim(substr($lineOfInformation,2))=="¿Mejor sistema educativo?" || trim(substr($lineOfInformation,2))=="Millor sistema educatiu?" || trim(substr($lineOfInformation,2))=="Better Education System?") {
                        echo "<img src='public/fotos preguntas/3/Better Education System.jpg' alt='Better Education System'>";
                    } elseif(trim(substr($lineOfInformation,2))=="¿Más horas trabajando?" || trim(substr($lineOfInformation,2))=="Més hores de treball?" || trim(substr($lineOfInformation,2))=="More Hours Working?") {
                        echo "<img src='public/fotos preguntas/3/More Hours Working.jpg' alt='More Hours Working'>";
                    } elseif(trim(substr($lineOfInformation,2))=='¿Más población?' || trim(substr($lineOfInformation,2))=='Més població?' || trim(substr($lineOfInformation,2))=='More Population?') {
                        echo "<img src='public/fotos preguntas/3/More Population.jpeg' alt='More Population'>";
                    }
                    /* level4 */
                    if(trim(substr($lineOfInformation,2))=="Cuantas copas del mundo ha ganado Inglaterra?" || trim(substr($lineOfInformation,2))=="Quantes Copes del Món ha guanyat Anglaterra?" || trim(substr($lineOfInformation,2))=="How many world cups has England win?") {
                        echo "<img src='public/fotos preguntas/4/How many world cups has England win.jpeg' alt='How many world cups has England win'>";
                    } elseif(trim(substr($lineOfInformation,2))=="Que pais consume mas te anualmente?" || trim(substr($lineOfInformation,2))=="Quin país consumeix més te anualment?" || trim(substr($lineOfInformation,2))=="Which country consumes more tea annually?") {
                        echo "<img src='public/fotos preguntas/4/Which country consumes more tea annually.webp' alt='Which country consumes more tea annually'>";
                    } elseif(trim(substr($lineOfInformation,2))=='En que direccion conducen los ingleses?' || trim(substr($lineOfInformation,2))=='En quin costat condueixen les persones angleses?' || trim(substr($lineOfInformation,2))=='Which way do the English people drive?') {
                        echo "<img src='public/fotos preguntas/4/Which way do the English people drive.jpg' alt='Which way do the English people drive'>";
                    }
                    /* level5 */
                    if(trim(substr($lineOfInformation,2))=="¿Son los británicos puntuales?" || trim(substr($lineOfInformation,2))=="Són els britànics puntuals?" || trim(substr($lineOfInformation,2))=="Are the British punctual?") {
                        echo "<img src='public/fotos preguntas/5/Are the British punctual.webp' alt='Are the British punctual'>";
                    } elseif(trim(substr($lineOfInformation,2))=="¿De qué se trata la tradición del Rolling Cheese?" || trim(substr($lineOfInformation,2))=="De què tracta la tradició del Rolling Cheese?" || trim(substr($lineOfInformation,2))=="What is the Rolling Cheese tradition about?") {
                        echo "<img src='public/fotos preguntas/5/What is the Rolling Cheese tradition about.png' alt='What is the Rolling Cheese tradition about'>";
                    } elseif(trim(substr($lineOfInformation,2))=='¿Qué jugador australiano tiene el salario más alto?' || trim(substr($lineOfInformation,2))=='Quin jugador australià té el salari més alt?' || trim(substr($lineOfInformation,2))=='Which Australian player has the highest salary?') {
                        echo "<img src='public/fotos preguntas/5/Which Australian player has the highest salary.jpg'> alt='Which Australian player has the highest salary'";
                    }
                    /* level6 */
                    if(trim(substr($lineOfInformation,2))=="¿Qué territorio africano fue conquistado en el siglo XIX por Inglaterra?" || trim(substr($lineOfInformation,2))=="Quin territori africà va conquistar Anglaterra al segle XIX?" || trim(substr($lineOfInformation,2))=="What African territory did England conquer in the 19th century?") {
                        echo "<img src='public/fotos preguntas/6/What African territory did England conquer in the 19th century.jpeg' alt='What African territory did England conquer in the 19th century'>";
                    } elseif(trim(substr($lineOfInformation,2))=="¿Dónde se encuentra el palacio de Buckingham?" || trim(substr($lineOfInformation,2))=="A on es localitza el palau de Buckingham?" || trim(substr($lineOfInformation,2))=="Where is Buckingham Palace located?") {
                        echo "<img src='public/fotos preguntas/6/Where is Buckingham Palace located.jpg' alt='Where is the big ben located'>";
                    } elseif(trim(substr($lineOfInformation,2))=='¿Dónde está localizado el Big Ben?' || trim(substr($lineOfInformation,2))=='A on es troba el Big Ben?' || trim(substr($lineOfInformation,2))=='Where is the big ben located?') {
                        echo "<img src='public/fotos preguntas/6/Where is the big ben located.jpg'> alt='Where is the big ben located'";
                    }
                    echo "</div>";
                    echo "<div id=answers$numberOfQuestion style=\"display: none;\">";
                }
                if(substr($lineOfInformation,0,1)=="-"){
                    $answer= substr($lineOfInformation,1,strlen($lineOfInformation));
                    echo "<form action='lose.php' method='POST'>";
                        echo "<input type='hidden' name='question' value=$numberOfQuestion>";
                        echo "<input type='hidden' name='language' value=$language>";
                        echo "<button onclick='bad($numberOfQuestion)' class='grid-item answer-button' id='answerBad'>$answer</button>";
                    echo "</form>";
                }
                if(substr($lineOfInformation,0,1)=="+"){
                    $answer= substr($lineOfInformation,1,strlen($lineOfInformation));
                    echo "<button onclick='good($numberOfQuestion)' class='grid-item' id='answerGood'>$answer</button>";
                }
                
            }
            echo "<h2 id=correct$numberOfQuestion style=\"display: none;\">$correctmessage</h2>";
            echo "<h2 id=wrong$numberOfQuestion style=\"display: none;\">$wrongmessage</h2>";
            echo "</div>";
            echo"<div id=buttons style=\"display: none;\">";
        
            if($level==6){
                if($language=="catalan"){
                    echo "<form action='win.php' method='POST'>";
                        echo "<input type='hidden' name='language' value=$language>";
                        echo "<button>Finalitzar Partida</button>";
                    echo "</form>";
            }
            elseif($language=="english"){
                    echo "<form action='win.php' method='POST'>";
                        echo "<input type='hidden' name='language' value=$language>";
                        echo "<button>End Game</button>";
                    echo "</form>";
            }
            elseif($language=="spanish"){
                    echo "<form action='win.php' method='POST'>";
                        echo "<input type='hidden' name='language' value=$language>";
                        echo "<button>Finalizar Partida</button>";
                    echo "</form>";
            }

            }else{
                if($language=="catalan"){
                    echo "<form action='game.php' method='POST'>";
                        echo "<button>Següents Preguntes</button>";
                    echo "</form>";
                }
                elseif($language=="english"){
                        echo "<form action='game.php' method='POST'>";
                            echo "<button>Next Question</button>";
                        echo "</form>";
                }
                elseif($language=="spanish"){
                        echo "<form action='game.php' method='POST'>";
                            echo "<button>Siguientes Preguntas</button>";
                        echo "</form>";
                }
            }
            echo"</div>";
            
        }
        
        
        
        
        
        function choose3RandomQuestionsandAnswers($level,$language){
            $cuantityOfQuestions=0;
            $arrayOfLines=[];
            $arrayOfQuestions=[];
            $arrayOf3RandomQuestionsandAnswers=[];
            $threeRandomQuestionsAndAnswers=[];
            $nameOfFile= "AllQuestions/" . $language . "_" . $level . ".txt";
            structureFile($nameOfFile);
            $file = fopen($nameOfFile, "r");
            while ($line = fgets($file)) {
                if(substr($line, 0, 1)=="*"){
                    $cuantityOfQuestions++;
                    array_push($arrayOfQuestions,$line);
                }
                array_push($arrayOfLines,$line);
            }
            $numberOfQuestion1=rand(0,count($arrayOfQuestions)-1);
            $numberOfQuestion2=rand(0,count($arrayOfQuestions)-1);
            $numberOfQuestion3=rand(0,count($arrayOfQuestions)-1);
            while($numberOfQuestion1 == $numberOfQuestion2 || $numberOfQuestion1 == $numberOfQuestion3 || $numberOfQuestion2 == $numberOfQuestion3){
                $numberOfQuestion1=rand(0,count($arrayOfQuestions)-1);
                $numberOfQuestion2=rand(0,count($arrayOfQuestions)-1);
                $numberOfQuestion3=rand(0,count($arrayOfQuestions)-1);
            }

            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion1],$arrayOfLines)]);           
            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion1],$arrayOfLines)+1]);
            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion1],$arrayOfLines)+2]);
            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion1],$arrayOfLines)+3]);
            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion1],$arrayOfLines)+4]);
            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion2],$arrayOfLines)]);           
            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion2],$arrayOfLines)+1]);
            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion2],$arrayOfLines)+2]);
            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion2],$arrayOfLines)+3]);
            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion2],$arrayOfLines)+4]);
            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion3],$arrayOfLines)]);           
            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion3],$arrayOfLines)+1]);
            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion3],$arrayOfLines)+2]);
            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion3],$arrayOfLines)+3]);
            array_push($arrayOf3RandomQuestionsandAnswers,$arrayOfLines[array_search($arrayOfQuestions[$numberOfQuestion3],$arrayOfLines)+4]);
            return($arrayOf3RandomQuestionsandAnswers);

        }
        function cleanNewlinesInFile($file){
            $content = file_get_contents($file);
            // Reemplazar saltos de línea múltiples por un solo salto de línea
            $content = preg_replace("/(\r?\n)+/", "\n", $content);
            // Escribir el contenido modificado nuevamente en el archivo
            file_put_contents($file, $content);
        }

        function removeInitialSpaces($file){
            $content = file_get_contents($file);
            // Reemplazar saltos de línea múltiples por un solo salto de línea
            $content = preg_replace('/^\h+/m', '', $content);
            // Escribir el contenido modificado nuevamente en el archivo
            file_put_contents($file, $content);

        }

        function structureFile($file){
            cleanNewlinesInFile($file);
            removeInitialSpaces($file);
        }
        function correctmessage($language){
            if($language=="catalan"){
                return "CORRECTE";
            }
            elseif($language=="english"){
                return "CORRECT";
            }
            elseif($language=="spanish"){
                return "CORRECTO";
            }
        }
        function wrongmessage($language){
            if($language=="catalan"){
                return "INCORRECTE";
            }
            elseif($language=="english"){
                return "WRONG";
            }
            elseif($language=="spanish"){
                return "INCORRECTO";
            }
        }
    ?>
</body>
</html>