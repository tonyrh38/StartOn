<?php
namespace es\ucm\fdi\aw;

class FormularioModificarUsuario extends Form
{
    public function __construct() {
        parent::__construct('formModificar');
    }
    
    protected function generaCamposFormulario($datos) {
        $html = <<<EOF
        <div class="column">
        <label>Nombre:</label> <input class="campo-form" type="text" name="nombre" value="" >
        <label>Apellidos:</label> <input class="campo-form" type="text" name="apellido" value="">
        <label>Email:</label> <input class="campo-form" type="email" name="email" value="">
        <label>Contraseña:</label><input class="campo-form" type="password" name="password" value="" >
        <label>Localidad:</label><input class="campo-form" type="text" name= "localidad" value="">
        <label>Oficio:</label><input class="campo-form" type="text" name= "oficio" value="">
        <label>Imagen:</label><input type="file" name="imagen" accept="image/png, image/jpeg" value="">
        <label>Currículum Vitae:</label><input type="file" name="archivo" accept="application/pdf"value="">
        <input class="botonSubmit" style="margin: 20px" type="submit" name="submit" value="Confirmar">
        <input class="botonSubmit" style="margin: 20px" type="button" value="Borrar Perfil" onclick="borrarPerfil()"></input>
        </div>
        <div class="column">
        <label>Presentación:</label><textarea rows="3" cols="30" style="resize: none" name="presentacion" value=""></textarea>
        <label>Experiencia:</label><textarea style="resize: none" rows="3" cols="30" name="experiencia" value=""></textarea>
        <label>Pasiones:</label><textarea style="resize: none" rows="3" cols="30" name="pasiones" value=""></textarea>
        </div>
        <script type="text/javascript">
        function borrarPerfil(){
        if(confirm("¿Estás seguro de que quieres borrar tu perfil? (Los datos guardados se perderán para siempre)")){
        window.location.assign("delete.php");
        }
        }
        </script>
EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos) {
        $result = array();
        $SA = SA_Usuario::getInstance();

        if(isset($_SESSION['admin']) && $_SESSION['admin'])
            $id_usuario = $_SESSION["id_usuario_modificar"];
        else
            $id_usuario = $_SESSION["id_usuario"];

        $nombre = isset($datos['nombre']) ? self::test_input($datos['nombre']) : null;
        if ( !empty($nombre) && mb_strlen($nombre) < 5 ) {
            $result[] = "El nombre tiene que tener una longitud de al menos 5 caracteres. ";
        }
        $apellido = isset($datos['apellido']) ? self::test_input($datos['apellido']) : null;
        $email = isset($datos['email']) ? self::test_input($datos['email']) : null;       
        if ( !empty($email) && $SA->existEmail($email)) {
            $result[] = "El email ya existe. ";
        }
        $password = isset($datos['password']) ? self::test_input($datos['password']) : null;
        if ( !empty($password) && mb_strlen($password) < 5 ) {
            $result[] = "El password tiene que tener una longitud de al menos 5 caracteres. ";
        }
        $password = sha1(md5($password));
        $localidad = isset($datos['localidad']) ? self::test_input($datos['localidad']) : null;
        $oficio = isset($datos['oficio']) ? self::test_input($datos['oficio']) : null;
        $presentacion= isset($datos['presentacion']) ? self::test_input($datos['presentacion']) : null;
        $experiencia= isset($datos['experiencia']) ? self::test_input($datos['experiencia']) : null;
        $pasiones = isset($datos['pasiones']) ? self::test_input($datos['pasiones']) : null;
        if (count($result) === 0) {
            $archivo_destino = "";
            if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"] != ""){
            $archivo_ruta = $_FILES["archivo"]["tmp_name"];
            $archivo_destino = "resources/cv/curr". $id_usuario.".pdf";
            copy($archivo_ruta,"../".$archivo_destino);
            }
            $imagen_destino = "";
            if(isset($_FILES["imagen"]) && $_FILES["imagen"]["name"] != ""){
                $imagen_ruta = $_FILES["imagen"]["tmp_name"];
                if ($_FILES["imagen"]["type"] == "image/jpeg") {
                    $imagen_destino = "resources/img/users/imgU". $id_usuario.".jpg";
                }
                else{
                    $imagen_destino = "resources/img/users/imgU". $id_usuario.".png";
                }
                copy($imagen_ruta,"../".$imagen_destino);
            }
            $transfer = new TransferUsuario($id_usuario,$nombre,$apellido,$password, $email,$localidad, $experiencia ,$pasiones ,$presentacion,$imagen_destino,$oficio,$archivo_destino);
            $user = $SA->updateElement($transfer);
            $result = 'perfUser.php?id='.$id_usuario;
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