<?php
namespace es\ucm\fdi\aw;

class FormularioModificarUsuario extends Form
{
    public function __construct() {
        parent::__construct('formModificar');
    }
    
    protected function generaCamposFormulario($datos) {
        if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION["id_usuario"])){
            $id = $_SESSION['id_usuario'];
            $SA = SA_Usuario::getInstance();
            $transfer = $SA->getElement($id);
        }
        $nombre = '';
        $apellido = '';
        $email = '';
        $localidad = '';
        $oficio = '';
        $presentacion = '';
        $experiencia = '';
        $pasiones = '';
        $nombre = !empty($transfer->getNombre()) ? self::test_input($transfer->getNombre()) : $nombre;
        $apellido = !empty($transfer->getApellido()) ? self::test_input($transfer->getApellido()) : $apellido;
        $email = !empty($transfer->getEmail()) ? self::test_input($transfer->getEmail()) : $email;
        $localidad = !empty($transfer->getLocalizacion()) ? self::test_input($transfer->getLocalizacion()) : $localidad;
        $oficio = !empty($transfer->getOficio()) ? self::test_input($transfer->getOficio()) : $oficio;
        $presentacion = !empty($transfer->getCartaPresentacion()) ? self::test_input($transfer->getCartaPresentacion()) : $presentacion;
        $experiencia = !empty($transfer->getExperiencia()) ? self::test_input($transfer->getExperiencia()) : $experiencia;
        $pasiones = !empty($transfer->getPasiones()) ? self::test_input($transfer->getPasiones()) : $pasiones;
        $html = <<<EOF
        <div class="column">
        <label>Nombre:</label> <input class="campo-form" type="text" name="nombre" value="$nombre" >
        <label>Apellidos:</label> <input class="campo-form" type="text" name="apellido" value="$apellido">
        <label>Email:</label> <input class="campo-form" type="email" name="email" value="$email">
        <label>Contraseña:</label><input class="campo-form" type="password" name="password" value="" >
        <label>Localidad:</label><input class="campo-form" type="text" name= "localidad" value="$localidad">
        <label>Oficio:</label><input class="campo-form" type="text" name= "oficio" value="$oficio">
        <label>Imagen:</label><input type="file" name="imagen" value="">
        <label>Currículum Vitae:</label><input type="file" name="archivo" value="">
        <input class="botonSubmit" style="margin: 20px" type="submit" name="submit" value="Submit">
        </div>
        <div class="column">
        <label>Presentación:</label><textarea rows="3" cols="30" style="resize: none" name="presentacion" value="$presentacion"></textarea>
        <label>Experiencia:</label><textarea style="resize: none" rows="3" cols="30" name="presentacion" value="$experiencia"></textarea>
        <label>Pasiones:</label><textarea style="resize: none" rows="3" cols="30" name="presentacion" value="$pasiones"></textarea>
        </div> 
EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos) {
        $result = array();
        
        $nombre = isset($datos['nombre']) ? $datos['nombre'] : null;
        if ( empty($nombre) || mb_strlen($nombre) < 5 ) {
            $result[] = "El nombre tiene que tener una longitud de al menos 5 caracteres. ";
        }

        $apellido = isset($datos['apellido']) ? self::test_input($datos['apellido']) : null;

        $email = isset($datos['email']) ? self::test_input($datos['email']) : null;
                
        if ( empty($email) ) {
            $result[] = "El email no puede estar vacío. ";
        }
        
        $password = isset($datos['password']) ? $datos['password'] : null;
        if ( empty($password) || mb_strlen($password) < 5 ) {
            $result[] = "El password tiene que tener una longitud de al menos 5 caracteres. ";
        }
        $password2 = isset($datos['password2']) ? $datos['password2'] : null;
        if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
            $result[] = "Los passwords deben coincidir";
        }
        $password = sha1(md5($password));
        if (count($result) === 0) {
            $SA = SA_Usuario::getInstance();
            $transfer = new TransferUsuario("",$nombre,$apellido,$password, $email,"", "" ,"" ,"","resources/img/users/imgU0.png","","");
            $user = $SA->createElement($transfer);
            if ( $user == null ) {
                $result[] = "El usuario ya existe. ";
            } else {
                $_SESSION['login'] = true;
                $_SESSION['id_usuario'] = $user->getId_Usuario();
                $_SESSION['nombre'] = $user->getNombre();
                $result = 'perfUser.php';
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