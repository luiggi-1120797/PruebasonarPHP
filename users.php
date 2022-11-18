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
    <title>Users</title>

    <style>
        fieldset{
            background-color:#eeeeee;
            width:50px;
        }
        legend{
            background-color:gray;
            color:#ffffff;
        }
        table{
            border-collapse:collapse;
        }
        tr:nth-child(even){
            background-color:#ffffff;
        }
        tr:nth-child(odd){
            background-color:#eeeeee;
        }
        th{
            background-color:#f9b3a4;
        }
        td:hover{
            background-color:gray;
        }

    </style>

<script> 
function confirmar(parNombre, opcion){
    var opcion = confirm("Seguro que desea "+ opcion +" a este usuario? "+parNombre);
    if (opcion == true) {
        return true;
	} 
    return false;
}
</script>
</head> 

<body>
    <div class="usuarioH">
<h1>Users</h1> <br>
     <a href="users.php">Users</a> 
     <a href="products.php">Products</a>
     <a href="proveedor.php">Proveedor</a>
     Usuario actual: <?=$_SESSION['login'] ?>
     <a href="logout.php">Logout</a>
     </div>

     <?php
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
            $sql="SELECT * FROM usuarios;";
            $resultado=$conexion->query($sql);
            //echo "resultado ".$resultado;
            if ($resultado->num_rows >0) {
               // echo "La tabla tiene ".$resultado->num_rows."registros";
                echo "<table border='1' >";
                echo "<tr><th>ID del Usuario </th><th>Contraseña</th><th>Nombre del usuario</th>
                <th>Apellido Paterno</th><th>Apellido Materno</th><th>e-mail</th><th>Editar</th><th>Eliminar</th></tr>";
                while ($renglon =$resultado->fetch_assoc()) {
                    echo "<tr><td>".$renglon['id_usuario']."</td>";
                    echo "<td>********</td>";
                    echo "<td>".$renglon['nombre_usuario']."</td>";
                    echo "<td>".$renglon['apellido1_usuario']."</td>";
                    echo "<td>".(empty($renglon['apellido2_usuario'])?" ":$renglon['apellido2_usuario'])."</td>";
                    echo "<td>".$renglon['email_usuario']."</td>";
                    echo "<td><a href='modificarusuario.php?id_usuario=".$renglon['id_usuario']."' 
                                   onclick='return confirmar(\"".$renglon['nombre_usuario']."\", \"modificar\")'>
                                   <img src='./img2/actualizar(1).png'></td>";
                    echo "<td><a href='eliminarusuario.php?id_usuario=".$renglon['id_usuario']."' 
                                   onclick='return confirmar(\"".$renglon['nombre_usuario']."\", \"eliminar\")'>
                                   <img src='./img2/borrar.png'></a></td></tr> ";
                }
                echo "</table>";

            } else {
                echo "La tabla no tiene registros";
            }
            
        }
        
     ?>
      <form action="insertarUsuarios.php" method="post">
        <fieldset>
        <legend>
        Alta de usuario
        </legend>
        ID del Usuario: <input type="number" name="idUsuario" required>  <br>
        Contraseña: <input type="password" name="passwordUsuario" required> <br>
        Verificar Contraseña: <input type="password" name="verificar" required> <br>
        Nombre de Usuario: <input type="text" name="nombreUsuario" required> <br>
        Apellido Paterno: <input type="text" name="apellidoUsuario1"> <br>
        Apellido Materno: <input type="text" name="apellidoUsuario2" required> <br>
        E-Mail: <input type="text" name="emailUsuario" required> <br>
        <input type="submit" value="Agregar">
        </fieldset>
        </form>

        

</body>
</html>