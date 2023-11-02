<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PUBLISH</title>
    <link rel="icon" href="public/dolar.png" type="image/png">
</head>
<body>
    
    
        <?php
        session_start();
        if(isset($_SESSION["points"]) && isset($_POST["language"]) && isset($_SESSION["time"])){
            $time= $_SESSION["time"]/100;
            $points=$_SESSION["points"];
            $pointsToSend= round($points/$time);
            $language=$_POST["language"];
            if($language=="english"){
                $saveData="Stats saved correctly!";
                $accept="Accept";
                $send="Send";
                $name="Name:";
                $numbAnsw="Questions answered correctly";
                $numbTime="Time of game";
                $numbPoint="Points to send";
            }
            elseif($language=="catalan"){
                $saveData="Dades guardades correctament!";
                $accept="Acceptar";
                $send="Enviar";
                $name="Nom:";
                $numbAnsw="Preguntes contestades correctament";
                $numbTime="Temps de joc";
                $numbPoint="Punts a enviar";
            }
            elseif($language=="spanish"){
                $saveData="Datos guardados correctamente!";
                $accept="Aceptar";
                $send="Enviar";
                $name="Nombre:";
                $numbAnsw="Preguntas contestadas correctamente";
                $numbTime="Tiempo de juego";
                $numbPoint="Puntos a enviar";
            }
            if(isset($_POST["user"])){
                $filename = "records.txt";  
                $file = fopen($filename, "a");
                $user = $_POST["user"];
                $fileExists = file_exists($filename) && filesize($filename) > 0;
                  
                if ($fileExists) {
                    $lastLine = readLastLine($filename);
                    $session = explode(',', $lastLine);
                    $id = intval($session[0]) + 1; 
                    $data = $id . "," . $user . "," . $pointsToSend . "\n";
                    fwrite($file, $data);
                }else {
                    $id = 1;
                    $data = $id . "," . $user . "," . $pointsToSend . "\n";
                    fwrite($file, $data);
                }
                fclose($file);
                echo "<div class='formPublish'>"; 
                echo "<form action='index.php' method='POST'>";
                    echo "<input type='hidden' name='language' value=$language>";
                    echo "<label for='user'> $saveData</label>";
                    echo "<input type='submit' value=$accept>";
                echo "</form>";
                echo "</div>";
            }else{
                $timeToPrint=$time*100;
                echo "<div class= 'statsUser'>";
                echo "<h3>$numbAnsw = $points</h3>";
                echo "<h3>$numbTime = $timeToPrint seg</h3>";
                echo "<h3>$numbPoint = $pointsToSend points</h3>";
                echo "</div>";
                echo "<div class='formPublish'>";
                echo "<form action='publish.php' method='POST'>";
                    echo "<label for='user'>$name </label>";
                    echo "<input type='text' name='user' required>";
                    echo "<input type='hidden' name='language' value=$language>";
                    echo "<input type='hidden' name='points' value=$points>";
                    echo "<input type='submit' value=$send>";
                echo "</form>";
                echo "</div>";
            }
    
        
            
        }else{
            header('HTTP/1.0 403 Forbidden');
            echo "<div class='accessDenied'>";
            echo "<p>Access Denied</p>";
            echo "<a href='index.php'>HOME</a>";
            echo "</div>";
            exit;
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
    <script src="script.js"></script>
</body>
</html>