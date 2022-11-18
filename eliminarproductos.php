<?php 
session_start();
if (empty($_SESSION['login'])) {
    header("Location:index.php");
}

    //print_r($_GET);
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
     $sql= "DELETE FROM productos WHERE id_producto=".$_GET['id_producto'];
       
       // echo $sql;
        $resultado=$conexion->query($sql);
        header("Location:products.php");
    }


?>