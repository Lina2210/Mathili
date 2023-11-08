<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Question</title>
    <link rel="stylesheet"  href="style.css">
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
            $title = "AFEGIR PREGUNTA";
            $mensTypeFile = "Només s'admeten fitxers d'imatge (JPEG, PNG, GIF, JPG)";
            $mensAddExit = "La imatge s'ha pujat amb èxit a:";
            $mensErrorAdd = "Error en moure l'arxiu. Comprova els permisos i la ruta del directori.";
            $mensNoImg ="No s'ha pujat cap imatge.";
            $index= "Inici";


        }else if($language == "spanish"){
            $difficulty = "Nivel de dificultad: ";
            $languageQuestion = "Idioma: " ;
            $question = "Pregunta: ";
            $correctAnswer= "Respuesta Correcta: ";
            $incorrectAnswer= "Respuesta Incorrecta ";
            $img = "Agregar imagen: ";
            $title = "AGREGAR PREGUNTA";
            $mensTypeFile = "Solo se permiten archivos de imagen (JPEG, PNG, GIF, JPG)";
            $mensAddExit = "¡La imagen se subió con éxito a: ";
            $mensErrorAdd = "Error al mover el archivo. Verifica los permisos y la ruta del directorio.";
            $mensNoImg = 'No se ha subido ninguna imagen.';
            $index = "Inicio";

        }else if($language == "english"){
            $difficulty = "Difficulty Level: ";
            $languageQuestion = "Language: " ;
            $correctAnswer= "Correct Answer: ";
            $incorrectAnswer= "Incorrect Answer ";
            $img = "Add image: ";
            $title = "ADD QUESTION";
            $mensTypeFile = "Only image files are allowed (JPEG, PNG, GIF, JPG)";
            $mensAddExit = "The image was successfully uploaded to:";
            $mensErrorAdd = "Error moving the file. Check the permissions and the directory path.";
            $mensNoImg = 'No image has been uploaded.';
            $index = "Start";
        }
        echo '
        <h1> '. $title . ' </h1>
        <div class="form">
            <form method="post" enctype="multipart/form-data">
                <div>
                    <label for="difficulty">' . $difficulty . '</label>
                    <select id="difficulty" name="difficulty" required>';
                        for ($i = 1; $i <= 6; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
        echo '      </select>
                </div>

                <div>
                    <label for="language">' . $languageQuestion . '</label>
                    <select id="language" name="language" required>
                        <option value="catalan">Catala</option>
                        <option value="english">English</option>
                        <option value="español">Español</option>
                    </select>
                </div>

                <div>
                    <label for="question">' . $question . '</label>
                    <textarea id="question" name="question" rows="3" required></textarea>
                </div>

                <div>
                    <label for="correctAnswer">' . $correctAnswer . '</label>
                    <input type="text" id="correctAnswer" name="correctAnswer" required>
                </div>

                <div>
                    <label for="incorrectAnswer1">' . $incorrectAnswer . ' 1:</label>
                    <input type="text" id="incorrectAnswer1" name="incorrectAnswer1">
                </div>

                <div>
                    <label for="incorrectAnswer2">' . $incorrectAnswer . ' 2:</label>
                    <input type="text" id="incorrectAnswer2" name="incorrectAnswer2">
                </div>

                <div>
                    <label for="incorrectAnswer3">' . $incorrectAnswer . ' 3:</label>
                    <input type="text" id="incorrectAnswer3" name="incorrectAnswer3">
                </div>

                <div>
                    <label for="image">' . $img . ':</label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>

                <button type="submit">Enviar</button>
            </form>
            
        </div>
        <div class="back">
            <a href="index.php" class="back" style="display: block; width: 20%; text-align: center; text-decoration: none; padding: 10px 20px; margin-top: 5px; background-color: #3498db; color: #fff; border-radius: 5px;"> '. $index .' </a>
        </div>
            ';

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
        
            $fileName = "AllQuestions/" . $respLanguageQuest . "_" . $respDifficulty . ".txt";
            
            // Verificar si el archivo existe
            if (file_exists($fileName)) {
                $fileLines = file($fileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                $lastLine = end($fileLines);
        
                if ($lastLine === '') {
                    array_pop($fileLines); // Eliminar la última línea vacía si existe
                }
        
                $newContent = "*" . $respQuestion . "\n" . $a . "\n" . $b . "\n" . $c . "\n" . $d;
        
                file_put_contents($fileName, implode("\n", $fileLines) . "\n" . $newContent . "\n", LOCK_EX);
            } else {
                // Si hay un problema al abrir el archivo
                echo "El archivo no existe";
            }
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        
            $directorioImagenes = './public/fotospreguntas/' . $respDifficulty . '/';
    
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $fileType = $_FILES['image']['type'];
                $fileName = $_FILES['image']['name'];
                
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                
                if (in_array($fileType, $allowedTypes)) {
                    
                    $newFileName = $respQuestion . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
                    $targetPath = $directorioImagenes . $newFileName;
                                        
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                        echo '<div class="mensAddExit">' . $mensAddExit . $targetPath . '</div>';
                    } else {
                        echo '<div class="mensErrorAdd">' . $mensErrorAdd . '</div>';
                    }
                } else {
                    echo '<div class="mensTypeFile">' . $mensTypeFile . '</div>';
                }
            } else {
                echo '<div class="mensNoImg">' . $mensNoImg . '</div>';
            }
        }
    ?>
    
    <script type="text/javascript" src="script.js"></script>
</body>
</html>