<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LOSE</title>
    <link rel="icon" href="public/dolar.png" type="image/png">
</head>
<body>
<?php
    if(isset($_POST['language'])){
        $language = $_POST['language'];
        
    } else {
        $language="english";
    }
    if($language=="catalan"){
        $messageLose= "¡ HAS PERDUT !";
        $messageHome= "INICI";
        $messagePublish= "GUARDAR ESTADISTIQUES";
    }
    elseif($language=="spanish"){
        $messageLose= "¡ HAS PERDIDO !";
        $messageHome= "INICIO";
        $messagePublish= "GUARDAR ESTADISTICAS";
    }
    elseif($language=="english"){
        $messageLose= "¡ YOU LOSE !";
        $messageHome= "HOME";
        $messagePublish= "SAVE STATS";
    }

    echo "<div class='loseMessage'>";
        echo "<h1>$messageLose</h1>";
        echo "<img src='public/triste-deprimido-fallido-papel-perforado.jpg'>";
    echo "</div>";
    echo "<div class='loseButtons'>";
        echo "<a href='index.php'>$messageHome</a>";
        echo "<a href='publish.php'>$messagePublish</a>";
    echo "</div>";
?>

</body>
</html>