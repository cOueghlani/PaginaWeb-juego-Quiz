<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/InciadoSesion.js"></script>
</head>
<?php
$error = "";
if (isset($_REQUEST['dirCorreo'])) {
  //isset --> determina si una variable está definida y no es null
  include 'DbConfig.php';
  // Create connection with BD
  $conn = mysqli_connect($server, $user, $pass, $basededatos);
  //$enlace = mysqli_connect("127.0.0.1", "mi_usuario", "mi_contraseña", "mi_bd");

  // Comprobar conexión
  if (!$conn) {
    die("Fallo: no se pudo conectar a MySQL: " . mysqli_connect_error());
  }

  $email = $_REQUEST['dirCorreo']; //los id's
  $pass = $_REQUEST['pass'];

  $usuarios = mysqli_query($conn,"SELECT * FROM usuarios WHERE email = '$email' AND contrasena = '$pass'");
  $cont = mysqli_num_rows($usuarios);
  mysqli_close($conn);
  if($cont==1){
    session_start();
    $_SESSION['correo']=$email;
    $_SESSION['login'] = true;
    echo("<script> alert('Login correcto');
                  window.location.href='Layout.php';
          </script>;");
  }
     else {
    $error = "Usuario/contraseña incorrecto";
  }
  //$enlace = mysqli_query(connection, query, resultmode)
  //MYSQLI_USE_RESULT (Recuperar gran cantidad de datos)
  //MYSQLI_STORE_RESULT (Por defecto)        
}
?>

<body>
  <?php include '../php/Menus.php'?>
  <section class="main" id="s1">
    <div>
      <form id="logIn" name="logIn" action="LogIn.php" method="post">

        <!-- Correo del usuario -->
        <label for="correo">Correo electrónico*: </label>
        <input type="text" id="dirCorreo" name="dirCorreo"><br>

        <!-- Password -->
        <label for="password">Password*: </label>
        <input type="password" id="pass" name="pass"><br>
        <?php echo $error; ?><br><br>

        <!-- Boton de enviar -->
        <input type="submit" value="Ingresar">

      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>