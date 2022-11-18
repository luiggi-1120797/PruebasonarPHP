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
       // $sql="SELECT * FROM proveedores;";
        $sql= "INSERT INTO proveedores (id_prov, nombre_proveedor,
        empresa, direccion, numero_proveedor, numero_empresa ) 
        VALUES (
        ".$_POST['idProv'].",
        '".$_POST['nombreProveedor']."',
        '".$_POST['empresa']."',
        '".$_POST['direccion']."',
        ".$_POST['numeroProveedor'].",
        ".$_POST['numeroEmpresa']."
        )";
        //echo $sql;
        $resultado=$conexion->query($sql);
        header("Location:proveedor.php");
    }


?>