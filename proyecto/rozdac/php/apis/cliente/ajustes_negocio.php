<?php

    require_once("../../Procesos/Modelos/class.conexion.php");
    require_once("../../Procesos/Modelos/class.negocios.php");
    $errorMsg = '';
    session_start();

    if(isset($_SESSION['userid']) && isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 2:
                $url = BASE_URL."Admin.php";
                header("location: $url");
            break;
        }
    }else{
        $url = BASE_URL."login.php";
        header("location: $url");
    }

    $negoid = $_GET['Id'];

?>
<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajustes de negocio | Rozdac</title>
    </head>
    <body>
        <h1>Ajustes de negocio</h1>
        <a href="negocios.php">Regresar</a>
        <?php
            $nego = new negoClass();
            $rows = $nego->cargarNegocio($negoid);

            if(isset($rows)){
                foreach($rows as $row){
                    echo $row['name'];
                    echo $row['descripcion'];
                    echo $row['mision'];
                    echo $row['vision'];
                }
            }else{
                echo "<p>El negocio no existe</p>";
            }
        ?>
    </body>
</html>