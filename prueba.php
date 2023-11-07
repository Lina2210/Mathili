<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function getImagesFromFolder($folderPath) {
        $imageArray = [];

        // Obtener la lista de archivos en la carpeta de imágenes
        $files = glob($folderPath . '/*.{jpg,jpeg,png,gif,PNG,webp}', GLOB_BRACE);

        // Añadir cada archivo al array
        foreach ($files as $file) {
            $imageArray[] = $file;
        }

        return $imageArray;
    }

    // Ruta de la carpeta de imágenes
    $folderPath = 'public/fotos preguntas/1';

    // Obtener el array de imágenes
    $imageArray = getImagesFromFolder($folderPath);

    // Imprimir el array de imágenes
    print_r($imageArray[3]);
    ?>
</body>
</html>