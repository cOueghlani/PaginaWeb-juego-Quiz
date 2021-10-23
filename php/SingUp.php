<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/ValidateFieldsQuestionJQ.js"></script>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <form id="registro" name="registro" action="SingUp.php" method="post">

        <!-- Tipo de usuario -->
        <label for="tipoUsuario">Tipo de Usuario*:</label>

        <label for="tipoUsuario">Alumno: </label>
        <input type="radio" id="alu" name="usuario" value="Alumno"><br>

        <label for="tipoUsuario">Profesor: </label>
        <input type="radio" id="prof" name="usuario" value="Profesor"><br><br>

        <!-- Correo del usuario -->
        <label for="correo">Correo electrónico*: </label>
        <input type="text" id="correo" name="correo"><br><br>

        <!-- Nombre y apellidos del usuario -->
        <label for="nombreApellido">Nombre y apellido*: </label>
        <input type="text" id="nomApe" name="nombreApellido"><br>

        <!-- Password -->
        <label for="password">Password*: </label>
        <input type="password" id="pass" name="password"><br>


        <!-- Repetición del password -->
        <label for="repitPassword">Repetir Password*: </label>
        <input type="password" id="repitPass" name="repitPassword"><br>

        <!-- Imagen -->
        <input name="archivo" id="archivo" type="file" />
        <div id="imagenamostrar"></div> <br>

        <!-- Boton de enviar -->
        <input type="submit" id="subir" name="subir" value="Enviar solicitud" />

      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>


  <!-- VALIDACIÓN DE REGISTRO -->
  <?php

  include 'DbConfig.php';

  // Create connection with BD
  $conn = mysqli_connect($server, $user, $pass, $basededatos);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // Taking all 8 values from the form data(input) --> el name
  $tipoUsuario = $_POST['tipoUsuario'];
  $correo = $_POST['correo'];
  $nombreApellido = $_POST['nombreApellido'];
  $password = $_POST['password'];
  $repitPassword = $_POST['repitPassword'];
  $archivo = $_FILES['archivo']['name'];

  if (isset($archivo) && $archivo != "") {
    $temp = $_FILES['archivo']['tmp_name'];
    $contenido_imagen = base64_encode(file_get_contents($temp));

  } else {
    $contenido_imagen = base64_encode(file_get_contents('../images/imagen_vacia.jpeg'));
  }
  $sql = "INSERT INTO preguntas (tipoUsuario, correo, nombreApellido, `password`, repitPassword, imagen)
        VALUES
                         ($tipoUsuario, '$correo', '$nombreApellido', '$password', '$repitPassword', '$contenido_imagen')";

  $result =  mysqli_query($conn, $sql); //para esta conexión ejecuta esta consulta

  if (mysqli_affected_rows($conn) > 0) {
    // output data of each row
    echo "Registrado con exito <br>";
    echo "<a href='ShowQuestionsWithImage.php'>Ver todos las preguntas</a>";

  } else {
    echo "Registro fallido";
  }

  mysqli_close($conn);
  ?>

</body>

</html>