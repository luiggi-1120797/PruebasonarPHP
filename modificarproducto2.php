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
    $sql="UPDATE productos SET nombre_producto='".$_POST['nombreProducto']."', precio_producto='".$_POST['precioProducto']."',
    departamento_producto='".$_POST['departamento']."', codigo_producto='".$_POST['codigoProducto']."'
      WHERE id_producto=".$_POST['idProducto'].";";

    //echo $sql;
    $resultado=$conexion->query($sql);
    //print_r($resultado);
    //$renglon =$resultado->fetch_assoc();
    //print_r($renglon);
  header("Location:products.php");
}

?>

