<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>

    <style> 
    /*codigo de css*/ 
    .contenedor{
        height: 95vh;
        position: relative;
    }
    .centrar{
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-tranform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        
    }
    </style>

    <script>
    //aqui va el codigo de JS
    </script>
</head>
<body>
    <form action="validarusuario.php" method="post">
    <div class="contenedor">
    <div class="centrar"> 
        <fieldset>
        <legend>
            Login
        </legend>
    <table >
        <tr>
            <td>
            User:
        </td>
        <td>
            <input type="text" name="usr" required>
        </td>
        </tr>
        <tr>
        <td>
            Password
        </td>
        <td>
            <input type="password" name="psw" id="" required>
        </td>
        
        </tr>
        <tr >
        <td colspan="2" style="text-align:center;">
            <input type="submit" value="Login">
        </td>

        </tr>
    </table>
    </fieldset>
    </div>
    </div>

   <br> 
    <br>
    </form>
</body>
</html>