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
         $sql="SELECT * FROM usuarios WHERE id_usuario=".$_GET['id_usuario'].";";

         //echo $sql;
         $resultado=$conexion->query($sql);
         //print_r($resultado);
         $renglon =$resultado->fetch_assoc();
         //print_r($renglon);
       //header("Location:users.php");
     }
?>
<body>
<form action="modificarusuario2.php" method="post">
     <a href="users.php">Users</a> 
     <a href="products.php">Products</a>
     <a href="proveedor.php">Proveedor</a>
     Usuario actual: <?=$_SESSION['login'] ?>
     <a href="logout.php">Logout</a>
        <fieldset>
        <legend>
        Modificar de usuario
        </legend>
        ID del Usuario: <input type="number"  value="<?= $renglon['id_usuario'] ?>" name="idUsuario" required readonly>  <br>
        Contraseña: <input type="password"  value="<?= $renglon['password_usuario'] ?>" name="passwordUsuario" required> <br>
        Verificar Contraseña: <input type="password"  value="<?= $renglon['password_usuario']  ?>" name="verificar" required> <br>
        Nombre de Usuario: <input type="text"  value="<?= $renglon['nombre_usuario']  ?>" name="nombreUsuario" required> <br>
        Apellido Paterno: <input type="text"  value="<?= $renglon['apellido1_usuario'] ?>" name="apellidoUsuario1"> <br>
        Apellido Materno: <input type="text"  value="<?= (empty($renglon['apellido2_usuario'])?" ":$renglon['apellido2_usuario']) ?>" name="apellidoUsuario2" required> <br>
        E-Mail: <input type="text"  value="<?= $renglon['email_usuario'] ?>" name="emailUsuario" required> <br>
        <input type="submit" value="Actualizar">
        </fieldset>
        </form>
</body>
</html>