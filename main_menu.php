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
    <title>pos</title>
</head>
<body>
<h1>Main Menu</h1><br>
     <a href="users.php">Users</a> 
     <a href="products.php">Products</a>
     <a href="proveedor.php">Proveedor</a>
     Usuario actual: <?=$_SESSION['login'] ?>
     <a href="logout.php">Logout</a>
</body>
</html>