<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html' ?>
</head>

<body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
        <div>
            <?php
            echo "<table border='1'>";
            echo "<tr>";
            echo "  <th> Autor  </th>";
            echo "  <th> Enunciado </th>";
            echo "  <th> Repuesta correcta </th>";
            echo "</tr>";

            if (file_exists('../xml/Questions.xml')) {
                $xml = simplexml_load_file('../xml/Questions.xml');              
                foreach ($xml->assessmentItem as $clave=>$valor) {
                    echo "<tr>";
                        echo "<td>";
                            echo($valor->attributes()['author']);
                        echo "</td>";
                        echo "<td>";   
                            echo($valor->itemBody->p);
                        echo "</td>";
                        echo "<td>";
                            echo($valor->correctResponse->response);
                         echo "</td>";
                 }
            }
            echo "</tr>";
            ?>
        </div>
    </section>
</body>

</html>