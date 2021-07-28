<?php

    require_once('Procesos/Controlador/loginregister.php');
    $errorMsg = '';
    session_start();

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                $url = BASE_URL."Index.php";
                header("location: $url");
            break;
            case 2:
                $url = BASE_URL."Index.php";
                header("location: $url");
            break;
            default:
                $url = BASE_URL."login.php";
                header("location: $url");
            break;
        }
    }

    if(!empty($_POST["enviar"])){
        $useremail = $_POST['useremail'];
        $password = $_POST['password'];


        if(strlen(trim($useremail))> 1 && strlen(trim($password))> 1){
            $errorMsg = login($useremail, $password);
        }else{
            $errorMsg = 'Por favor rellene todos los campos';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login | Rozdac</title>
    </head>
    <body>
    <a href="index.php">Regresar</a>
        <h1>Login</h1>
        <form action="" method="post" name="registro" enctype="multipart/form-data">

			<input type="text" name="useremail" placeholder="Usuario o email" autocomplete="off" />

            <input type="password" name="password" placeholder="Contraseña" autocomplete="off" />


            <div class="errorMsg"><?php echo $errorMsg; ?></div>

            <input type="submit" value="Enviar" name="enviar" />

        </form>
        <p>Registrate <a href="registro.php">aquí</a></p>
    </body>
</html>