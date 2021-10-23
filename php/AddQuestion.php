  <!DOCTYPE html>
  <html>

  <head>
    <?php include '../html/Head.html' ?>
  </head>

  <body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
      <div>

        <!-- Código PHP para añadir una pregunta sin imagen -->

        <?php


        // die(print_r($_POST,1));

        include 'DbConfig.php';
        // Create connection with BD
        $conn = mysqli_connect($server, $user, $pass, $basededatos);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }


        // $sql = "SELECT Clave FROM preguntas";
        // $result = mysqli_query($conn, $sql);

        // Taking all 8 values from the form data(inputi) --> el name
        $cor = $_POST['correo'];
        $preg = $_POST['pregunta'];
        $resc = $_POST['resc'];
        $resi1 = $_POST['resi1'];
        $resi2 = $_POST['resi2'];
        $resi3 = $_POST['resi3'];
        $comple = $_POST['complejidad'];
        $tempreg = $_POST['TemaPreg'];

        $sql = "INSERT INTO preguntas (id_Pregunta, correo, enunciado, respcorrecta, respincorrecta1, respincorrecta2, respincorrecta3, complejidad, tema)
                       VALUES
                                        (NULL, '$cor', '$preg', '$resc', '$resi1', '$resi2', '$resi3', $comple, '$tempreg')";

        //  die($sql);
        $result =   mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) > 0) {
          // output data of each row
          echo "1 result <br>";
          echo "<a href='ShowQuestions.php'>Ver todos las preguntas</a>";
        } else {
        echo "Algo ha salido mal";
      }
        mysqli_close($conn);
        ?>

      </div>
    </section>
    <?php include '../html/Footer.html' ?>
  </body>

  </html>
