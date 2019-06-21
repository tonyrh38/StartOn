<?php
namespace es\ucm\fdi\aw;

class FormularioCrearEvento extends Form
{
    public function __construct() {
        parent::__construct('formCrearEvento');
    }
    
    protected function generaCamposFormulario($datos) {
        $html = <<<EOF
        <label>Nombre del evento:</label> <input class="campo-form" type="text" name="nombre" value="" >
        <label>Localización:</label><input class="campo-form" type="text" name= "localidad" value="">
        <label>Precio:</label><input class="campo-form" type="text" name= "precio" value="">
        <label>Aforo:</label> <input class="campo-form" type="number" name="aforo" value="">
        <label>Fecha:</label> <input class="campo-form" type="date" name="fecha" value="">
        <input class="botonSubmit" type="submit" name="submit" value="Confirmar">
EOF;
        return $html;
    }
    
    protected function procesaFormulario($datos) {
        $result = array();
        $SA = SA_Empresa::getInstance();

        $nombre = isset($datos['nombre']) ? self::test_input($datos['nombre']) : null;
        if (empty($nombre)) {
            $result[] = "Debes ponerle un nombre a tu evento. ";
        }
        else if ($SA->getElement($nombre) != null) {
            $result[] = "El nombre ya está siendo usado por otro evento. ";
        }
        $localidad = isset($datos['localidad']) ? self::test_input($datos['localidad']) : null;
        if (empty($localidad)) {
            $result[] = "Debes celebrar el evento en algún sitio. ";
        }
        $precio = isset($datos['precio']) ? self::test_input($datos['precio']) : "Gratis";
        $aforo = isset($datos['aforo']) ? self::test_input($datos['aforo']) : null;
        if ($aforo <= 0) {
            $result[] = "El aforo no puede ser 0 o menor que 0. ";
        }
        $fecha = isset($datos['fecha']) ? self::test_input($datos['fecha']) : null;
        if (empty($fecha) || $fecha < date('Y-m-j')) {
            $result[] = "El evento no puede celebrarse en el pasado. ";
        }
        if (count($result) === 0) {
            $SA = SA_Eventos::getInstance();
            $transfer = new TransferEventos($nombre, $localidad ,$precio, $aforo, $fecha,"resources/img/events/event.png");

            $user = $SA->createElement($transfer);
            if ($user != null) {
                $result = "listaEventos.php";
            }
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