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

        $servername = "127.0.0.1";  //"127.0.0.1";
        $username = "cristina"; // en entorno de desarrollo OK, pero en producción usaremos otro usuario
        $password = "oQMwATauFGbodWZ192Y_"; // en entorno de desarrollo OK, pero en producción definiremos password
        $dbname = "Quiz";

        // Create connection with BD
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }


        // $sql = "SELECT Clave FROM preguntas";
        // $result = mysqli_query($conn, $sql);

        //Insertar en una BD --> https://www.geeksforgeeks.org/how-to-insert-form-data-into-database-using-php/

        // Taking all 8 values from the form data(inputi) --> el name
        $cor = $_POST['correo'];
        $preg = $_POST['pregunta'];
        $resc = $_POST['resc'];
        $resi1 = $_POST['resi1'];
        $resi2 = $_POST['resi2'];
        $resi3 = $_POST['resi3'];
        $comple = $_POST['complejidad'];
        $temTemaPrega = $_POST['TemaPreg'];

        $sql = "INSERT INTO Preguntas (Clave, Correo, Enunciado, RespCorrecta, RespIncorrecta1, RespIncorrecta2, RespIncorrecta3, Complejidad, Tema)
                       VALUES
                                        (NULL, '$cor', '$preg', '$resc', '$resi1', '$resi2', '$resi3', $comple, '$TemaPregb')";

        //  die($sql);
        $result =   mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) > 0) {
          // output data of each row
          echo "1 result <br>";
          echo "<a href='ShowQuestions.php'>Ver todos las preguntas</a>";
        } else {
          echo "0 results";
        }

        mysqli_close($conn);
        ?>

      </div>
    </section>
    <?php include '../html/Footer.html' ?>
  </body>

  </html>