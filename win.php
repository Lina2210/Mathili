<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>VICTORIA</title>
    <link rel="icon" href="public/dolar.png" type="image/png">
    <script src="script.js"></script>
</head>
<body>
    <script>
        inicializeEndWin()
    </script>
    <?php
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header('HTTP/1.0 403 Forbidden');
            echo "<div class='accessDenied'>";
            echo "<p>Access denied. You cannot enter directly</p>";
            echo "<a href='index.php'>Home</a>";
            echo "</div>";
        }else{
            session_start();
            $_SESSION['time'] = isset($_POST['time']) ? $_POST['time'] : null;
            $_SESSION['points']=18;
            if(isset($_POST['language'])){
                $language = $_POST['language'];
                
            } else {
                $language="english";
            }
            if($language=="catalan"){
                $messageCorrect= "¡ HAS RESPOST CORRECTAMENT TOTES LES PREGUNTES  !";
                $messageHome= "INICI";
                $messagePublish= "PUBLICAR";
                $messageDirectAccess= "Accés denegat. No pots entrar directament";
            }
            elseif($language=="spanish"){
                $messageCorrect= "¡ HAS RESPONDIDO CORRECTAMENTE TODAS LAS PREGUNTAS  !";
                $messageHome= "INICIO";
                $messagePublish= "PUBLICAR";
                $messageDirectAccess= "Acceso denegado. No puedes entrar directamente";
            }
            elseif($language=="english"){
                $messageCorrect= "¡ YOU ANSWERED ALL THE QUESTIONS CORRECTLY  !";
                $messageHome= "HOME";
                $messagePublish= "PUBLISH";
                $messageDirectAccess= "Access denied. You cannot enter directly";
            }
                echo "<div class='winMessage'>";
                echo "<h1>$messageCorrect</h1>";
                echo "<img src='public/silueta-personas-felices.jpg'>";
                echo "</div>";
                echo "<div class='winButtons'>";
                echo "<form action='index.php' method='POST'>";
                    echo "<input type='hidden' name='language' value=$language>";
                    echo "<button>$messageHome</button>";
                echo "</form>";
                echo "<form action='publish.php' method='POST'>";
                    echo "<input type='hidden' name='language' value=$language>";
                    echo "<button>$messagePublish</button>";
                echo "</form>";
                echo "</div>";

        }
    ?>
    <audio id="soundWin">
        <source src="Sounds/winMusic.mp3" type="audio/mpeg">
    </audio>
    <script>
        winSound()
    </script>
</body>
</html>