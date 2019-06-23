<?php
namespace es\ucm\fdi\aw;

class DAO_Empresa 
{

    private static $instance = null;
    private $db;
    //Evitamos asi la contruccion de la clase
    private function __construct() {  }

    //Para acceder a la instacia de la clase
     public static function getInstance() {
        if (self::$instance == null) {
          self::$instance = new DAO_Empresa();
        }
        return self::$instance;
      }

	//METODOS
  public function createElement($transfer) {//crea usuario

		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$ID_Empresa=$transfer->getId_Empresa();
		$Email=$transfer->getEmail();
		$Password=$transfer->getPassword();
		$Nombre=$transfer->getNombre();
		$Img_Empresa=$transfer->getImagenPerfil();
		$Localizacion=$transfer->getLocalizacion();
		$Sector=$transfer->getSector();
		$cartaPresentacion=$transfer->getCartaPresentacion();
		$Oficio=$transfer->getOficio();
		$ofrecemos=$transfer->getOfrecemos();
		$buscamos=$transfer->getBuscamos();
		$Fase=$transfer->getFase();
    	$numLike=$transfer->getNumLikes();
	
		$consulta="INSERT INTO empresa (ID_Empresa, Email, Password, Nombre, Localizacion, Sector, Oficio, Fase, Img_Empresa, cartaPresentacion, ofrecemos, buscamos, numLikes) VALUES('$ID_Empresa' ,'$Email', '$Password', '$Nombre', '$Localizacion', '$Sector', '$Oficio','$Fase', '$Img_Empresa', '$cartaPresentacion', '$ofrecemos', '$buscamos', '0')";
		return $conn->query($consulta);
	}
//--------------------------
	public function getElementById($id){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$consulta = sprintf("SELECT * FROM empresa WHERE ID_Empresa= '%s'", $conn->real_escape_string($id));
		$results = $conn->query($consulta);

		if (mysqli_num_rows($results) == 1) {
			$empresa = mysqli_fetch_assoc($results);
			return new TransferEmpresa($empresa["ID_Empresa"],$empresa["Nombre"],$empresa["Password"],$empresa["Email"], $empresa["Localizacion"], $empresa["Sector"], $empresa["Oficio"], $empresa["Fase"], $empresa["Img_Empresa"], $empresa["cartaPresentacion"], $empresa["buscamos"], $empresa["ofrecemos"], $empresa["numLikes"]);
		}
		else {
			return null;
		}
	}

//--------------------------
	public function getElementByEmail($gmail) {
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
	    //Buscamos en la base de datos el posble gmail
	    $consul = sprintf("SELECT * FROM empresa WHERE Email = '%s' ORDER BY Nombre", $conn->real_escape_string($gmail));
	    $res = mysqli_query($conn, $consul);
		$consul2= sprintf("SELECT * FROM usuario WHERE Email = '%s' ORDER BY Nombre", $conn->real_escape_string($gmail));
	    $res2= mysqli_query($conn, $consul2);
    	//Si la consulta fuese correcta
	  	if (mysqli_num_rows($res) != 0){
	  		$empresa = mysqli_fetch_assoc($res);
			$transfer = new TransferEmpresa($empresa["ID_Empresa"],$empresa["Nombre"],$empresa["Password"],$empresa["Email"], $empresa["Localizacion"], $empresa["Sector"],
        	$empresa["Oficio"], $empresa["Fase"], $empresa["Img_Empresa"], $empresa["cartaPresentacion"], $empresa["buscamos"], $empresa["ofrecemos"], $empresa["numLikes"]);
			return $transfer;
		}
		else if(mysqli_num_rows($res2) != 0)
			$transfer = new TransferEmpresa("0","0","0","0", "0", "0","0", "0", "0", "0", "0", "0", "0");
			return $transfer;
		return null;
	}

//--------------------------
  public function deleteElement($id){
    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();

    $consulta="DELETE FROM empresa WHERE ID_Empresa = '$id'";

    $var = $conn->query($consulta);
    if ($var){
      return true;
    } else{
      return false;
    }
  }
//--------------------------
	public function updateElement($id, $campo, $nuevoValor){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta="UPDATE empresa SET ".$campo." = '$nuevoValor' WHERE ID_Empresa = '$id'";
		$res = mysqli_query($db, $consulta) ? false :true ;
    return $res;
	}

    //--------------------------
	public function getAllElements(){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$lista= array();

		$consul = "SELECT * FROM empresa ORDER BY ID_Empresa";
		$query = mysqli_query($db, $consul);

		if ($query){
			while($fila = mysqli_fetch_assoc($query)){
                $transfer = new TransferEmpresa($fila["ID_Empresa"],$fila["Nombre"],$fila["Password"],$fila["Email"], $fila["Localizacion"], $fila["Sector"],
                  $fila["Oficio"], $fila["Fase"], $fila["Img_Empresa"], $fila["cartaPresentacion"], $fila["ofrecemos"], $fila["buscamos"], $fila["numLikes"]);
				array_push($lista,$transfer);
			}
		}
    return empty($lista) ? null : $lista;
	}

  function getTopTres(){
    $app = Aplicacion::getSingleton();
    $db = $app->conexionBd();
    $lista= array();

    $consul = "SELECT * FROM empresa ORDER BY numLikes DESC";
    $query = mysqli_query($db, $consul);
    if ($query){
			while($fila = mysqli_fetch_assoc($query)){
                $transfer = new TransferEmpresa($fila["ID_Empresa"],$fila["Nombre"],$fila["Password"],$fila["Email"], $fila["Localizacion"], $fila["Sector"],
                  $fila["Oficio"], $fila["Fase"], $fila["Img_Empresa"], $fila["cartaPresentacion"], $fila["ofrecemos"], $fila["buscamos"], $fila["numLikes"]);
				array_push($lista,$transfer);
			}
		}
    return $lista;
  }


  public function actualizarNumLikes($id, $valor) {
    $SAlikes = SA_Like::getInstance();
    $likesList = $SAlikes->getElementsByIdEmpresa($id);
    $numLikes = 0;

    error_reporting(E_ERROR | E_PARSE);
    $numLikes = sizeof($likesList);


		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();

       $consulta="UPDATE empresa SET numLikes = $numLikes WHERE ID_Empresa = '$id'";
       $res = mysqli_query($db, $consulta) ? false :true ;
	}
  public function getAllElementsById($id) {
    $app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$lista= array();

		$consul = "SELECT * FROM empresa ORDER BY $id";
		$query = mysqli_query($db, $consul);

		if ($query){
			while($fila = mysqli_fetch_assoc($query)){
                $transfer = new TransferEmpresa($fila["ID_Empresa"],$fila["Nombre"],$fila["Password"],$fila["Email"], $fila["Localizacion"], $fila["Sector"],
                  $fila["Oficio"], $fila["Fase"], $fila["Img_Empresa"], $fila["cartaPresentacion"], $fila["ofrecemos"], $fila["buscamos"], $fila["numLikes"]);
				array_push($lista,$transfer);
			}
		}
    return empty($lista) ? null : $lista;
  }
}
?>
