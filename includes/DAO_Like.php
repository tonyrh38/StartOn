<?php
namespace es\ucm\fdi\aw;

class DAO_Like 
{

    private static $instance = null;

    //Evitamos asi la contruccion de la clase
    private function __construct() {  }

    //Para acceder a la instacia de la clase
     public static function getInstance() {
        if (self::$instance == null) {
          self::$instance = new DAO_Like();
        }
        return self::$instance;
      }

	//METODOS
  public function createElement($transfer) {//crea usuario

		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$ID_Empresa=$transfer->getId_Empresa();
		$id_usuario=$transfer->getId_Usuario();

		$consulta="INSERT INTO interaccion_emp_us (ID_Empresa, ID_Usuario) VALUES('$ID_Empresa' ,'$id_usuario')";
		$rs = $conn->query($consulta);

    if(!$rs) echo "<br>".$conn->error."<br>";
		return $rs;
	}
//--------------------------
	public function getElementsByIdEmpresa($id_Empresa){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta = "SELECT * FROM interaccion_emp_us WHERE ID_Empresa='$id_Empresa'";//consulta sql
		$results = mysqli_query($db, $consulta);
    $lista = array();

    if ($results){
			while($likes = mysqli_fetch_assoc($results)){
        $transfer = new transferLike($likes["ID_Empresa"],$likes["ID_Usuario"]);
				array_push($lista,$transfer);
			}
		}
    return empty($lista) ? null : $lista;
		}

    public function getElementsByIdUsuario($id_Usuario){
      $app = Aplicacion::getSingleton();
      $db = $app->conexionBd();
      $consulta = "SELECT * FROM interaccion_emp_us WHERE ID_Usuario='$id_Usuario'";//consulta sql
      $results = mysqli_query($db, $consulta);
      $lista = array();

      if ($results){
  			while($likes = mysqli_fetch_assoc($results)){
          $transfer = new transferLike($likes["ID_Empresa"],$likes["ID_Usuario"]);
  				array_push($lista,$transfer);
  			}
  		}
      return empty($lista) ? null : $lista;
      }

      public function getElementsByIds($id_Empresa, $id_Usuario){
        $app = Aplicacion::getSingleton();
        $db = $app->conexionBd();
        $consulta = "SELECT * FROM interaccion_emp_us WHERE ID_Empresa = '$id_Empresa' AND ID_Usuario='$id_Usuario'";//consulta sql

        $res = mysqli_query($db, $consulta);
        if($res->num_rows > 0){
          return $res;
        }
        return false;
        }
//--------------------------
	public function deleteLike($id_Empresa, $id_Usuario){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta="DELETE FROM interaccion_emp_us WHERE ID_Empresa = '$id_Empresa' AND ID_Usuario = '$id_Usuario'";
		$res = mysqli_query($db, $consulta)? true : false;

    $DAO_Empresa = DAO_Empresa::getInstance();
    $DAO_Empresa->actualizarNumLikes($id_Empresa, 0);
    return $res;
	}

  public function deleteElement($id){}

  public function deleteElementByIdEmpresa($id_Empresa){
    $app = Aplicacion::getSingleton();
    $db = $app->conexionBd();
    $consulta="DELETE FROM interaccion_emp_us WHERE ID_Empresa = '$id_Empresa'";
    $res = mysqli_query($db, $consulta)? true : false;
    return $res;
  }

  public function deleteElementByIdUsuario($id_Empresa){
  		$app = Aplicacion::getSingleton();
  		$db = $app->conexionBd();
  		$consulta="DELETE FROM interaccion_emp_us WHERE ID_Usuario = '$id_Usuario'";
  		$res = mysqli_query($db, $consulta)? true : false;
      return $res;
  	}
//--------------------------
 function getAllElements(){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$lista= array();

		$consul = "SELECT * FROM interaccion_emp_us ORDER BY ID_Empresa";
		$query = mysqli_query($db, $consul);

		if ($query){
			while($likes = mysqli_fetch_assoc($query)){
                $transfer = new transferLike($likes["ID_Empresa"],$likes["ID_Usuario"]);
				array_push($lista,$transfer);
			}
		}
    return empty($lista) ? null : $lista;
	}


  function insertLike($idEmpresa, $idusuario){
    $DAO_Empresa = DAO_Empresa::getInstance();
    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();

    if(empty($idEmpresa) || empty($idusuario)){
      echo "Esta vacio algo";
      return "error";
    }
    else{
    $consulta="INSERT INTO interaccion_emp_us (ID_Empresa, ID_Usuario) VALUES('$idEmpresa' ,'$idusuario')";
		$rs = $conn->query($consulta);

    $DAO_Empresa->actualizarNumLikes($idEmpresa, 0);

    if(!$rs) echo "<br>".$conn->error."<br>";
		return $rs;
  }
  }
}
?>
