<?php
// Constantes para el acceso a datos...
//phpinfo();
DEFINE("_HOST_", "localhost");
DEFINE("_PORT_", "3306");
DEFINE("_USERNAME_", "root");
DEFINE("_DATABASE_", "quiz");
DEFINE("_PASSWORD_", "");

require_once 'database.php';
$method = $_SERVER['REQUEST_METHOD'];
$resource = $_SERVER['REQUEST_URI'];
$cnx = Database::Conectar();
switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $datos = "";
            $id = $_GET['id'];
            $sql = "SELECT * FROM vips WHERE id='$id'";
            $data = Database::EjecutarConsulta($cnx, $sql);
            if (isset($data[0])) {
                echo "<br><br><b>ENHORABUENA " . $id . " ES VIP</b><br><img src=../images/ok.gif>";
                break;
            } else {
                echo "<br><br><b>LO SIENTO " . $id . " NO ES VIP</b><br><img src=../images/mal.gif>";
                break;
            }
        } else {
            // Servicio para Listar Vips (GET sin parámetro)
            $sql = "SELECT * FROM vips";
            $data = Database::EjecutarConsulta($cnx, $sql);
            if (isset($data[0])) {
                echo $data;
                break;
            } else {
                echo "<br><br><b>LO SIENTO NO HAY VIPS";
                break;
            }
        }
        break;
    case 'POST':
        // Para añadir VIPS
        $arguments = $_POST;
        $result = 0;
        $id = $arguments['id'];
        $sql = "INSERT INTO vips (id) VALUES ('$id')";
        $num = Database::EjecutarNoConsulta($cnx, $sql);
        if ($num == 0) {
            echo "Ya está en la BD";
        } else {
            echo json_encode(array('insertedId' => $id));
        }
        break;
    case 'PUT':
        // Este no hay que implementar
        break;
    case 'DELETE':
        // Borrado de usuario VIP
        $arguments = $_REQUEST;
        $id = $arguments['id'];
        $sql = "DELETE FROM vips WHERE id = '$id';";
        $result = Database::EjecutarNoConsulta($cnx, $sql);
        if ($result == 0) {
            echo "No existe el email:" . $id;
        } else {
            echo json_encode(array('Deleted row' => $id));
        };
}
Database::Desconectar($cnx);
