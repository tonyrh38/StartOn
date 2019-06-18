<?php
namespace es\ucm\fdi\aw;

class FormularioLogin extends Form {

    public function __construct() {
        parent::__construct('formLogin');
    }
    
    protected function generaCamposFormulario($datos) {
        $email = '';
        if ($datos) {
            $email = isset($datos['nombreUsuario']) ? test_input($datos['nombreUsuario']) : $email;
        }
        $html = <<<EOF
        <label>E-mail:</label> <input class="campo-form" type="email" name="email" value="$email" >
        <label>Contraseña:</label> <input class="campo-form" type="password" name="password" value="" >
        <input class="botonSubmit" type="submit" name="submit" value="Submit">
EOF;
        return $html;
    }
    
    protected function procesaFormulario($datos) {
        $result = array();
        
        $email = isset($datos['email']) ? self::test_input($datos['email']) : null;
                
        if ( empty($email) ) {
            $result[] = "El email no puede estar vacío";
        }
        
        $password = isset($datos['password']) ? sha1(md5(self::test_input($datos['password']))) : null;
        if ( empty($password) ) {
            $result[] = "La contraseña no puede estar vacía.";
        }
        
        if (count($result) === 0) {
            $SA = SA_Usuario::getInstance();
            $transfer = new TransferUsuario("","","",$password, $email,"", "" ,"" ,"","", "","");
            $id = $SA->login($transfer);
            if ( ! $usuario ) {
                // No se da pistas a un posible atacante
                $result[] = "El usuario o el password no coinciden";
            } else {
                $_SESSION['login'] = true;
                $_SESSION['nombre'] = $nombreUsuario;
                $_SESSION['esAdmin'] = strcmp($usuario->rol(), 'admin') == 0 ? true : false;
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