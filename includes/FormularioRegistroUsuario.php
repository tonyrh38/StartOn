<?php
namespace es\ucm\fdi\aw;

class FormularioRegistro extends Form
{
    public function __construct() {
        parent::__construct('formRegistro');
    }
    
    protected function generaCamposFormulario($datos) {
        $nombre = '';
        $apellido = '';
        $email = '';
        if ($datos) {
            $nombre = isset($datos['nombre']) ? test_input($datos['nombre']) : $nombre;
            $apellido = isset($datos['apellido']) ? test_input($datos['apellido']) : $apellido;
            $email = isset($datos['email']) ? test_input($datos['email']) : $email;
        }
        $html = <<<EOF
        <label>Nombre de usuario:</label> <input class="campo-form" type="text" name="nombre" value="$nombre" >
        <label>Apellido:</label> <input class="campo-form" type="text" name="apellido" value="$apellido">
        <label>Contraseña:</label><input class="campo-form" type="password" name="password" value="" >
        <label>Repetir contraseña:</label><input class="campo-form" type="password" name= "password2" value="">
        <input class="botonSubmit" type="submit" name="submit" value="Submit">
EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos) {
        $result = array();
        
        $nombre = isset($datos['nombre']) ? $datos['nombre'] : null;
        if ( empty($nombre) || mb_strlen($nombre) < 5 ) {
            $result[] = "El nombre tiene que tener una longitud de al menos 5 caracteres.";
        }
        
        $password = isset($datos['password']) ? $datos['password'] : null;
        if ( empty($password) || mb_strlen($password) < 5 ) {
            $result[] = "El password tiene que tener una longitud de al menos 5 caracteres.";
        }
        $password2 = isset($datos['password2']) ? $datos['password2'] : null;
        if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
            $result[] = "Los passwords deben coincidir";
        }
        
        if (count($result) === 0) {
            $user = Usuario::crea($nombreUsuario, $nombre, $password, 'user');
            if ( ! $user ) {
                $result[] = "El usuario ya existe";
            } else {
                $_SESSION['login'] = true;
                $_SESSION['nombre'] = $nombreUsuario;
                $result = 'index.php';
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