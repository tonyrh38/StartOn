<?php

require_once("DAO_Interface.php");


class DAO_Usuario implements  DAO_Interface {

    private static $instance = null;
    private $db;
    //Evitamos asi la contruccion de la clase
    private function __construct() {
    }
    //Para acceder a la instacia de la clase
     public static function getInstance() {
        if (self::$instance == null) {
          self::$instance = new DAO_Usuario();
        }
        return self::$instance;
      }

	//METODOS
	public function createElement($transfer){//crea usuario
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$nombre=$transfer->getNombre();
		$apellido=$transfer->getApellido();
		$idUser=$transfer->getId_Usuario();
		$email=$transfer->getEmail();
		$password=$transfer->getPassword();
		$imagen=$transfer->getImagenPerfil();
		$localizacion=$transfer->getLocalizacion();
		$pasiones=$transfer->getPasiones();
		$cartaPresentacion=$transfer->getCartaPresentacion();
		$oficio=$transfer->getOficio();
		$experiencia=$transfer->getExperiencia();
		$curriculum=$transfer->getCurriculum();

		if($imagen == NULL)
		{
			$consulta="INSERT INTO usuario (ID_usuario, email, password, Nombre, Apellidos, Localizacion, Experiencia, Pasiones, CartaPresentacion, Img_Perfil, Oficio, Curriculum) VALUES('$idUser' ,'$email', '$password', '$nombre', '$apellido', '$localizacion', '$experiencia','$pasiones', '$cartaPresentacion', 'img/usuario.png', '$oficio', '$curriculum')";
		}
		else
		{
			$consulta="INSERT INTO usuario  (ID_usuario, email, password, Nombre, Apellidos, Localizacion, Experiencia, Pasiones, CartaPresentacion, Img_Perfil, Oficio, Curriculum) VALUES('$idUser' ,'$email', '$password', '$nombre', '$apellido', '$localizacion', '$experiencia' ,'$pasiones', '$cartaPresentacion', '$imagen', '$oficio', '$curriculum')";
		}
		return $conn->query($consulta);
	}
//--------------------------
	public function getElementById($id){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta = "SELECT * FROM usuario WHERE ID_usuario='$id'";//consulta sql
		$results = mysqli_query($db, $consulta);

		if (mysqli_num_rows($results) == 1) {  //si se encuentra la fila, el usuario y contraseña son correctas
			$usuario = mysqli_fetch_assoc($results);
			//cambio
			if($usuario["Img_Perfil"] == NULL)	{
				return new TransferUsuario($usuario["ID_usuario"],$usuario["Nombre"],$usuario["Apellidos"],
        $usuario["password"], $usuario["email"], $usuario["Localizacion"], $usuario["Experiencia"], $usuario["Pasiones"], $usuario["CartaPresentacion"], $usuario["Img_Perfil"], $usuario["Oficio"], $usuario["Curriculum"]);
			}
			else{
				return new TransferUsuario($usuario["ID_usuario"],$usuario["Nombre"],$usuario["Apellidos"],
        $usuario["password"], $usuario["email"], $usuario["Localizacion"], $usuario["Experiencia"], $usuario["Pasiones"], $usuario["CartaPresentacion"], $usuario["Img_Perfil"], $usuario["Oficio"], $usuario["Curriculum"]);
		}
		}
		else {
			return null;//NULL
		}
	}

//--------------------------
	public function deleteElement($id){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta="DELETE FROM usuario WHERE ID_usuario = '$id'";
		if (mysqli_query($db, $consulta)){
			return true;
		} else{
			return false;
		}
	}
//--------------------------
public function updateElement($id, $campo, $nuevoValor) {
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		if($campo == "fotoPerfil")
		{
			$query = "SELECT fotoPerfil FROM usuario WHERE ID_usuario = '$id'";
			$results  = mysqli_query($db, $query);
			if(mysqli_num_rows($results) != 0)
			{
				while($fila=mysqli_fetch_assoc($results))
				{
					$imagen = $fila["fotoPerfil"];
					unlink('./imagenPerfil/'.$imagen);		//TO DO
				}

			}
		}

		$consulta="UPDATE usuario SET ".$campo." = '".$nuevoValor."' WHERE ID_usuario = '".$id."'";
		$res = mysqli_query($db, $consulta) ? false : true;
    return $res;
	}

    //--------------------------
	public function getAllElements(){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$lista= array();

		$consul = "SELECT * FROM usuario ORDER BY ID_usuario";
		$query = mysqli_query($db, $consul);

		if ($query) {
			while($fila=mysqli_fetch_assoc($query)){
        $transfer = new TransferUsuario($fila["ID_usuario"],$fila["Nombre"],$fila["Apellidos"],
        $fila["password"], $fila["email"], $fila["Localizacion"], $fila["Experiencia"], $fila["Pasiones"], $fila["CartaPresentacion"], $fila["Img_Perfil"], $fila["Oficio"], $fila["Curriculum"]);

				array_push($lista,$transfer);
			}
		}
		return empty($lista) ? null : $lista;
	}

	/**Esta funcion se encarga de buscar un elemento en la base de datos a traves del campo gmail
	@param gmail: recibe un string del tipo email
	@return id: devuelve un transfer referenciado a ese gmail o un objeto nul
	*/
	public function getElementByEmail($gmail) {
	   $app = Aplicacion::getSingleton();
	   $conn = $app->conexionBd();
	    //Buscamos en la base de datos el posble gmail

	     $consulta = sprintf("SELECT * FROM usuario WHERE email = '$gmail' ORDER BY nombre");
	     $consulta2= sprintf("SELECT * FROM empresa WHERE email = '$gmail' ORDER BY nombre");
	     $res = $conn->query($consulta);
	     $res2 = $conn->query($consulta2);
        //Si la consulta fuese tan correcta
	     if (mysqli_num_rows($res) != 0){
	     	$usuario = mysqli_fetch_assoc($res);
			$transfer = new TransferUsuario($usuario["ID_usuario"],$usuario["Nombre"],$usuario["Apellidos"],
      		$usuario["password"], $usuario["email"], $usuario["Localizacion"], $usuario["Experiencia"], $usuario["Pasiones"], $usuario["CartaPresentacion"], $usuario["Img_Perfil"], $usuario["Oficio"], $usuario["Curriculum"]);
			return $transfer;
		}
		elseif (mysqli_num_rows($res2) != 0) {
			return 1;
		}
		return NULL;
	}
  public function getAllElementsById($id) {
    $app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$lista= array();

		$consul = "SELECT * FROM usuario ORDER BY $id";
		$query = mysqli_query($db, $consul);

		if ($query){
			while($fila = mysqli_fetch_assoc($query)) {
        $transfer = new TransferUsuario($usuario["ID_usuario"],$usuario["Nombre"],$usuario["Apellidos"],
            $usuario["password"], $usuario["email"], $usuario["Localizacion"], $usuario["Experiencia"],
            $usuario["Pasiones"], $usuario["CartaPresentacion"], $usuario["Img_Perfil"], $usuario["Oficio"],
            $usuario["Curriculum"]);
				array_push($lista,$transfer);
			}
		}
    return empty($lista) ? null : $lista;
  }

}
?>
