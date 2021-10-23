<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php'?>
  <?php
  //Conexion con la base de datos
  include 'DbConfig.php';
  // Create connection with BD
  $conn = mysqli_connect($server, $user, $pass, $basededatos);
      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

  //Creamos la sentencia SQL y la ejecutamos
  $sSQL="Select * From preguntas";
  $result= mysqli_query($conn,$sSQL);
  //echo $result;
  //Generamos el menu desplegable
  echo "<table border='1'>";
  echo "<tr>";
  echo "  <th> Correo  </th>";
  echo "  <th> Enunciado </th>";
  echo "  <th> Repuesta correcta </th>";
  echo "  <th> Repuesta incorrecta </th>";
  echo "  <th> Repuesta incorrecta </th>";
  echo "  <th> Repuesta incorrecta </th>";
  echo "  <th> Complejidad </th>";
  echo "  <th> Tema </th>";
  echo "</tr>";
  while(($row = mysqli_fetch_array($result))){
    echo "<tr>  <td>".$row[1] . "</td> <td>" . $row[2] . "</td> <td>" . $row[3]
  . "</td> <td>" . $row[4] . "</td> <td>" . $row[5] . "</td> <td>" . $row[6]
  . "</td> <td>" . $row[7] . "</td> <td>" . $row[8] ."</td>  </tr>";}
  echo "</table>";

  
  mysqli_close($conn);

  /*echo "<tr>  <td>".$row['correo'] . "</td> <td>" . $row['enunciado'] . "</td> <td>" . $row['respcorrecta']
  . "</td> <td>" . $row['respincorrecta1'] . "</td> <td>" . $row['respincorrecta2'] . "</td> <td>" . $row['respincorrecta3']
  . "</td> <td>" . $row['complejidad'] . "</td> <td>" . $row['tema'] ."</td>  </tr>";}*/

  ?>
  <?php include '../html/Footer.html' ?>
</body>
</html>
