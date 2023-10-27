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
    <div id="wildCard">
        <button>50/50</button>
    </div>
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
                    echo "<h3 id=question$numberOfQuestion style=\"display: none;\"> $question</h3>";
                    echo "<div id=answers$numberOfQuestion style=\"display: none;\">";
                }
                if(substr($lineOfInformation,0,1)=="-"){
                    $answer= substr($lineOfInformation,1,strlen($lineOfInformation));
                    echo "<form action='lose.php' method='POST'>";
                        echo "<input type='hidden' name='question' value=$numberOfQuestion>";
                        echo "<input type='hidden' name='language' value=$language>";
                        echo "<button onclick='bad($numberOfQuestion)' class='grid-item' id='answerBad'>$answer</button>";
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