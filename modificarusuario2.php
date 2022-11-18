<?php 
session_start();
if (empty($_SESSION['login'])) {
    header("Location:index.php");
}


 
    // print_r($_POST);
    $server="localhost";
    $user="id14611743_vic";
    $password="y!x53SP_?*F72g|w";
    $db="id14611743_punto_de_venta";
 
     //creando conexion
     $conexion= new mysqli($server, $user, $password, $db);
     //verificamos conexion
     if ($conexion->connect_error) {
         echo "Algo salio mal";
     } else {
         //echo "Todo bien";
         $sql="UPDATE usuarios SET password_usuario='".$_POST['passwordUsuario']."', nombre_usuario='".$_POST['nombreUsuario']."', 
         apellido1_usuario='".$_POST['apellidoUsuario1']."', apellido2_usuario='".$_POST['apellidoUsuario2']."', email_usuario='".$_POST['emailUsuario']."'
           WHERE id_usuario=".$_POST['idUsuario'].";";

        //echo $sql;
        $resultado=$conexion->query($sql);
        //print_r($resultado);
        //$renglon =$resultado->fetch_assoc();
        //print_r($renglon);
      header("Location:users.php");
     }
?>