<?php

    require_once("../../Procesos/Controlador/register_admin.php");
    $errorMsg = '';
    session_start();

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                $url = BASE_URL."index.php";
                header("location: $url");
            break;
            case 2:
                $url = BASE_URL."index.php";
                header("location: $url");
            break;
        }
    }else{
        $url = BASE_URL."login.php";
        header("location: $url");
    }

    if(!empty($_POST["enviar"])){
        $rol = $_POST['rol'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $verify = $_POST['verify_password'];
        $telefono = $_POST['telefono'];
        $fechaNac = $_POST['fechaNac'];
        $municipio = $_POST['municipio'];
        $departamento = $_POST['departamento'];
        $direccion = $_POST['direccion'];


        if($rol > 1 && strlen(trim($name))> 1 && strlen(trim($lastname))> 1 && strlen(trim($email))> 1 && strlen(trim($password))> 1 && strlen(trim($verify))> 1 && strlen(trim($telefono))> 1 && strlen(trim($fechaNac))> 1  && strlen(trim($municipio))> 1  && strlen(trim($departamento))> 1 ){
            if($password == $verify){

                $direcion = $municipio.", ".$departamento;

                if(strlen(trim($direccion))> 1 ){
                    $direcion = $direccion.", ".$direcion;
                }

                $name .= " " .$lastname;

                if($rol == 2){
                    $user = "admin_" . rand(100,1000);
                }else{
                    $user = "superadmin_" . rand(100,1000);
                }

                $errorMsg = registro($user, $name, $email, $password, $telefono, $fechaNac, $rol, $direcion);
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
        <link rel="stylesheet" type="text/css" href="../../css/menu.css">
        <link rel="stylesheet" type="text/css" href="../../css/footer.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <title>Registro de usuarios | Rozdac</title>
    </head>
    <body>
         <header>
            <input type="checkbox" id="btn-menu">
            <label for="btn-menu"><img src="media/recursos/menu-icon.png" width="30px"></label>
            <img id="log" src="media/recursos/rozdac.jpg" width="85px" alt="logo Rozdac">

            <nav class="menu">
                <ul>
                    <li><a href="#" id="logoAlb">.</a></li>
                    <li><a href="../../index.php">Inicio</a></li>
                    <li><a href="register-admin.php">Registrar Usuarios</a></li>
                    <li><a href="show-all-users.php">Ver Usuarios</a></li>
                    <li><a href="show-business.php">Ver Negocios</a></li>
                    <li><a href="#">Mi Perfil</a></li>
                    
                </ul>
            </nav>
        </header>
        <div class="inicio">
            
            <h1>Registro</h1><br><br>
            <form action="" method="post" name="registro" enctype="multipart/form-data">

                <input type="text" name="name" placeholder="Nombre" autocomplete="off" />

                <input type="text" name="lastname" placeholder="Apellido" autocomplete="off" /><br><br>

                <div>
                <p>Selecciona el tipo de usuario:</p>
                <input type="radio" name="rol" value="2" />
                <label for="2">Administrador</label>

                <input type="radio" name="rol" value="3" />
                <label for="3">Super administrador</label>
                </div>
                <br><br>

                <input type="email" name="email" placeholder="Correo Electrónico" autocomplete="off" /><br><br>

                <input type="password" name="password" placeholder="Contraseña" autocomplete="off" />

                <input type="password" name="verify_password" placeholder="Confirmar contraseña" autocomplete="off" /><br><br>

                <input type="tel" name="telefono" placeholder="Teléfeno (Sin guión)" autocomplete="off" min="0" pattern="[0-9]{8}"/><br><br>

                <select name="departamento" id="departamento" onchange="selc();">
                    <option value="0">Seleccione Departamento</option>
                    <option>Ahuachapán</option>
                    <option>Cabañas</option>
                    <option>Chalatenango</option>
                    <option>Cuscatlán</option>
                    <option>La Libertad</option>
                    <option>La Paz</option>
                    <option>La Unión</option>
                    <option>Morazán</option>
                    <option>San Salvador</option>
                    <option>San Vicente</option>
                    <option>Santa Ana</option>
                    <option>Sonsonate</option>
                    <option>San Miguel</option>
                    <option>Usulután</option>
                </select>

                <select name="municipio" id="municipio" disabled onchange="munic_vac();">
                    <option value="0">Seleccione Municipio</option>
                </select><br><br>

                <textarea name="direccion" placeholder="Dirección" cols="30" rows="10"></textarea><br><br>

                <p>Fecha de Nacimiento:</p>
                <input type="date" name="fechaNac" autocomplete="off" ><br><br>

                <div class="errorMsg"><?php echo $errorMsg; ?></div>

                <input type="submit" value="Enviar" name="enviar" />

            </form>
            <script src="../../js/arrays_munics.js"></script>
            <script src="../../js/dept_munic.js"></script>
        </div>
        
    </body>
</html>