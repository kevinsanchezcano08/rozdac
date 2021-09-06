<?php
require_once ("../../Procesos/Modelos/class.conexion.php");
require_once ("../../Procesos/Modelos/class.users.php");
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
    <link rel="stylesheet" type="text/css" href="../../css/tablas.css">
    <link rel="shortcut icon" href="../../media/recursos/favicon.jpg" type="image/x-icon">
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
                    <li><a href="../../profile.php">Mi Perfil</a></li>
                    
                </ul>
            </nav>
        </header>
        <div class="tabla">

        </div>
    <h1>Usuarios del sistema</h1>
    <form method="get">
             <input id="Btxt"type="text" name="buscar" placeholder="Buscar Usuario">
             <input id="Bbtn"type="submit" value="Buscar">
             <input id="Bbtn"type="submit" value="Ver todos">
    </form>
<?php
if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 2:
            if(isset($_GET['buscar'])){
                find_part($_GET['buscar']);
            }else{
                show_part();
            }
        break;
        case 3:
            if(isset($_GET['buscar'])){
                find_all($_GET['buscar']);
            }else{
                show_all();
            }
        break;
    }
}
?>
</body>
</html>