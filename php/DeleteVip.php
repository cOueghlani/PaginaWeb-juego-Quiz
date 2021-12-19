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
if (isset($_POST['id']))
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://sw.ikasten.io/~G27/REST/VipUsers.php?id=".$_POST['id']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    $output = curl_exec($ch);
    echo $output;
    curl_close($ch);
}

?>
  <section class="main" id="s1">
    <div>
        <h3>Introduce el correo para borrar a un usuario VIP</h3> </br>
    <form id="fquestion" name="fquestion" action="DeleteVip.php?correo=<?php echo $_GET["correo"]; ?>" enctype="multipart/form-data" method="POST" actionstyle="width: 60%; margin: 0px auto;">
    Correo: <input type="text" id="id" name="id" autofocus>
    <input type="submit"  id="botonVal" name="botonVal" value="Borrar"></input>
    </form>
    <br/>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</script>

</body>
</html>