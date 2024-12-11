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

        
        $codPreg[] = rand(1, 10);
        $cont = 0;

        if(isset($_POST["comenzar"]) || isset($_POST["enviar"])){
            
        
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