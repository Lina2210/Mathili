<!DOCTYPE html>
<html>
<head>
    <title>Phone Call</title>
    <style>

        .callPage {
            
            display: none; /* Por defecto, ocultar el modal */
            flex-direction: column;
            justify-content: center;
            align-items:center;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 40px;
            text-align:center;
            width:40%;
            border-radius: 5px;
            border: 2px solid #ffcc00;
        
        }
        .callPage img {
            display: inline-block;

        }
    
    </style>
</head>
<body>
    <?php
        if(isset($_SESSION['language'])){
            $language=$_SESSION['language'];
        }else{
            $language="english";
        }
        if($language=="spanish"){
            $messageCorrect="Has acertado!";
            $messageIncorrect="Incorrecto, la respuesta correcta era: ";
            $messageSend="Enviar";
        }
        else if($language=="english"){
            $messageCorrect="You're right!";
            $messageIncorrect="Incorrect, the correct answer was: ";
            $messageSend="Send";
        }
        else if($language=="catalan"){
            $messageCorrect="Has acertat!";
            $messageIncorrect="Incorrecte, la resposta correcta era: ";
            $messageSend="Enviar";
        }
            echo "<div class='callPage' id='callPage'>";
            echo "<h3 id='headPhone'></h3>";
            echo "<img src='public/phone.jpeg' id='phonephoto'>";
            echo "<div id='formPhone' style='display:none'>";
            echo "<input type='number' name='rings' required>";
            echo "<input type='submit' value='$messageSend'>";
            echo "</div>";
            echo "</div>";


    ?>
   
    
    
    
    <script src="script.js"></script>
</body>
</html>