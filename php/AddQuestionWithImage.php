<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

      <!-- Código PHP para añadir una pregunta con imagen -->

      <?php

      include 'DbConfig.php';
      $conn = mysqli_connect($server, $user, $pass, $basededatos);
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }


      //data(input) --> el name
      $cor = $_POST['correo'];
      $preg = $_POST['pregunta'];
      $resc = $_POST['resc'];
      $resi1 = $_POST['resi1'];
      $resi2 = $_POST['resi2'];
      $resi3 = $_POST['resi3'];
      $comple = $_POST['complejidad'];
      $tempreg = $_POST['TemaPreg'];
      $archivo = $_FILES['archivo']['name'];

      $nameErr = "";

      if (isset($archivo) && $archivo != "") {
        $temp = $_FILES['archivo']['tmp_name'];
        $contenido_imagen = base64_encode(file_get_contents($temp));
      } else {
        $contenido_imagen = base64_encode(file_get_contents('../images/imagen_vacia.jpeg'));
      }
      //Validar campos php
      if (
        empty($cor) || strlen($preg) < 10 || empty($resc) || empty($resi1) || empty($resi2) || empty($resi3)
        || empty($comple) || empty($tempreg)
      ) {
        $nameErr = "Todos los campos son obligatorios <br/>";
      } else {
        if (validacion_correo($cor)) {

          //En este punto sabemos que los datos son correctos

          //INSERTAR EN JSON
          anadir_json($cor, $preg, $resc, $resi1, $resi2, $resi3, $tempreg);

          // INSETAR EN ../xml/Questions.xml
          $xml = simplexml_load_file('../xml/Questions.xml'); //1.Cargar fichero/string XML

          if (!$xml) die("Error: Fallo al encontrar el XML");

          //2.Procesar el fichero (consultar/modificar)
          anadir_xml($xml, $cor, $preg, $resc, $resi1, $resi2, $resi3, $tempreg);

          //insertar base de datos
          $sql = "INSERT INTO preguntas (id_Pregunta, correo, enunciado, respcorrecta, respincorrecta1, respincorrecta2, respincorrecta3, complejidad, tema, imagen)
              VALUES
                               (NULL, '$cor', '$preg', '$resc', '$resi1', '$resi2', '$resi3', $comple, '$tempreg', '$contenido_imagen')";

          $result =   mysqli_query($conn, $sql);

          if (mysqli_affected_rows($conn) > 0) {
            echo "Insertada con exito <br>";
            echo "<a href='ShowQuestionsWithImage.php'>Ver todas las preguntas</a>";
          } else {
            $nameErr = $nameErr . "No se ha añadido la pregunta <br/>";
          }
        } else {
          $nameErr = $nameErr . "Comprueba el correo <br/>";
        }
      }
      mysqli_close($conn);

      function validacion_correo($correo)
      {
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
          $regExpCorreoP = '/^([a-zA-Z]+)((\.[a-zA-Z]+)?)@ehu\.(eus|es)$/';
          $regExpCorreoA = '/[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/';
          if ((preg_match($regExpCorreoP, $correo)) || (preg_match($regExpCorreoA, $correo)))
            return true;
        } else {
          return false;
        }
      }

      function anadir_json($cor, $preg, $resc, $resi1, $resi2, $resi3, $tempreg)
      {
        $datos = file_get_contents("../json/Questions.json");
        $array = json_decode($datos);
        $pregunta = Array (
              "subject" => $tempreg,
              "author" => $cor,
              "itemBody" => Array (
                "p" =>$preg),
              "correctResponse" => Array (
                "value" =>$resc),
              "incorrectResponses" => Array (
                "value" =>[$resi1,$resi2,$resi3]));

        array_Push($array->assessmentItems, $pregunta);
        $jsonData = json_encode($array);
        $jsonData = str_replace('{', '{' . PHP_EOL, $jsonData);
        $jsonData = str_replace(',', ',' . PHP_EOL, $jsonData);
        $jsonData = str_replace('}', PHP_EOL . '}', $jsonData);
        file_put_contents("../json/Questions.json", $jsonData);
      }
      //Función para insertar una pregunta en XML
      function anadir_xml($xml, $cor, $preg, $resc, $resi1, $resi2, $resi3, $tempreg)
      {
        $assessmentItem = $xml->addChild('assessmentItem');

        $assessmentItem->addAttribute('subject', $tempreg);
        $assessmentItem->addAttribute('author', $cor);

        $itemBody = $assessmentItem->addChild('itemBody');
        $itemBody->addChild('p', $preg);

        $correctResponse = $assessmentItem->addChild('correctResponse');
        $correctResponse->addChild('response', $resc);

        $incorrectResponses = $assessmentItem->addChild('incorrectResponses');
        $incorrectResponses->addChild('response', $resi1);
        $incorrectResponses->addChild('response', $resi2);
        $incorrectResponses->addChild('response', $resi3);

        $xml->asXML('../xml/Questions.xml');
      }

      ?>
      <span class="error">* <?php echo $nameErr; ?></span>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>