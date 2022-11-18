<?php
 /*
print_r($_POST);
echo "<br>\n";
echo $_POST["usr"];
echo "<br>";
echo $_POST["psw"];
*/
$server="localhost";
$user="id14611743_vic";
$password="y!x53SP_?*F72g|w";
$db="id14611743_punto_de_venta";

$conexion= new mysqli($server, $user, $password, $db);
if ($conexion->connect_error) {
    echo "Algo salio mal";
} else {
    //echo "Todo bien";
    $sql="SELECT * FROM usuarios
    WHERE nombre_usuario=\"".$_POST["usr"]."\" AND password_usuario=SHA1(\"".$_POST["psw"]."\")";
    //echo $sql;
}
$resultado=$conexion->query($sql);
//echo "resultado ".$resultado;
if ($resultado->num_rows >0) {
   // echo "La tabla tiene ".$resultado->num_rows."registros";
    //echo "Se encontro al usuario";
    session_start();
    $renglon =$resultado->fetch_assoc();
    $_SESSION['login']=$renglon['nombre_usuario']." ".$renglon['apellido1_usuario']." ".$renglon['apellido2_usuario'];
    header("Location:main_menu.php"); 
} else{
    //echo "No se encontro el usuario";
    header ("location:index.php");
}
    ?>