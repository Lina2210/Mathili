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
    <audio id="soundWin">
        <source src="Sounds/winMusic.mp3" type="audio/mpeg">
    </audio>
    <div class="winMessage">
        <h1>!HAS RESPONDIDO CORRECTAMENTE TODAS LAS PREGUNTAS!</h1>
        <img src="public/silueta-personas-felices.jpg">
    </div>
    <div class="winButtons">
        <a href="index.php">INICIO</a>
        <a href="">GUARDAR STATS</a>
    </div>
    <script src="script.js"></script>
    <script>
        winSound()
    </script>
</body>
</html>