<?php
namespace es\ucm\fdi\aw;

class FormularioRegistroEmpresa extends Form
{
    public function __construct() {
        parent::__construct('formRegistro');
    }
    
    protected function generaCamposFormulario($datos) {
        $nombre = '';
        $apellido = '';
        $email = '';
        if ($datos) {
            $nombre = isset($datos['nombre']) ? self::test_input($datos['nombre']) : $nombre;
            $email = isset($datos['email']) ? self::test_input($datos['email']) : $email;
        }
        $html = <<<EOF
        <label>Nombre de la empresa:</label> <input class="campo-form" type="text" name="nombre" value="$nombre">
        <label>Email:</label> <input class="campo-form" type="email" name="email" value="$email">
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
            $result[] = "El nombre tiene que tener una longitud de al menos 5 caracteres. ";
        }

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
            $SA = SA_Empresa::getInstance();
            $transfer = new TransferEmpresa("",$nombre,$password, $email,"", "" ,"" ,"","resources/img/startups/imgS0.png","","","", "");
            $user = $SA->createElement($transfer);
            if ( $user == null ) {
                $result[] = "El usuario ya existe. ";
            } else {
                $_SESSION['login'] = true;
                $_SESSION['id_empresa'] = $user->getId_Empresa();
                $_SESSION['nombre'] = $user->getNombre();
                $result = 'perfEmp.php';
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