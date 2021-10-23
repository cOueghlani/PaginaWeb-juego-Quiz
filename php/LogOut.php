<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html' ?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/ValidateFieldsQuestionJQ.js"></script>
    <?php include '../php/Menus.php' ?>
    <title>Registro</title>
</head>
<?php
session_start();
session_destroy();
header("location:../php/Layout.php");
?>
<body>
</body>

</html>