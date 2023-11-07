<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Question</title>
    <style>
        
    </style>
</head>
<body class="create">
    <?php
        if(isset($_SESSION['language'])){
            $language= $_SESSION['language'];
        }else{
            $language= "spanish";
            
        }
        if($language == "catalan"){
            $difficulty = "Nivell de Dificultat: ";
            $languageQuestion = "Idioma: "; 
            $question = "Pregunta: ";
            $correctAnswer= "Resposta Correcta: ";
            $incorrectAnswer= "Resposta Incorrecta ";
            $img = "Afegir imatge: ";


        }else if($language == "spanish"){
            $difficulty = "Nivel de dificultad: ";
            $languageQuestion = "Idioma: " ;
            $question = "Pregunta: ";
            $correctAnswer= "Respuesta Correcta: ";
            $incorrectAnswer= "Respuesta Incorrecta ";
            $img = "Agregar imagen: ";

        }else if($language == "english"){
            $difficulty = "Difficulty Level: ";
            $languageQuestion = "Language: " ;
            $correctAnswer= "Correct Answer: ";
            $incorrectAnswer= "Incorrect Answer ";
            $img = "Add image: ";
        }
        echo '
        <div class="form">
            <form method="post" enctype="multipart/form-data>
                <div>
                    <label for="difficulty">'. $difficulty .' </label>
                    <select id="difficulty" name="difficulty" required>';
                        for ($i = 1; $i <= 6; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                    echo '</select>
                </div>

                <div>
                    <label for="language">'.$languageQuestion.'</label>
                    <select id="language" name="language" required>
                        <option value="catalan">Catala</option>
                        <option value="english">English</option>
                        <option value="español">Español</option>
                    </select>
                </div>

                <div>
                    <label for="question">'.$question.'</label>
                    <textarea id="question" name="question" rows="3" required></textarea>
                </div>

                <div>
                    <label for="correctAnswer">'.$correctAnswer.'</label>
                    <input type="text" id="correctAnswer" name="correctAnswer" required>
                </div>

                <div>
                    <label for="incorrectAnswer1">'.$incorrectAnswer.' 1:</label>
                    <input type="text" id="incorrectAnswer1" name="incorrectAnswer1">
                </div>

                <div>
                    <label for="incorrectAnswer2">'.$incorrectAnswer.' 2:</label>
                    <input type="text" id="incorrectAnswer2" name="incorrectAnswer2">
                </div>

                <div>
                    <label for="incorrectAnswer3">'.$incorrectAnswer.' 3:</label>
                    <input type="text" id="incorrectAnswer3" name="incorrectAnswer3">
                </div>

                <div>
                <label for="image">'.$img.':</label>
                <input type="file" id="image" name="image" accept="image/*">
                </div>

                <button type="submit">Enviar</button>
            </form>
        </div>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener respuestas
            $respDifficulty = $_POST['difficulty'];
            $respLanguageQuest = $_POST['language'];
            $respQuestion = $_POST['question'];
            $respCorrectAnsw = "+" . $_POST['correctAnswer']; // Marcar la respuesta correcta con un '+'
            $respIncorrectAnsw = [
                "-" . $_POST['incorrectAnswer1'],
                "-" . $_POST['incorrectAnswer2'],
                "-" . $_POST['incorrectAnswer3']
            ];
            
            // Agregar respuesta correcta a las incorrectas
            array_push($respIncorrectAnsw, $respCorrectAnsw);
        
            // Barajar todas las respuestas
            shuffle($respIncorrectAnsw);
        
            // Asignar respuestas a A, B, C, D
            $a = $respIncorrectAnsw[0];
            $b = $respIncorrectAnsw[1];
            $c = $respIncorrectAnsw[2];
            $d = $respIncorrectAnsw[3];
        
        }
        
        $fileName = "AllQuestions/" . $respLanguageQuest . "_" . $respDifficulty . ".txt";
        echo $fileName;
        
        // Abrir el archivo en modo 'a+' para añadir contenido al final si existe
        $file = fopen($fileName, 'a');
        
        if ($file) {
            // Escribir la nueva pregunta y respuestas al final del archivo
            $newContent = "*" . $respQuestion . "\n" . $a . "\n" . $b . "\n" . $c . "\n" . $d . "\n";
            fwrite($file, $newContent);
            fclose($file);
        } else {
            // Si hay un problema al abrir el archivo
            echo "Error al abrir el archivo";
        }
        
        $directorioImagenes = '/home/lina/Matili/public/fotospreguntas';
        if (move_uploaded_file($_FILES['image']['tmp_name'], $directorioImagenes . $_FILES['image']['name'])) {
            echo 'Archivo movido con éxito a ' . $directorioImagenes;
        } else {
            echo 'Error al mover el archivo. Verifica los permisos y la ruta del directorio.';
        }
    ?>
    
    
</body>
</html>