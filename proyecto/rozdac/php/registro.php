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
        $user = $_POST['user'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $verify = $_POST['verify_password'];
        $telefono = $_POST['telefono'];
        $fechaNac = $_POST['fechaNac'];


        if(strlen(trim($user))> 1 && strlen(trim($name))> 1 && strlen(trim($lastname))> 1 && strlen(trim($email))> 1 && strlen(trim($password))> 1 && strlen(trim($verify))> 1 && strlen(trim($telefono))> 1 && strlen(trim($fechaNac))> 1 ){
            if($password == $verify){
                $name .= $lastname;
                $rol = 1;
                $errorMsg = registro($user, $name, $email, $password, $telefono, $fechaNac, $rol);
            }else{
                $errorMsg = 'Las contraseñas no coinciden';
            }
        }else{
            $errorMsg = 'Por favor rellene todos los campos';
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro | Rozdac</title>
    </head>
    <body>
        <a href="index.php">Regresar</a>
        <h1>Registro</h1>
        <form action="" method="post" name="registro" enctype="multipart/form-data">

            <input type="text" name="name" placeholder="Nombre" autocomplete="off" />

            <input type="text" name="lastname" placeholder="Apellido" autocomplete="off" />

            <input type="text" name="user" placeholder="Usuario" autocomplete="off" />

			<input type="text" name="email" placeholder="Correo Electrónico" autocomplete="off" />

            <input type="password" name="password" placeholder="Contraseña" autocomplete="off" />

            <input type="password" name="verify_password" placeholder="Contraseña" autocomplete="off" />

            <input type="text" name="telefono" placeholder="Telefono" autocomplete="off" />

            <input type="text" name="municipio" placeholder="Municipio" autocomplete="off" />

            <input type="date" name="fechaNac" autocomplete="off" >

            <div class="errorMsg"><?php echo $errorMsg; ?></div>

            <input type="submit" value="Enviar" name="enviar" />

        </form>
        <p>¿Ya tienes una cuenta <a href="login.php">aquí</a>?</p>
    </body>
</html>