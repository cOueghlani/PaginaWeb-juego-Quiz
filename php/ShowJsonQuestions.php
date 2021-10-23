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

            $data = file_get_contents("../json/Questions.json"); //MIRAR SI OK

            $array = json_decode($data);

            echo '<h3><center>CONTENIDO DEL FICHERO JSON </h3><p><p>';
            echo '<body>';
            echo "<table style='border:1px solid black;margin-left:auto;margin-right:auto;'>";
            echo "<tr>";
            echo "  <th> Autor  </th>";
            echo "  <th> Enunciado </th>";
            echo "  <th> Repuesta correcta </th>";
            echo "</tr>";

            foreach ($array->assessmentItems as $assessmentItem) {
                $author = $assessmentItem->author;
                $itemBody = $assessmentItem->itemBody->p;
                $correctResponse = $assessmentItem->correctResponse->value;
                echo '<tr>
                    <td>' . $itemBody . '</td>
                    <td>' . $author . '</td>
                    <td>' . $correctResponse . '</td>
                </tr>';
            }
            echo '</table><center>';
            echo '</body>';

            ?>

        </div>
    </section>
</body>

</html>