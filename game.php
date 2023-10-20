<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="style.css">
    <script src="script.js"></script>
    <title>Play</title>
</head>
<body>
    <audio id="soundWin">
        <source src="Sounds/win.mp3" type="audio/mpeg">
    </audio>

    <audio id="soundLose">
        <source src="Sounds/080047_lose_funny_retro_video-game-80925.mp3" type="audio/mpeg">
    </audio>

    <audio id="soundAcert">
        <source src="Sounds/qacer.mp3" type="audio/mpeg">
    </audio>
    <?php
        $language="catalan";
        $level=1;
        $arrayOfQuestionsAndAnswers = choose3RandomQuestionsandAnswers($level,$language);
        writeHtml($arrayOfQuestionsAndAnswers,$language);



        function writeHtml($arrayOfQuestionsAndAnswers, $language){
            $numberOfQuestion = 0;
            foreach($arrayOfQuestionsAndAnswers as $lineOfInformation){
                if(substr($lineOfInformation,0,1)=="*"){
                    $numberOfQuestion++;
                    echo "</div>";
                    $question= substr($lineOfInformation,1,strlen($lineOfInformation));
                    echo "<h3 id=question$numberOfQuestion style=\"display: none;\"> $question</h3>";
                    echo "<div id=$numberOfQuestion style=\"display: none;\">";
                }
                if(substr($lineOfInformation,0,1)=="-"){
                    $answer= substr($lineOfInformation,1,strlen($lineOfInformation));
                    echo "<button onclick='bad()' class='grid-item' id='answerBad'>$answer</button>";
                }
                if(substr($lineOfInformation,0,1)=="+"){
                    $answer= substr($lineOfInformation,1,strlen($lineOfInformation));
                    echo "<button onclick='good()' class='grid-item' id='answerGood'>$answer</button>";
                }
                
            }
            echo "</div>";
            echo"<div id=buttons style=\"display: none;\">";
            if($language=="catalan"){
                echo "<button>Següents preguntes</button>";
                echo "<button>Tornar a l'inici</button>";
            }
            elseif($language=="english"){
                echo "<button>Next questions</button>";
                echo "<button>Return home</button>";
            }
            elseif($language=="spanish"){
                echo "<button>Siguientes preguntas</button>";
                echo "<button>Volver al inicio</button>";
            }
            echo"</div>";
            if($language=="catalan"){
                echo "<h2 id=correct style=\"display: none;\">CORRECTE</h2>";
                echo "<h2 id=wrong style=\"display: none;\">INCORRECTE</h2>";
            }
            elseif($language=="english"){
                echo "<h2 id=correct style=\"display: none;\">CORRECT</h2>";
                echo "<h2 id=wrong style=\"display: none;\">WRONG</h2>";
            }
            elseif($language=="spanish"){
                echo "<h2 id=correct style=\"display: none;\">CORRECTO</h2>";
                echo "<h2 id=wrong style=\"display: none;\">INCORRECTO</h2>";
            }
        }
        
        
        
        
        
        function choose3RandomQuestionsandAnswers($level,$language){
            $cuantityOfQuestions=0;
            $arrayOfLines=[];
            $arrayOfQuestions=[];
            $arrayOf3RandomQuestionsandAnswers=[];
            $threeRandomQuestionsAndAnswers=[];
            $file = fopen( "AllQuestions/" . $language . "_" . $level . ".txt", "r");
            while ($line = fgets($file)) {
                if(substr($line, 0, 1)=="*"){
                    $cuantityOfQuestions++;
                    array_push($arrayOfQuestions,$line);
                }
                array_push($arrayOfLines,$line);
            }
            $numberOfQuestion1=rand(0,count($arrayOfQuestions));
            $numberOfQuestion2=rand(0,count($arrayOfQuestions));
            $numberOfQuestion3=rand(0,count($arrayOfQuestions));
            while($numberOfQuestion1 == $numberOfQuestion2 || $numberOfQuestion1 == $numberOfQuestion3 || $numberOfQuestion2 == $numberOfQuestion3){
                $numberOfQuestion1=rand(0,count($arrayOfQuestions));
                $numberOfQuestion2=rand(0,count($arrayOfQuestions));
                $numberOfQuestion3=rand(0,count($arrayOfQuestions));
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
    ?>
</body>
</html>