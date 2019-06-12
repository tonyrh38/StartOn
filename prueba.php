<?php

$conn = new \mysqli("localhost", "root", "","startondb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$nombre= "nombre3";
$apellido= "apellido3";
$idUser= 4;
$email= "email3@gmail.com";
$password= md5("pass");
$localizacion="";
$pasiones="";
$cartaPresentacion="";
$oficio="oficio random 3";
$experiencia="";



$sql = "SELECT * FROM usuario";
$consulta = "SELECT * FROM usuario WHERE email = '$email' ORDER BY nombre";
$consul = "INSERT INTO usuario (ID_usuario, email, password, Nombre, Apellidos, Localizacion, Experiencia, Pasiones, CartaPresentacion, Img_Perfil, Oficio) VALUES('$idUser' ,'$email', '$password', '$nombre', '$apellido', '$localizacion', '$experiencia','$pasiones', '$cartaPresentacion', 'img/usuario.png', '$oficio')";
$result = $conn->query($consulta);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<br> email: " . $row["email"]. " - nombre: " . $row["Nombre"]. "<br>";
    }
} else {
    echo "0 results";
}


$conn->query($consul);

// output data of each row
echo '<pre>';
var_dump($result);
echo '</pre>';

$conn->close();

?>

