<?php
namespace es\ucm\fdi\aw;

class DAO_Eventos
{

    private static $instance = null;

    //Evitamos asi la contruccion de la clase
    private function __construct() {  }

    //Para acceder a la instacia de la clase
     public static function getInstance() {
        if (self::$instance == null) {
          self::$instance = new DAO_Eventos();
        }
        return self::$instance;
      }

	//METODOS
     public function createElement($transfer) {
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $id_empresa = $_SESSION['id_empresa'];

        $Nombre = $transfer->getNombre();
        $Localizacion = $transfer->getLocalizacion();
        $Precio = $transfer->getPrecio();
        $Cantidad = $transfer->getCantidad();
        $Fecha = $transfer->getFecha();
        $Img_Evento = $transfer->getImagenEvento();
        $consulta_emp = "INSERT INTO crea_evento (ID_Empresa, Nombre_Evento) VALUES('$id_empresa', '$Nombre')";
	$consulta="INSERT INTO evento (Nombre, Localizacion, Precio, Cantidad, Fecha, Img_Evento) VALUES('$Nombre', '$Localizacion', '$Precio', '$Cantidad', '$Fecha', '$Img_Evento')";
	$rs = $conn->query($consulta);
	$res = $conn->query($consulta_emp);
	if(!$rs) echo "<br>".$conn->error."<br>";
	if(!$res) echo "<br>".$conn->error."<br>";
	return $rs;
     }
//--------------------------
	public function getElementById($id){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta = "SELECT * FROM evento WHERE nombre ='$id'";//consulta sql
		$results = mysqli_query($db, $consulta);

		if (mysqli_num_rows($results) == 1) {  //si se encuentra la fila, el usuario y contraseña son correctas
			$eventos = mysqli_fetch_assoc($results);
			//cambio
			if($eventos["Img_Evento"] == NULL)	{
					return new  TransferEventos($eventos["Nombre"],$eventos["Localizacion"],
          $eventos["Precio"],$eventos["Cantidad"],$eventos["Fecha"],$eventos["Img_Evento"]);
			}
			else{
			    return new TransferEventos($eventos["Nombre"],$eventos["Localizacion"],
          $eventos["Precio"],$eventos["Cantidad"],$eventos["Fecha"],$eventos["Img_Evento"]);
			}
		}
		else {
			return null;
		}
	}
//--------------------------
	public function deleteElement($id) {
    $app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta="DELETE FROM evento WHERE Nombre = '$id'";
		if (mysqli_query($db, $consulta)){
			return true;
		} else{
			return false;
		}	}
//--------------------------
	public function updateElement($id, $campo, $nuevoValor) {
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta="UPDATE evento SET ".$campo." = '".$nuevoValor."' WHERE Nombre = '".$id."'";
		$res = mysqli_query($db, $consulta) ? true : false;
    	return $res;
	}
    //--------------------------
	public function getAllElements(){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$lista= array();

		$consul = "SELECT * FROM evento ORDER BY nombre";
		$query = mysqli_query($db, $consul);

		if ($query){
			while($fila = mysqli_fetch_assoc($query)){
                $transfer = new TransferEventos($fila["Nombre"],$fila["Localizacion"],
                $fila["Precio"],$fila["Cantidad"],$fila["Fecha"],$fila["Img_Evento"]);
				array_push($lista, $transfer);
			}
		}
    return empty($lista) ? null : $lista;
	}

  /*public function getAllElementsByIdEmpresa($id){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$lista= array();

		$consul = "SELECT * FROM crea_evento WHERE ID_Empresa = '$id'";
		$query = mysqli_query($db, $consul);

		if ($query){
			while($fila = mysqli_fetch_assoc($query)){
                $transfer = $fila["Nombre_Evento"];
				array_push($lista, $transfer);
			}
		}
    return empty($lista) ? null : $lista;
	}*/

	public function getElementByEmail($gmail) {
	 return false;
	}
  public function getAllElementsById($id) {
    $app = Aplicacion::getSingleton();
    $db = $app->conexionBd();
    $lista= array();

    $consul = "SELECT * FROM evento ORDER BY $id";
    $query = mysqli_query($db, $consul);

    if ($query){
      while($fila = mysqli_fetch_assoc($query)){
                $transfer = new TransferEventos($fila["Nombre"],$fila["Localizacion"],
                $fila["Precio"],$fila["Cantidad"],$fila["Fecha"],$fila["Img_Evento"]);
        array_push($lista, $transfer);
      }
    }
    return empty($lista) ? null : $lista;
  }
	public function crearUnion($id_user, $nombre_evento){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consul = "INSERT INTO user_apunta_evento (ID_Usuario, Event_Name) VALUES('$id_user', '$nombre_evento')";
		$rs = $db->query($consul);
		if(!$rs) echo "<br>".$db->error."<br>";
		return $rs;
	}
	public function eliminarUnion($id,$event){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta="DELETE FROM user_apunta_evento WHERE ID_Usuario ='$id' AND Event_Name ='$event'";
		$res = mysqli_query($db, $consulta)? true : false;
    	return $res;
	}
	public function existeUnion($id_user, $nombre_evento){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consul = "SELECT * FROM user_apunta_evento WHERE ID_Usuario ='$id_user' AND Event_Name ='$nombre_evento'";
		$query = mysqli_query($db, $consul);
		if(mysqli_num_rows($query)==0)
			return false;
		else
			return true;
	}
	public function numberUsersEvent($nombre){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consul = "SELECT * FROM user_apunta_evento WHERE Event_Name ='$nombre'";
		$query = mysqli_query($db, $consul);
		return mysqli_num_rows($query);
	}
	public function getEventEmpresa($evento){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consul = "SELECT * FROM crea_evento WHERE Nombre_Evento ='$evento'";
		$query = mysqli_query($db, $consul);
		if(mysqli_num_rows($query) > 0){
			$row = mysqli_fetch_assoc($query);
			return $row["ID_Empresa"];
		}
		return "0";
	}

  /*public function empresaEliminada($id){
    $app = Aplicacion::getSingleton();
    $db = $app->conexionBd();

    $DAO_Eventos=DAO_Eventos::getInstance();
    $empList = $DAO_Eventos->getAllElementsByIdEmpresa($id);

    $consulta="DELETE FROM crea_evento WHERE ID_Empresa = '$id'";
    mysqli_query($db, $consulta);

    foreach($empList as $value){
      $DAO_Eventos->deleteElement($value);
    }

  }*/
}
?>
