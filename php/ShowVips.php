<?php
session_start();
if (isset($_SESSION['correo'])) {
  if (strpos($_SESSION['correo'], '@ehu') == true)
  {
    if ($_SESSION['correo'] == "admin@ehu.es") {
      echo
      "<script> 
					alert('Debes de iniciar sesion como profesor');
                    window.location.href='Layout.php';
				</script>";
    }
  }
  else{
    echo
      "<script> 
					alert('Debes de iniciar sesion como profesor');
                    window.location.href='Layout.php';
				</script>";
  }
} else {
  echo
  "<script> 
					alert('Debes de iniciar sesion');
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
  <?php
function VerVips()
{
  $curl = curl_init();
  $url = "https://sw.ikasten.io/~G27/REST/VipUsers.php";
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $str = curl_exec($curl); 
  echo $str;
}
?>
  <section class="main" id="s1">
    <h3>Pulse el botón para ver los VIPS</h3> </br>
    <input type="button"  id="botonVal" name="botonVal" value="Ver Vips" onclick="VerVips()"></input>
    <div id="Verlistado" name="Verlistado"></div>
  </section>
  <?php include '../html/Footer.html' ?>
  <script>
function VerVips() 
{
  var result ="<?php VerVips(); ?>"
  alert("Vips: " +result);
 /* var elem = document.getElementById('Verlistado');
  $("#Verlistado").show();
  $('#Verlistado').html(result);*/
}
</script>

</body>
</html>