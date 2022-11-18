<?php 
session_start();
if (empty($_SESSION['login'])) {
    header("Location:index.php");
}
 

    //print_r($_POST);
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
        //$sql="SELECT * FROM productos;";
        $sql= "INSERT INTO usuarios (id_usuario, password_usuario,
        nombre_usuario, apellido1_usuario, apellido2_usuario, email_usuario) 
        VALUES (
        ".$_POST['idUsuario'].",
        '".$_POST['passwordUsuario']."',
        '".$_POST['nombreUsuario']."',
        '".$_POST['apellidoUsuario1']."',
        '".$_POST['apellidoUsuario2']."',
        '".$_POST['emailUsuario']."'
        )";
        //echo $sql;
        $resultado=$conexion->query($sql);
       header("Location:users.php");
    }


?>