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
    <title>Proveedor</title>

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
            background-color: gray;
        }
    
    </style>

<script> 
function confirmar(parNombre, opcion){
    var opcion = confirm("Seguro que desea "+ opcion +" a este proveedor? "+parNombre);
    if (opcion == true) {
        return true;
	} 
    return false;
}
</script>
</head> 

<body>
<h1>Proveedor</h1> <br>
     <a href="users.php">Users</a> 
     <a href="products.php">Products</a>
     Usuario actual: <?=$_SESSION['login'] ?>
     <a href="logout.php">Logout</a>

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
            $sql="SELECT * FROM proveedores;";
            $resultado=$conexion->query($sql);
            //echo "resultado ".$resultado;
            if ($resultado->num_rows >0) {
               // echo "La tabla tiene ".$resultado->num_rows."registros";
                echo "<table border='1' >";
                echo "<tr><th>ID del Proveedor </th><th>Nombre del proveedor</th><th>Nombre de la empresa</th>
                <th>Direccion de la empresa</th><th>Numero telefonico proveedor</th><th>Numero telefonico empresa</th><th>Editar</th><th>Eliminar</th></tr>";
                while ($renglon =$resultado->fetch_assoc()) {
                    echo "<tr>\n<td>". $renglon['id_prov']."</td>";
                    echo "\n<td>".$renglon['nombre_proveedor']."</td>";
                    echo "\n<td> ". $renglon['empresa']."</td>";
                    echo "\n<td>".$renglon['direccion']."</td>";
                    echo "\n<td>".$renglon['numero_proveedor']."</td>";
                    echo "\n<td>".$renglon['numero_empresa']."</td>";
                    //echo "\n<td><img src='./img2/actualizar(1).png'></td>";
                    echo "\n<td><a href='modificarproveedor.php?id_prov=".$renglon['id_prov']."'
                    onclick='return confirmar(\"".$renglon['nombre_proveedor']."\", \"modificar\")'>
                   <img src='./img2/actualizar(1).png'></a></td>\n";
                    echo "\n<td><a href='eliminarproveedor.php?id_prov=".$renglon['id_prov']."'
                     onclick='return confirmar(\"".$renglon['nombre_proveedor']."\", \"eliminar\")'>
                    <img src='./img2/borrar.png'></a></td>\n</tr> ";
                   
                }
                echo "</table>";

            } else {
                echo "La tabla no tiene registros";
            }
            
        }
        
     ?>
      <form action="insertarproveedor.php" method="post">
        <fieldset>
        <legend>
        Alta de usuario
        </legend>
        ID del proveedor: <input type="number" name="idProv" required>  <br>
        Nombre del proveedor: <input type="text" name="nombreProv" required> <br>
        Empresa de procedencia: <input type="text" name="empresaProv" required> <br>
        Direccion de la empresa: <input type="text" name="direccionEmpresa" required> <br>
        Numero telefonico del proveedor: <input type="number" name="numeroProv"> <br>
        Numero de la empresa: <input type="number" name="numeroEmpresa" required> <br>
        <input type="submit" value="Agregar">
        </fieldset>
        </form>

        

</body>
</html>