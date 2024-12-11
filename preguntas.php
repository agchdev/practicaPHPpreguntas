<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGCHTEST-TEST</title>
</head>
<body>
    <?php
        header('Content-Type: text/html; charset=UTF-8');

        require_once("inc/conexion.php");
        require_once "clases.php";

        $codPreg = [];
        $codPreg[] = rand(1, 10);
        $cont = 0;

        if(isset($_POST["comenzar"]) || isset($_POST["enviar"])){
            // Saca 5 numeros de manera aleatoria
            $nrandom = rand(1, 10);
            while(!in_array($nrandom, $codPreg)){ 
                $nrandom = rand(1, 10);  
            }
            $codPreg[] = $nrandom;
            $cont++;
            $pregunta = new pregunta($conexion, $nrandom);
            $aciertos=0;
            $acierto=false;
        
    ?>
    
        <form action="preguntas.php" method="post" enctype="multipart/form-data">
    <?php
            echo var_dump($codPreg);
            $pregunta->mostrarPregunta();
    ?>
            <input type="submit" name="enviar" value="enviar">
        </form>
    <?php
        }else{
            ?>
            <form action="preguntas.php" method="post" enctype="multipart/form-data">
                <input type="submit" name="comenzar" value="COMENZAR">
            </form>
            <?php
        }
    ?>
</body>
</html>