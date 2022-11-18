<?php 
session_start();
if (empty($_SESSION['login'])) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <Style> 
      fieldset{
            background-color:#eeeeee;
            width:50px;
        }
        legend{
            background-color:gray;
            color:#ffffff;
        }
    </Style>
</head>

<?php 

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
        $sql="SELECT * FROM productos WHERE id_producto=".$_GET['id_producto'].";";
    
        //echo $sql;
        $resultado=$conexion->query($sql);
        //print_r($resultado);
       $renglon =$resultado->fetch_assoc();
        //print_r($renglon);
      //header("Location:users.php");
    }


?>
<body>
<form action="modificarproducto2.php" method="post">
     <a href="users.php">Users</a> 
     <a href="products.php">Products</a>
     <a href="proveedor.php">Proveedor</a>
     Usuario actual: <?=$_SESSION['login'] ?>
     <a href="logout.php">Logout</a>
        <fieldset>
        <legend>
        Modificar de usuario
        </legend>
        ID del producto: <input type="text" value="<?= $renglon['id_producto'] ?>" name="idProducto" required>  <br>
        Nombre del producto: <input type="text" value="<?= $renglon['nombre_producto'] ?>" name="nombreProducto" required> <br>
        Precio del producto: <input type="text" value="<?= $renglon['precio_producto'] ?>" name="precioProducto" required> <br>
        Departamento: <input type="text" value="<?= $renglon['departamento_producto'] ?>" name="departamento"> <br>
        Codigo del producto: <input type="text" value="<?= $renglon['codigo_producto'] ?>" name="codigoProducto" required> <br>
        <input type="submit" value="Actualizar">
        </fieldset>
        </form>
</body>
</html>