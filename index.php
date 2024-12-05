<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGCHTEST</title>
</head>
<body>
    <?php
    if(isset($_POST["enviar"])){
        require_once("inc/conexion.php");
        
    }else{
    ?>
    <main>
        <h2>AGCH TEST!</h2>
        <div>
            <form action="preguntas.php">
                <input type="text" name="username" id="username" placeholder="Nombre de usuario...">
                <input type="submit" name="enviar" id="enviar" value="enviar">
            </form>
        </div>
        <p>Mira el <a href="">rankin</a> directamente pinchando en este enlace <a href="">RANKING</a></p>
    </main>
    <?php
    }
    ?>
</body>
</html>