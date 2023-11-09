<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LOSE</title>
    <link rel="icon" href="public/dolar.png" type="image/png">
    <script src="script.js"></script>
</head>
<body>
    <script>
        inicializeEndLose()
    </script>
<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('HTTP/1.0 403 Forbidden');
    echo "<div class='accessDenied'>";
    echo "<p>Access denied. You cannot enter directly</p>";
    echo "<a href='index.php'>Home</a>";
    echo "</div>";
} else{
    session_start();

    $level=$_SESSION['level'];
    if(isset($_POST['question'])){
        $question = $_POST['question'];
        $points = (($level-1)*3)+($question-1);
        $_SESSION['points']=$points;
    }
    $_SESSION['time'] = isset($_POST['time']) ? $_POST['time'] : null;
    if(isset($_POST['language'])){
        $language = $_POST['language'];
        
    } else {
        $language="english";
    }
    if($language=="catalan"){
        $messageLose= "¡ HAS PERDUT !";
        $messageHome= "INICI";
        $messagePublish= "PUBLICAR";
    }
    elseif($language=="spanish"){
        $messageLose= "¡ HAS PERDIDO !";
        $messageHome= "INICIO";
        $messagePublish= "PUBLICAR";
    }
    elseif($language=="english"){
        $messageLose= "¡ YOU LOSE !";
        $messageHome= "HOME";
        $messagePublish= "PUBLISH";
    }
    echo "<script>";
    echo "let loser = true;";
    echo "window.addEventListener('load', loseSound)";
    echo "</script>";
        echo "<div class='loseMessage'>";
            echo "<h1>$messageLose</h1>";
            echo "<img src='public/triste-deprimido-fallido-papel-perforado.jpg'>";
        echo "</div>";
        echo "<div class='loseButtons'>";
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
<audio id="soundLose">
        <source src="Sounds/080047_lose_funny_retro_video-game-80925.mp3"     type="audio/mp3">
    </audio>


</body>
</html>