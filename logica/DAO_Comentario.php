<?php

require_once("DAO_Interface.php");

class DAO_Comentario{

    private static $instance = null;

    //Evitamos asi la contruccion de la clase
    private function __construct() {  }

    //Para acceder a la instacia de la clase
     public static function getInstance() {
        if (self::$instance == null) {
          self::$instance = new DAO_Comentario();
        }
        return self::$instance;
      }

	//METODOS
  public function createElement($transfer) {//crea usuario

		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$NombreEvento=$transfer->getNombreEvento();
		$id_usuario=$transfer->getId_Usuario();
    $Titulo=$transfer->getTitulo();
    $Contenido=$transfer->getContenido();


		$consulta="INSERT INTO comentario (NombreEvento, ID_Usuario, Titulo, Contenido) VALUES('$NombreEvento' ,'$id_usuario','$Titulo', '$Contenido')";
		$rs = $conn->query($consulta);

    if(!$rs) echo "<br>".$conn->error."<br>";
		return $rs;
	}
//--------------------------
	public function getElementsByNombreEvento($NombreEvento){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta = "SELECT * FROM comentario WHERE NombreEvento='$NombreEvento'";//consulta sql
		$results = mysqli_query($db, $consulta);
    $lista = array();

    if ($results){
			while($Comentario = mysqli_fetch_assoc($results)){
                $transfer = new transferComentario($Comentario["NombreEvento"],$Comentario["ID_Usuario"],$Comentario["Titulo"],$Comentario["Contenido"]);
				array_push($lista,$transfer);
			}
		}
    return empty($lista) ? null : $lista;
		}

    public function getElementsByIdUsuario($id_Usuario){
      $app = Aplicacion::getSingleton();
      $db = $app->conexionBd();
      $consulta = "SELECT * FROM comentario WHERE ID_Usuario='$id_Usuario'";//consulta sql
      $results = mysqli_query($db, $consulta);
      $lista = array();

      if ($results){
  			while($Comentario = mysqli_fetch_assoc($results)){
                  $transfer = new transferComentario($Comentario["NombreEvento"],$Comentario["ID_Usuario"],$Comentario["Titulo"],$Comentario["Contenido"]);
  				array_push($lista,$transfer);
  			}
  		}
      return empty($lista) ? null : $lista;
      }

      public function getElementsByIds($NombreEvento, $id_Usuario){
        $app = Aplicacion::getSingleton();
        $db = $app->conexionBd();
        $consulta = "SELECT * FROM comentario WHERE NombreEvento = '$NombreEvento' AND ID_Usuario='$id_Usuario'";//consulta sql

        $res = mysqli_query($db, $consulta);
        if($res->num_rows > 0){
          return $res;
        }
        return false;
        }
//--------------------------
	public function deleteElement($NombreEvento, $id_Usuario){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta="DELETE FROM comentario WHERE NombreEvento = '$NombreEvento' AND ID_Usuario = '$id_Usuario'";
		$res = mysqli_query($db, $consulta)? true : false;
    return $res;
	}

  public function deleteElementByNombreEvento($NombreEvento){
    $app = Aplicacion::getSingleton();
    $db = $app->conexionBd();
    $consulta="DELETE FROM comentario WHERE NombreEvento = '$NombreEvento'";
    $res = mysqli_query($db, $consulta)? true : false;
    return $res;
  }

  public function deleteElementByIdUsuario($NombreEvento){
  		$app = Aplicacion::getSingleton();
  		$db = $app->conexionBd();
  		$consulta="DELETE FROM comentario WHERE ID_Usuario = '$id_Usuario'";
  		$res = mysqli_query($db, $consulta)? true : false;
      return $res;
  	}
//--------------------------
 function getAllElements(){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$lista= array();

		$consul = "SELECT * FROM comentario ORDER BY NombreEvento";
		$query = mysqli_query($db, $consul);

		if ($query){
			while($Comentario = mysqli_fetch_assoc($query)){
                $transfer = new transferComentario($Comentario["NombreEvento"],$Comentario["ID_Usuario"],$Comentario["Titulo"],$Comentario["Contenido"]);
				array_push($lista,$transfer);
			}
		}
    return empty($lista) ? null : $lista;
	}
}
?>
