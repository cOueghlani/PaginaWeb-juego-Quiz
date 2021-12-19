<?php
if (isset($_GET['dirCorreo'])) {
    include 'DbConfig.php';

    $conn = mysqli_connect($server, $user, $pass, $basededatos);
    if (!$conn) {
        die("Fallo al conectar con Mysql: " . mysqli_connect_error());
        }
    $email = $_GET['dirCorreo'];
    if ($email=='admin@ehu.es')
        {
            echo "<script>
            alert('El administrador no puede ser borrado');   
            window.location.href='HandlingAccounts.php';          
            </script>";   
        }
    else
        {
            $sql = "Delete FROM users WHERE correo=\"" . $email . "\" ;";
            echo $sql;
            $resultado = mysqli_query($conn, $sql);
            if (!$resultado) {
                die("Error: " . mysqli_error($conn));
            }

            echo "<script> alert('Usuario borrado');
                window.location.href='HandlingAccounts.php';
                </script>";
        }
}
?>
