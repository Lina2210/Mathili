<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>VICTORIA</title>
    <link rel="icon" href="public/dolar.png" type="image/png">
</head>
<body>
    <?php
        session_start();
        if(isset($_POST['language'])){
            $language = $_POST['language'];
            
        } else {
            $language="english";
        }
        if($language=="catalan"){
            $messageCorrect= "¡ HAS RESPOST CORRECTAMENT TOTES LES PREGUNTES  !";
            $messageHome= "INICI";
            $messagePublish= "GUARDAR ESTADISTIQUES";
        }
        elseif($language=="spanish"){
            $messageCorrect= "¡ HAS RESPONDIDO CORRECTAMENTE TODAS LAS PREGUNTAS  !";
            $messageHome= "INICIO";
            $messagePublish= "GUARDAR ESTADISTICAS";
        }
        elseif($language=="english"){
            $messageCorrect= "¡ YOU ANSWERED ALL THE QUESTIONS CORRECTLY  !";
            $messageHome= "HOME";
            $messagePublish= "SAVE STATS";
        }
        echo "<audio id='soundWin'>";
        echo "<source src='Sounds/winMusic.mp3' type='audio/mpeg'>";
        echo "</audio>";
        echo "<div class='winMessage'>";
        echo "<h1>$messageCorrect</h1>";
        echo "<img src='public/silueta-personas-felices.jpg'>";
        echo "</div>";
        echo "<div class='winButtons'>";
        echo "<a href='index.php'>$messageHome</a>";
        echo "<a href=''>$messagePublish</a>";
        echo "</div>";
    ?>
    <script src="script.js"></script>
    <script>
        winSound()
    </script>
</body>
</html>