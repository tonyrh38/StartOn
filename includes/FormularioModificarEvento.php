<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/../includes/config.php';

class FormularioModificarEvento extends Form
{
    public function __construct() {
        parent::__construct('formModificar');
    }
    
    protected function generaCamposFormulario($datos) {
        $html = <<<EOF
        <label>Nombre:</label> <input class="campo-form" type="text" name="nombre" value="" >
        <label>Localización:</label><input class="campo-form" type="text" name= "localidad" value="">
        <label>Precio:</label><input class="campo-form" type="text" name= "precio" value="">
        <label>Aforo:</label> <input class="campo-form" type="number" name="aforo" value="">
        <label>Fecha:</label> <input class="campo-form" type="date" name="fecha" value="">
        <label>Imagen:</label> <input type="file" style="margin-bottom:10px" name="imagen" accept="image/png, image/jpeg" value="">
        <div class="row">
        <input class="botonSubmit" type="submit" name="submit" value="Confirmar">
        <input class="botonSubmit" type="button" value="Borrar Perfil" onclick="borrarPerfil()"></input>
        </div>
        <script type="text/javascript">
        function borrarPerfil(){
        if(confirm("¿Estás seguro de que quieres borrar tu evento? (Los datos guardados se perderán para siempre)")){
        window.location.assign("delete_evento.php");
        }
        }
        </script>
EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos) {
        $result = array();
        $SA = SA_Eventos::getInstance();
        $nombre_antiguo = $SA->getElement($_SESSION["id_evento"])->getNombre();

        $_SESSION["id_evento"] = isset($datos['nombre']) ? self::test_input($datos['nombre']) : $_SESSION["id_evento"];
        if ( !empty($nombre) && $SA->getElement($nombre) != null) {
            $result[] = "El nombre ya está siendo usado por otro evento. ";
        }
        $localidad = isset($datos['localidad']) ? self::test_input($datos['localidad']) : null;
        $precio = isset($datos['precio']) ? self::test_input($datos['precio']) : "Gratis";
        $aforo = isset($datos['aforo']) ? self::test_input($datos['aforo']) : null;
        if (!empty($aforo) && $aforo <= 0) {
            $result[] = "El aforo no puede ser 0 o menor que 0. ";
        }
        $fecha = isset($datos['fecha']) ? self::test_input($datos['fecha']) : null;
        if (!empty($fecha) && $fecha < date('Y-m-j')) {
            $result[] = "El evento no puede celebrarse en el pasado. ";
        }
        if (count($result) === 0) {
            $imagen_destino = "";
            if(isset($_FILES["imagen"]) && $_FILES["imagen"]["name"] != ""){
                $imagen_ruta = $_FILES["imagen"]["tmp_name"];
                if ($_FILES["imagen"]["type"] == "image/jpeg") {
                    $imagen_destino ="resources/img/events/". $_SESSION["id_evento"].".jpg";
                }
                else{
                    $imagen_destino = "resources/img/events/".$_SESSION["id_evento"].".png";
                }
                copy($imagen_ruta,"../".$imagen_destino);
            }
            $transfer = new TransferEventos($nombre_antiguo, $localidad, $precio, $aforo, $fecha, $imagen_destino);
            $user = $SA->updateElement($transfer);
            $result = 'perfEvento.php?id='.$_SESSION["id_evento"];
        }
        return $result;
    }
    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data; 
    }
}
?>