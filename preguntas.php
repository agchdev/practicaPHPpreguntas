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

        if(isset($_GET["usu"]))$usu = $_GET["usu"];

        if(isset($_POST["comenzar"]) || isset($_POST["enviar"])){
            $pregunta = new pregunta($conexion);
        
    
    echo "<form action=\"preguntas.php?usu=".$usu."\" method=\"post\" enctype=\"multipart/form-data\">";
    
        $pregunta->mostrarPregunta($usu);
    ?>
            <input type="submit" name="enviar" value="enviar">
        </form>
    <?php
        }else{
    
        echo "<form action=\"preguntas.php?usu=".$usu."\" method=\"post\" enctype=\"multipart/form-data\">";
        echo $usu;
    ?>
            <input type="submit" name="comenzar" value="comenzar">

        </form>
    <?php
        }
    ?>
</body>
</html>