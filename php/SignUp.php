<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html' ?>
    <?php include '../php/Menus.php' ?>
</head>

<body>
    <?php
    $nombre = $apellido = $correo = $password = $confirm_password = "";
    $nombreapellido_error = $tipousu_err = $correo_err = $password_err = "";
    if (isset($_REQUEST['dirCorreo'])) {
        $regexAlu = "/^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$/";
        $regexProf = "/^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$/";
        $regexPass = "/^.{8,}$/";
        $regexNombre = "/(\w.+\s).+/";

        if (($_REQUEST['tipousu'] == "alumno") &&  preg_match($regexAlu, $_REQUEST['dirCorreo'])) {
            if ($_REQUEST['password'] == $_REQUEST['confirm_password'] && preg_match($regexPass, $_REQUEST['password'])) {
                if (preg_match($regexNombre, $_REQUEST['nombreape'])) {
                    introducirNuevoUsuario();
                } else {
                    $nombreapellido_error = "Debes introducir nombre y apellido.<br>";
                }
            } else {
                $password_err = "La contraseña tiene menos de 8 caracteres o no coincide.<br>";
            }
        } elseif ($_REQUEST['tipousu'] == "profesor" && preg_match($regexProf, $_REQUEST['dirCorreo'])) {
            if ($_REQUEST['password'] == $_REQUEST['confirm_password'] && preg_match($regexPass, $_REQUEST['password'])) {
                if (preg_match($regexNombre, $_REQUEST['nombreape'])) {
                    introducirNuevoUsuario();
                } else {
                    $nombreapellido_error = "Debes introducir nombre y apellido.<br>";
                }
            } else {
                $password_err = "La contraseña tiene menos de 8 caracteres o no coincide.<br>";
            }
        } else {
            $correo_err = " El correo electronico no es correcto o no se corresponde con el usuario seleccionado.<br>";
        }
    }
    function introducirNuevoUsuario()
    {
        include 'DbConfig.php';
        $conn = mysqli_connect($server, $user, $pass, $basededatos);
        if (!$conn) {
            die("Fallo: no se pudo conectar a MySQL: " . mysqli_connect_error());
        }

        $tipo = $_REQUEST['tipousu'];
        $email = $_REQUEST['dirCorreo'];
        $nombre = $_REQUEST['nombreape'];
        $pass = $_REQUEST['password'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result =   mysqli_query($conn, $sql);
        if (mysqli_affected_rows($conn) == 1) {
            mysqli_close($conn);
            echo '<script type="text/javascript">'; 
            echo 'alert("Este correo ya existe, inicie sesión");'; 
            echo 'document.location.href = "LogIn.php";';
            echo '</script>';
        } else {
            $sql = "INSERT INTO usuarios VALUES (NULL,'$tipo','$email','$nombre','$pass');";
            $result =   mysqli_query($conn, $sql);

            if (!$result) {
                die("Error: " . mysqli_error($conn));
            }
            mysqli_close($conn);
            echo '<script type="text/javascript">'; 
            echo 'alert("Registro correcto, inicie sesión");'; 
            echo 'document.location.href = "LogIn.php";';
            echo '</script>';
        }
    }
    ?>
    <div>
        <h2>Registro</h2>
        <p>Por favor complete este formulario para crear una cuenta.</p>
        <form action="SignUp.php" method="post">
            <div>
                <label>Seleccione tipo de usuario</label>
                <select name="tipousu" value="<?php echo $tipo_usu; ?>">
                    <option value="profesor">profesor</option>
                    <option value="alumno" selected>alumno</option>
                    <?php echo $tipousu_err; ?>
                </select>
            </div>
            <div>
                <label>Nombre y Apellido</label>
                <input type="text" name="nombreape" value="<?php echo $nombre; ?>">
                <?php echo $nombreapellido_error; ?>
            </div>
            <div>
                <label>Correo electronico</label>
                <input type="text" name="dirCorreo" value="<?php echo $correo; ?>">
                <?php echo $correo_err; ?>
            </div>
            <div>
                <label>Contraseña</label>
                <input type="password" name="password" value="<?php echo $password; ?>">
                <?php echo $password_err; ?>
            </div>
            <div>
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
            </div>
            <div>
                <input type="submit" value="Ingresar">
                <input type="reset" value="Borrar">
            </div>
            <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a>.</p>
        </form>
    </div>
</body>

</html>