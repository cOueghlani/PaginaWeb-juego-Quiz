<?php
session_start();

	if(isset($_SESSION['correo'])){	
		if($_SESSION['correo'] != "admin@ehu.es"){
			echo 
				"<script> 
					alert('Debes de iniciar sesion como admin');
                    window.location.href='Layout.php';
				</script>";
		}
	}else{
		echo 
			"<script> 
					alert('Debes de iniciar sesion como admin.');
                    window.location.href='Layout.php';
			</script>";	
	}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <style>
        td, th {
          margin: 25px 0;
          font-size: 0.9em;
          font-family: sans-serif;
          padding: 6px;
          border: solid 2px #c1e9f6;
        }
        table {
          border-collapse: collapse;
        }
        .imgPrev {
            display: block;
            width: 100%;
            height: auto;
        }
        .imgPrev2 {
            display: block;
            width: 100px;
            height: 100px;
        }
      </style>
      <?php
        //Conectamos con la base de datos mysql
        include 'DbConfig.php';
        $conn = mysqli_connect($server, $user, $pass, $basededatos);
        $conn->set_charset("utf8");

        if(!$conn){
          die("Connection failed: " . mysqli_connect_error());
        }

        //Cogemos los datos de la tabla
        $result = mysqli_query($conn, "SELECT * from users WHERE correo != 'admin@ehu.es'");

        echo "<table " . " bgcolor=" . "'#9cc4e8'" . ">";
        echo "<tr>
        <th>Correo</th>
        <th>Contraseña</th>
        <th>Imagen</th>
        <th>Estado</th>
        <th>Bloqueo</th>
        <th>Borrar</th>
        </tr>";
        
        while($row = mysqli_fetch_array($result)){

          echo
          "<tr>
          <td>" . $row['correo'] . "</td>" . 
          "<td>" . $row['pass'] . "</td>" .
          "<td><img src=".$row['img']. " class='imgPrev2'></img></td>".
          "<td>" . $row['estado'] . "</td>" . 
          "<td><input type='button' value='Bloquear/Desbloquear' onClick='changeState(\"".$row['correo']."\")'></td> ".
          "<td><input type='button' value='Borrar' onClick='RemoveUser(\"".$row['correo']."\")'></td> </tr>";
        }
        echo "</table>";
        mysqli_close($conn);

        ?>
    </div>
    <script type="text/javascript">
    function changeState(correo) {
	url ='../php/ChangeState.php?dirCorreo='+correo;
	window.location = url; 		
}
function RemoveUser(coreo) {
if (confirm("¿Estas seguro?") == true) {
	url ='RemoveUser.php?dirCorreo='+coreo;
	window.location = url; 	 
} else {
  window.location.replace("HandlingAccounts.php");
}
}
</script>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
