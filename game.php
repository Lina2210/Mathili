<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play</title>
</head>
<body>
    <?php
        $language="catalan";
        $level=1;
        $arrayOfQuestionsAndAnswers = choose3RandomQuestionsandAnswers($level,$language);
        /*writeHtml($arrayOfQuestionsAndAnswers);
        showQuestion();
        $cont=0;
        $file = fopen("AllQuestions/catalan_1.txt", "r");
        while ($line = fgets($file)) {
            $firstCharacter= substr($line, 0, 1);
            if($firstCharacter=="*"){
                $cont++;
                $id="question";
            }
            elseif($firstCharacter=="-"){
                $id="answerBad";
            }
            elseif($firstCharacter=="+"){
                $id="answerGood";
            }
            if($cont==4){
                break;
            }
            $lineToPrint = substr($line, 1, strlen($line));
            echo "<h1 id='$id'>$lineToPrint</h1>";
        }*/
        function choose3RandomQuestionsandAnswers($level,$language){
            $cuantityOfQuestions=0;
            $arrayOfLines=[];
            $file = fopen( "AllQuestions/" . $language . "_" . $level . ".txt", "r");
            while ($line = fgets($file)) {
                if(substr($line, 0, 1)=="*"){
                    $cuantityOfQuestions++;
                }
                array_push($arrayOfLines,$line);
            }
            $numberOfQuestion1=rand(0,$cuantityOfQuestions);
            $numberOfQuestion2=rand(0,$cuantityOfQuestions);
            $numberOfQuestion3=rand(0,$cuantityOfQuestions);
            while($numberOfQuestion1 == $numberOfQuestion2 && $numberOfQuestion1 == $numberOfQuestion3 && $numberOfQuestion2 == $numberOfQuestion3){
                $numberOfQuestion1=rand(0,$cuantityOfQuestions);
                $numberOfQuestion2=rand(0,$cuantityOfQuestions);
                $numberOfQuestion3=rand(0,$cuantityOfQuestions);
            }
            echo 
        }
    ?>
</body>
</html>