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
  <?php include '../html/Head.html' ?>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <?php
  if (isset($_POST['id'])) {
    $curl = curl_init();
    $url = "https://sw.ikasten.io/~G27/REST/VipUsers.php?id=" . $_POST['id'];
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $str = curl_exec($curl);
    echo $str;
  }
  ?>
  <section class="main" id="s1">
    <div>
      <h3>Introduce el correo para comprobar si el ususario es VIP</h3> </br>
      <form id="fquestion" name="fquestion" action="IsVip.php?correo=<?php echo $_GET["correo"]; ?>" enctype="multipart/form-data" method="POST" actionstyle="width: 60%; margin: 0px auto;">
        Correo: <input type="text" id="id" name="id" autofocus>
        <input type="submit" id="botonVal" name="botonVal" value="Comprobar"></input>
      </form>
      <br />
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
  </script>

</body>

</html>