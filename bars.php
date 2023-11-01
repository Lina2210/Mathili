<!DOCTYPE html>
<html>
<head>
    <title>Bars</title>
    <style>

        .modal {
            
            display: none; /* Por defecto, ocultar el modal */
            flex-direction: column;
            justify-content: center;
            position: fixed;
            bottom: 40%;
            left: 10%;
            transform: translate(-50%, 0);
            width: 10%;
            height: 35%;
            border: 1px solid #ccc;
            background-color: transparent;
            z-index: 1000;
            padding: 20px;
        }

        .modalClose {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        .contenedor {
            
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            width: 100%;
            height: 300px;
            border: 1px solid #ccc;
        }

        .contenedorLetters {
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            width: 100%;
            height: 50px;
            margin-top: 10px;
            color: white;
            
        }

        .barra{
            flex: 0 0 10%;
            background-color: #FFD700;
            margin: 0 5px;
            border: 1px solid #ccc;
        }

        .barras {
            display: flex;
            flex-direction: column;
        }

        .etiqueta {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="modal" id="modal">
        <div class="modalClose" onclick="closeModal()">X</div>
        <div class="contenedor">
            
            <?php
            
            echo "<div class='barra a' ></div>";
            
            echo "<div class='barra b' ></div>";
        
            echo "<div class='barra c' ></div>";
        
            echo "<div class='barra d' ></div>";
        
            ?>
        </div>
        <div class="contenedorLetters">
            <H1>A</H1>
            <H1>B</H1>
            <H1>C</H1>
            <H1>D</H1>
        </div>
    </div>
    <script src="script.js"></script>

</body>
</html>
