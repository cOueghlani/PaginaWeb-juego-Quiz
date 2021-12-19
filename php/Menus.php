<div id='page-wrap'>
    <header class='main' id='h1'>
        <?php if(!isset($_SESSION['correo'])){ ?>
        <span class="right"><a href="SignUp.php">Registro</a></span>
        <span class="right"><a href="LogIn.php">Login</a></span>
        <?php }else{ ?>
        <span class="right"><a href="LogOut.php">Logout</a><?php echo ' '.$_SESSION['correo'];echo '<img src="'.$_SESSION['imagen']. ' " width="50" height="50">';?> </span>
        <?php } ?>
    </header>

    <nav class='main' id='n1' role='navigation'>


        <?php if(isset($_SESSION['correo'])){ ?>
        <span><a href="Layout.php?correo=<?php echo $_SESSION['correo']; ?>"> Inicio</a></span>
        <span><a href="Credits.php?correo=<?php echo $_SESSION['correo']; ?>">Creditos</a></span>

        <?php if(strpos($_SESSION['correo'], 'ikasle')== true) { ?>
        <span><a href="HandlingQuizesAjax.php?correo=<?php echo $_SESSION['correo']; ?>"> Gestionar preguntas</a></span>
        <?php } else if($_SESSION['correo']=='admin@ehu.es') { ?>
        <span><a href="HandlingAccounts.php?correo=<?php echo $_SESSION['correo'];?>">Gestionar cuentas</a></span>
        <?php } else { ?>
        <span><a href="AddVip.php?correo=<?php echo $_SESSION['correo']; ?>">Añadir Vips</a></span>
        <span><a href="ShowVips.php?correo=<?php echo $_SESSION['correo']; ?>">Ver los Vips</a></span>
        <span><a href="IsVip.php?correo=<?php echo $_SESSION['correo']; ?>">Comprobar Vips</a></span>
        <span><a href="DeleteVip.php?correo=<?php echo $_SESSION['correo']; ?>">Eliminar Vips</a></span>
        <?php } } else { ?>
        <span><a href="Layout.php"> Inicio</a></span>
        <span><a href="Credits.php">Creditos</a></span>
        <?php }?>

    </nav>