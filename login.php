<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>

     
body {
    font-family: 'Overpass', sans-serif;
    font-weight: normal;
    font-size: 100%;
    color: #1b262c;
    margin: 0;
    background-color: #001F3F;
}

#contenedor {
    display: flex;
    align-items: center;
    justify-content: center;
    
    margin: 0;
    padding: 0;
    min-width: 100vw;
    min-height: 100vh;
    width: 100%;
    height: 100%;
}

#central {
    max-width: 320px;
    width: 100%;
}

.titulo {
    font-size: 250%;
    color:#bbe1fa;
    text-align: center;
    margin-bottom: 20px;
}

#login {
    width: 100%;
    padding: 50px 30px;
    background-color: #3282b8;
    
    -webkit-box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
    -moz-box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
    box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
    
    border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px 3px 3px 3px;
    -webkit-border-radius: 3px 3px 3px 3px;
    
    box-sizing: border-box;
}

#login input {
    font-family: 'Overpass', sans-serif;
    font-size: 110%;
    color: #1b262c;
    
    display: block;
    width: 100%;
    height: 40px;
    
    margin-bottom: 10px;
    padding: 5px 5px 5px 10px;
    
    box-sizing: border-box;
    
    border: none;
    border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px 3px 3px 3px;
    -webkit-border-radius: 3px 3px 3px 3px;
}

#login input::placeholder {
    font-family: 'Overpass', sans-serif;
    color: #E4E4E4;
}

#login button {
    font-family: 'Overpass', sans-serif;
    font-size: 110%;
    color:#1b262c;
    width: 100%;
    height: 40px;
    border: none;
    
    border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px 3px 3px 3px;
    -webkit-border-radius: 3px 3px 3px 3px;
    
    background-color: #bbe1fa;
    
    margin-top: 10px;
}

#login button:hover {
    background-color: #0f4c75;
    color:#bbe1fa;
}

.pie-form {
    font-size: 90%;
    text-align: center;    
    margin-top: 15px;
}

.pie-form a {
    display: block;
    text-decoration: none;
    color: #bbe1fa;
    margin-bottom: 3px;
}

.pie-form a:hover {
    color: #0f4c75;
}

.inferior {
    margin-top: 10px;
    font-size: 90%;
    text-align: center;
}

.inferior a {
    display: block;
    text-decoration: none;
    color: #bbe1fa;
    margin-bottom: 3px;
}

.inferior a:hover {
    color: #3282b8;
}
#messageIncorrectLogin{
    color:red;
}
    </style>
</head>
<body>
    <?php
    session_start();
        if(isset($_SESSION['language'])){
            $language=$_SESSION['language'];
        }else{
            $language="spanish";
        }
        if($language=="spanish"){
            $messageWelcome="Bienvenido!";
            $messageUser="Usuario";
            $messagePassword="Contraseña";
            $messageBack="Volver";
            $messageIncorrect="Usuario incorrecto";
            $messageWelcome2="Bienvenido ";
            $messageQuestion="¿Quieres acceder al editor de preguntas?";
            $messageYes="Sí";
        }
        else if($language=="english"){
            $messageWelcome="Welcome!";
            $messageUser="User";
            $messagePassword="Password";
            $messageBack="Back";
            $messageIncorrect="Wrong user";
            $messageWelcome2="Welcome ";
            $messageQuestion="Do you want to access the question editor?";
            $messageYes="Yes";
        }
        else if($language=="catalan"){
            $messageWelcome="Benvingut!";
            $messageUser="Usuari";
            $messagePassword="Contrasenya";
            $messageBack="Tornar";
            $messageIncorrect="Usuari incorrecte";
            $messageWelcome2="Benvingut ";
            $messageQuestion="¿Vols accedir-hi al editor de preguntes?";
            $messageYes="Sí";
        }
        if(isset($_POST['usuario']) && isset($_POST['password'])){
            $user=$_POST['usuario'];
            $password=$_POST['password'];
            if(comprobarUser($user,$password)){
                echo '<div id="contenedor">
            <div id="central">
                <div id="login">
                    <div class="titulo">
                    <h4>'.$messageWelcome2.' '.$user.'!<h4>
                    </div>
                    <h3>'.$messageQuestion.'</h3>
                </div>
                <div class="inferior">
                    <a href="index.php">No</a>
                    <a href="create.php">'.$messageYes.'</a>
                </div>
            </div>
        </div>';
            }else{
                echo '<div id="contenedor">
                <div id="central">
                    <div id="login">
                        <div class="titulo">
                        '.$messageWelcome.'
                        </div>
                        <form id="loginform"  action="login.php" method="POST">
                            <input type="text" name="usuario" placeholder="'.$messageUser.'" required>
                            
                            <input type="password" placeholder="'.$messagePassword.'" name="password" required>
                            
                            <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                          
                                <h3 id="messageIncorrectLogin">'.$messageIncorrect.'</h3>
                           
                         
                        </form>
                    </div>
                    <div class="inferior">
                        <a href="index.php">'.$messageBack.'</a>
                        
                    </div>
                </div>
            </div>';
            }

        }else{
            echo '<div id="contenedor">
            <div id="central">
                <div id="login">
                    <div class="titulo">
                    '.$messageWelcome.'
                    </div>
                    <form id="loginform"  action="login.php" method="POST">
                        <input type="text" name="usuario" placeholder="'.$messageUser.'" required>
                        
                        <input type="password" placeholder="'.$messagePassword.'" name="password" required>
                        
                        <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                    </form>
                </div>
                <div class="inferior">
                    <a href="index.php">'.$messageBack.'</a>
                </div>
            </div>
        </div>';
        }
        
            
        function comprobarUser($usuario,$contra){
            $file = fopen("usersAdmin.txt", "r");
            while ($line = fgets($file)) {
                $lineNew = preg_replace('/\s+/', '', $line);
                $arrayUser=explode(",", $lineNew);
                echo var_dump($arrayUser);
                if($arrayUser[0]==$usuario && $arrayUser[1]==$contra){
                    return true;
                    break;
                }
            }
            return false;
        }
    
    ?>
     
   
    
    
    
    <script src="script.js"></script>
</body>
</html>