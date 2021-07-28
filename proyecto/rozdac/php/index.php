<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Rozdac</title>
</head>
<body>
    <h1>Inicio</h1>
    <?php
        session_start();
        if(isset($_SESSION['userid'])){
            echo $_SESSION['userid'];
        }else{
        ?><a href="login.php">Iniciar sesión</a><?php
        }

    ?>
    <a href="apis/cliente/negocios.php">Mis Negocios</a>
</body>
</html>