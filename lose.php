<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>DERROTA</title>
    <link rel="icon" href="public/dolar.png" type="image/png">
</head>
<body>
    <audio id="soundLose">
        <source src="Sounds/080047_lose_funny_retro_video-game-80925.mp3" type="audio/mp3">
    </audio>
    <div class="loseMessage">
        <h1>!HAS PERDIDO!</h1>
    </div>
    <div class="loseButtons">
        <a href="index.php">INICIO</a>
        <a href="">GUARDAR STATS</a>
    </div>
    <script src="script.js"></script>
    <script>
        loseSound();
    </script>
</body>
</html>