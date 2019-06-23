<?php
namespace es\ucm\fdi\aw;

class FormularioModificarEmpresa extends Form
{
    public function __construct() {
        parent::__construct('formModificar');
    }
    
    protected function generaCamposFormulario($datos) {
        $html = <<<EOF
        <div class="column">
        <label>Nombre:</label> <input class="campo-form" type="text" name="nombre" value="" >
        <label>Email:</label> <input class="campo-form" type="email" name="email" value="">
        <label>Contraseña:</label><input class="campo-form" type="password" name="password" value="" >
        <label>Localidad:</label><input class="campo-form" type="text" name= "localidad" value="">
        <label>Oficio:</label><input class="campo-form" type="text" name= "oficio" value="">
        <label>Fase:</label> <input class="campo-form" type="text" name="fase" value="">
        <label>Sector:</label> <input class="campo-form" type="text" name="sector" value="">
        <label>Imagen:</label><input type="file" name="imagen" accept="image/png, image/jpeg" value="">
        <input class="botonSubmit" style="margin: 20px" type="submit" name="submit" value="Confirmar">
        <input class="botonSubmit" style="margin: 20px" type="button" value="Borrar Perfil" onclick="borrarPerfil()"></input>
        </div>
        <div class="column">
        <label>Presentación:</label><textarea rows="3" cols="30" style="resize: none" name="presentacion" value=""></textarea>
        <label>Buscamos:</label><textarea style="resize: none" rows="3" cols="30" name="buscamos" value=""></textarea>
        <label>Ofrecemos:</label><textarea style="resize: none" rows="3" cols="30" name="ofrecemos" value=""></textarea>
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
        $SA = SA_Empresa::getInstance();

        if(isset($_SESSION['admin']) && $_SESSION['admin'])
            $id_empresa = $_SESSION["id_empresa_modificar"];
        else
            $id_empresa = $_SESSION["id_empresa"];

        $nombre = isset($datos['nombre']) ? self::test_input($datos['nombre']) : null;
        if ( !empty($nombre) && mb_strlen($nombre) < 5 ) {
            $result[] = "El nombre tiene que tener una longitud de al menos 5 caracteres. ";
        }
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
        $fase = isset($datos['fase']) ? self::test_input($datos['fase']) : null;
        $sector = isset($datos['sector']) ? self::test_input($datos['sector']) : null;
        $presentacion= isset($datos['presentacion']) ? self::test_input($datos['presentacion']) : null;
        $buscamos= isset($datos['buscamos']) ? self::test_input($datos['buscamos']) : null;
        $ofrecemos = isset($datos['ofrecemos']) ? self::test_input($datos['ofrecemos']) : null;
        if (count($result) === 0) {
            $imagen_destino = "";
            if(isset($_FILES["imagen"]) && $_FILES["imagen"]["name"] != ""){
                $imagen_ruta = $_FILES["imagen"]["tmp_name"];
                if ($_FILES["imagen"]["type"] == "image/jpeg") {
                    $imagen_destino = "resources/img/users/imgU". $id_empresa.".jpg";
                }
                else{
                    $imagen_destino = "resources/img/users/imgU". $id_empresa.".png";
                }
                copy($imagen_ruta,"../".$imagen_destino);
            }
            $tEmpActual = $SA->getElement($id_empresa);
            $numLikes= $tEmpActual->getNumLikes();
            $transfer = new TransferEmpresa($id_empresa,$nombre,$password, $email,$localidad,$sector,$oficio, $fase ,$imagen_destino,$presentacion,$buscamos,$ofrecemos, $numLikes);
            
            $user = $SA->updateElement($transfer);
            $result = 'perfEmp.php?id='.$id_empresa;
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