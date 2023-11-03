<!DOCTYPE html>
<html>
<head>
    <title>Phone Call</title>
    <style>

        .callPage {
            
            display: none; /* Por defecto, ocultar el modal */
            flex-direction: column;
            justify-content: center;
            align-items:center;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 40px;
            text-align:center;
            width:40%;
            border-radius: 5px;
            border: 2px solid #ffcc00;
        
        }
        .callPage img {
            display: inline-block;

        }
    
    </style>
</head>
<body>
    <div class="callPage" id="callPage">
        <h3 id="headPhone"></h3>
    <img src="public/phone.jpeg" id="phonephoto">
    <div id="formPhone" style="display:none">
    <form method="post" action="call.php">
        <input type="number" name="Cantidad de rings" required>
        <input type="submit" value="Enviar">
    </form>
    </div>
    </div>
   
    
    
    
    <script src="script.js"></script>
</body>
</html>