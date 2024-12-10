<?php
//$bd->set_charset('utf8')

    require_once("inc/conexion.php");
    // Creacion de la clase preguntas
    class pregunta{
        // Atributos de la clase
        private $bd; // Para conectarse con la base de datos
        private $codPregunta; // Para el texto de la pregunta
        private $textPregunta; // Para el texto de la pregunta
        private $respuestaPregunta; // PAra la respuesta de la pregunta
        // Para crear una instancia de preguntas
        public function __construct ($db,int $cp=0, String $tp="", String $rp=""){
            $this->bd=$db; // La conexion
            $this->codPregunta=$cp; //Codigo de pregunta
            $this->textPregunta=$tp; // El texto de la pregunta
            $this->respuestaPregunta=$rp; // La respuesta de la pregunta
        }
        // Una funcion para insertar preguntas, por si hago un panel de administrador
        public function insertarPregunta(){
            // $consulta = "SELECT * FROM cursosdb";
            // $sentencia = $conexion->prepare($consulta);
            // $sentencia->execute();
            // $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            // echo json_encode($resultados)
            try {
                $consulta = "INSERT INTO preguntas(textPregunta, respuestaPregunta) VALUES (?,?);"; // Tal vez falle el punto y coma
                $stmt = $this->bd->prepare($consulta);
                if (!$stmt) {
                    throw new Exception("Error al preparar la consulta: " . $this->bd->error);
                }
                // Vincula los parámetros
                $stmt->bind_param(
                    "ss",  // Tipos de datos: string, string, int, string, string
                    $this->textPregunta,
                    $this->respuestaPregunta
                );
                // Ejecuta la consulta
                if (!$stmt->execute()) {
                    throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
                }
                // Cierra el statement
                $stmt->close();
            }catch (Exception $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
            }
        }
        //Mostrar pregunta
        public function mostrarPregunta(){
            $consulta = "SELECT * FROM preguntas WHERE idPregunta=".$this->codPregunta;
            $sentencia = $this->bd->prepare($consulta); //Devuelve un objeto del tipo mySQLli
            // Compruebo que este bien la sentencia
            $this->bd->set_charset("utf8");
            if (!$sentencia) {
                throw new Exception("Error al preparar la consulta: " . $this->bd->error);
            }

            //Bindear el resultado. Pasarle donde se van a guardar los resultados
            $sentencia->bind_result($this->codPregunta,$this->textPregunta,$this->respuestaPregunta);
            // Ejecuto la sentencia
            $sentencia->execute();
            
            while($sentencia->fetch()){
                $nRespuestas = explode(",",$this->respuestaPregunta);
                echo "<h3>".$this->textPregunta."</h3>";
                for ($i=0; $i < count($nRespuestas); $i++) { 
                    echo "<input type=\"text\" name=\"respuesta".$i."\">";
                }
            }
            $sentencia->close();
        }
    }
    class usuario{
        // Atributos de la clase
        private $bd; // Para conectarse con la base de datos
        private $username; 
        private $tmp_inicio;
        private $tmp_final;
        private $tmp_total;
        // Para crear una instancia de usuario
        public function __construct ($db, String $u="", int $tmpIn=0, int $tmpFn=0, int $tmpTo=0){
            $this->bd=$db; // La conexion
            $this->username=$u; // El nombre de usuario
            $this->tmp_inicio=$tmpIn;
            $this->tmp_final=$tmpFn;
            $this->tmp_total=$tmpTo;
        }
        // Para añadir usuarios a la base de datos
        public function insertarUsuario(){
            $error = false;
            try {
                $consulta = "INSERT INTO usuarios(usuario, tmpInicio, tmpFinal, tmpTotal) VALUES (?,?,?,?);"; // Tal vez falle el punto y coma
                $stmt = $this->bd->prepare($consulta);
                if (!$stmt) {
                    header("Location:index.php?errIni=1");
                    $error = true;
                }
                // Vincula los parámetros
                $stmt->bind_param(
                    "siii",  // Tipos de datos: string, string, int, string, string
                    $this->username,
                    $this->tmp_inicio,
                    $this->tmp_final,
                    $this->tmp_total
                );
                // Ejecuta la consulta
                if (!$stmt->execute()) {
                    header("Location:index.php?errIni=1");
                    $error = true;
                }
                // Cierra el statement
                $stmt->close();
            }catch (Exception $e) {
                // Manejo de errores
                header("Location:index.php?errIni=1");
                $error = true;
            }
            return $error;
        }

    }
?>