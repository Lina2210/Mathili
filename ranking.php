<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/74ec47558a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>RANKING</title>
    <link rel="icon" href="public/dolar.png" type="image/png">
</head>
<body>
    <?php
        session_start();
        $filename = "records.txt";

$lines = file($filename, FILE_IGNORE_NEW_LINES);

function compareLines($a, $b) {
    
    $aData = explode(',', $a);
    $bData = explode(',', $b);
    $aValue = (int)$aData[2];
    $bValue = (int)$bData[2];

    
    if ($aValue == $bValue) {
        return 0;
    }
    return ($aValue > $bValue) ? -1 : 1;
}

usort($lines, 'compareLines');

if (isset($_SESSION['language'])) {
    $language = $_SESSION['language'];
} else {
    $language = 'spanish';
}

if ($language=='spanish') {
    $username = ' USUARIO ';
    $points = ' PUNTOS ';
    $home = ' INICIO ';
}
if ($language=='catalan') {
    $username = ' USUARI ';
    $points = ' PUNTS ';
    $home = ' INICI ';
}
if ($language=='english') {
    $username = ' USER ';
    $points = ' POINTS ';
    $home = ' HOME ';
}

echo "<div class='ranking'>";
echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th> ID </th>";
echo "<th> $username </th>";
echo "<th> $points </th>";
echo "</tr>";
echo "</thead>";
foreach ($lines as $line) {
    if (!empty($line) && count(explode(',', $line)) >= 3){
    $partial = explode(",", $line); 
    echo "<tr>";
    echo "\t<td><h2><i class='fa fa-solid fa-id-card'></i>" . $partial[0] . "</h2></td>\n";
    echo "\t<td><h2><i class='fa fa-regular fa-user'></i>" . $partial[1] . "</h2></td>\n";
    echo "\t<td><h2>" . $partial[2] . "<i class='fa fa-solid fa-coins'></i></h2></td>\n";
    echo "</tr>"; 
}
}
echo "</table>";
echo "</div>";

echo "<div class='rankingButton'>";
echo "<a href='index.php'>$home</a>";
echo "</div>";
    ?>
</body>
</html>