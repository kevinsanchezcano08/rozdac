<?php
require_once ("../../Procesos/Modelos/class.conexion.php");
require_once ("../../Procesos/Modelos/class-actions.php");
require_once ("../../Procesos/Controlador/show_users.php");
session_start();

if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 1:
            $url = BASE_URL."index.php";
            header("location: $url");
        break;
    }
}else{
    $url = BASE_URL."login.php";
    header("location: $url");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/menu.css">
        <link rel="stylesheet" type="text/css" href="../../css/footer.css">
    <title>Usuarios | Rozdac</title>
</head>
<body>
<header>
            <input type="checkbox" id="btn-menu">
            <label for="btn-menu"><img src="media/recursos/menu-icon.png" width="30px"></label>
            <img id="log" src="../../media/recursos/rozdac.jpg" width="85px" alt="logo Rozdac">

            <nav class="menu">
                <ul>
                    <li><a href="#" id="logoAlb">.</a></li>
                    <li><a href="../../index.php">Inicio</a></li>
                    <?php
                    if(isset($_SESSION['rol'])){
                        switch($_SESSION['rol']){
                            case 3:
                                ?>
                                <li><a href="register-admin.php">Registrar Usuarios</a></li>
                                <?php
                            break;
                        }
                    }
                    ?>
                    <li><a href="show-users.php">Ver Usuarios</a></li>
                    <li><a href="show-business.php">Ver Negocios</a></li>
                    <li><a href="#">Mi Perfil</a></li>
                    
                </ul>
            </nav>
        </header>
    <h1>Usuarios del sistema</h1>
<?php
if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 2:
            show_part();
        break;
        case 3:
            show_all();
        break;
    }
}
?>
</body>
</html>