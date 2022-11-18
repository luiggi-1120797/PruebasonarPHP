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
    <title>Products</title>
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


    <script language="javascript"> 
function confirmar(parProducto, opcion){
    var opcion = confirm("Seguro que desea "+ opcion +" a este producto? "+parProducto);
    if (opcion == true) {
        return true;
	} 
    return false;
}
</script>
</head>
 

<body>
    <h1>Products</h1>
    <a href="users.php">Users</a> 
     <a href="products.php">Products</a>
     <a href="proveedor.php">Proveedor</a>
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
            echo "Error al conectarse a la base de datos";
        } else {
            //echo "Todo bien";
            $sql="SELECT * FROM productos;";
            $resultado=$conexion->query($sql);
            //echo "resultado ".$resultado;
            if ($resultado->num_rows >0) {
                //echo "La tabla tiene ".$resultado->num_rows."registros";
                echo "<table border='1' >";
                echo "<tr><th>ID del producto </th><th>Nombre del producto</th>
                <th>Porecio del producto</th>
                <th>Departamento</th><th>Codigo producto</th><th>Modificar </th><th>Eliminar</th> </tr>";
                while ($renglon =$resultado->fetch_assoc()) {
                    echo "<tr>\n<td>". $renglon['id_producto']."</td>";
                    echo "\n<td>".$renglon['nombre_producto']."</td>";
                    echo "\n<td> ". $renglon['precio_producto']."</td>";
                    echo "\n<td>".$renglon['departamento_producto']."</td>";
                    echo "\n<td>".$renglon['codigo_producto']."</td>";
                    //echo "\n<td><img src='./img2/actualizar(1).png'></td>";
                    echo "\n<td><a href='modificarproducto.php?id_producto=".$renglon['id_producto']."'
                    onclick='return confirmar(\"".$renglon['nombre_producto']."\", \"modificar\")'>
                   <img src='./img2/actualizar(1).png'></a></td>\n";
                    echo "\n<td><a href='eliminarproductos.php?id_producto=".$renglon['id_producto']."'
                     onclick='return confirmar(\"".$renglon['nombre_producto']."\", \"eliminar\")'>
                    <img src='./img2/borrar.png'></a></td>\n</tr> ";
                   
                }
                echo "</table>";

            } else {
                echo "La tabla no tiene registros";
            }
            
        }
        
     ?>
        <form action="insertarProducto.php" method="post">
        <fieldset>
        <legend>
        Alta de producto
        </legend>
        ID del producto: <input type="text" name="idProducto" required>  <br>
        Nombre del producto: <input type="text" name="nombreProducto" required> <br>
        Precio del producto: <input type="text" name="precioProducto" required> <br>
        Departamento: <input type="text" name="departamento"> <br>
        Codigo del producto: <input type="text" name="codigoProducto" required> <br>
        <input type="submit" value="Agregar">
        </fieldset>
        </form>

</body>
</html>