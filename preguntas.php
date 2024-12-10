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
        $cont = 0;

        // Saca 5 numeros de manera aleatoria
        while($cont<5){ 
            $nrandom = rand(1, 10);
            if(!in_array($nrandom, $codPreg)){
                $codPreg[] = $nrandom;
                $cont++;
            };
        }
        $preguntas = [];
        for ($i=0; $i < 5; $i++) { 
            $preguntas[] = new pregunta($conexion, $codPreg[$i]);
        }
        $aciertos=0;
        $acierto=false;
        $preguntas[0]->mostrarPregunta();
    ?>

    
</body>
</html>