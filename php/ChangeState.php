<?php
include 'DbConfig.php';
if(isset($_GET['dirCorreo'])){
    //Creamos la conexion con la BD.
    $conn = mysqli_connect($server,$user,$pass,$basededatos);
    if(!$conn)
    {
        die("Fallo al conectar a MySQL: " .mysqli_connect_error());
    }
	$correo = $_GET['dirCorreo'];
    if ($correo =='admin@ehu.es')
    {
        echo "<script>
        alert('El administrador no puede cambiar de estado');   
        window.location.href='HandlingAccounts.php';           
        </script>";   
    }
    else
    {
	    $sql = "SELECT estado FROM users WHERE correo= \"" .$correo."\" ;";
        $resultado = mysqli_query($conn,$sql);
        if(!$resultado){
            die("Error: ".mysqli_error($conn));
        }
	    $row = mysqli_fetch_array($resultado);
        if($row['estado']=="Disponible")
		    $sql = "Update users SET estado = 'Bloqueado' WHERE correo ='".$correo."';";
	    else 
		    $sql = "Update users SET estado = 'Disponible' WHERE correo ='".$correo."';";
	
	    $resultado = mysqli_query($conn,$sql);
        if(!$resultado)
            {
            die("Error: " .mysqli_error($conn));
        }
	    mysqli_close($conn);
	    echo "<script> alert('Disponibilidad del usuario cambiada.');
            window.location.href='HandlingAccounts.php';
            </script>";  
    }			
}
