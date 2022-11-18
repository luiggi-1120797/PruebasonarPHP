<?php 
session_start();
if (empty($_SESSION['login'])) {
    header("Location:index.php");
}?>
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
         $sql="SELECT * FROM proveedores WHERE id_prov=".$_GET['id_prov'].";";

         //echo $sql;
         $resultado=$conexion->query($sql);
         //print_r($resultado);
         $renglon =$resultado->fetch_assoc();
         //print_r($renglon);
       //header("Location:users.php");
     }
?>
<body>
<form action="modificarproveedor2.php" method="post">
     <a href="users.php">Users</a> 
     <a href="products.php">Products</a>
     <a href="proveedor.php">Proveedor</a>
     Usuario actual: <?=$_SESSION['login'] ?>
     <a href="logout.php">Logout</a>
        <fieldset>
        <legend>
        Modificar Proveedor
        </legend>
        ID del proveedor: <input type="number"  value="<?= $renglon['id_prov'] ?>" name="idProv" required readonly>  <br>
        Nombre del proveedor: <input type="text"  value="<?= $renglon['nombre_proveedor'] ?>" name="nombreProv" required> <br>
        Empresa de procedencia: <input type="text"  value="<?= $renglon['empresa']  ?>" name="empresaProv" required> <br>
        Direccion de la empresa: <input type="text"  value="<?= $renglon['direccion']  ?>" name="direccionEmpresa" required> <br>
        Numero del proveedor: <input type="number"  value="<?= $renglon['numero_proveedor'] ?>" name="numeroProv"> <br>
        Numero de la empresa: <input type="number"  value="<?= $renglon['numero_empresa'] ?>" name="numeroEmpresa" required> <br>
        <input type="submit" value="Actualizar">
        </fieldset>
        </form>
</body>
</html>