<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <button onclick="displayBlock('question')">PUBLISH</button>
    <div id="question" style="display: none;">
        <h3>¿Quieres publicar tus resultados?</h3>
        <a href="#form" onclick="displayBlock('form')">Si</a>
        <a href="index.php">No</a>
    </div>
    <div id="form" style="display: none;">
    <form method="POST">
        <?php
            echo "<label for='user'>Nombre: </label>";
            echo "<input type='text' name='user' required>";
            echo "<input type='integer' name='points' required>"; //eliminar cuando se tenga el points de game
            echo "<input type='submit' value='enviar'>";
            
    
        $filename = "records.txt";  
        $file = fopen($filename, "a");  
        if(isset($_POST["user"]) && isset($_POST["points"])){
            $user = $_POST["user"];
            $points = $_POST["points"];
            $fileExists = file_exists($filename) && filesize($filename) > 0;
              
            if ($fileExists) {
                $lastLine = readLastLine($filename);
                $session = explode(',', $lastLine);
                print($session[0]);
                $id = intval($session[0]) + 1; 
                $data = $id . "," . $user . "," . $points . "\n";
                fwrite($file, $data);
            }else {
                $id = 1;
                $data = $id . "," . $user . "," . $points . "\n";
                fwrite($file, $data);
            }
            fclose($file);  
        }

        
        function readLastLine($filename) {
            $lastLine = false;
            $readFile = fopen($filename, 'r');
            if ($readFile) {
                while (($line = fgets($readFile)) !== false) {
                    $lastLine = $line;
                }
                fclose($readFile);
            }
            return $lastLine;
        }
            
        ?>
        
    </form>
    </div>
    <script src="scriptPublish.js"></script>
</body>
</html>
