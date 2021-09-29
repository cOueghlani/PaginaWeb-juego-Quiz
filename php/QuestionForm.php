<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/ValidateFieldsQuestionJQ.js"></script>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <form id="fquestion" name="fquestion" action="AddQuestion.php" method="post">

        <!-- Correo del autor de la pregunta -->
        <label for="correo">Correo electrónico(*): </label>
        <input type="text" id="correo" name="correo"><br><br>

        <!-- Enunciado de la pregunta -->
        <label for="pregunta">Enunciado de la pregunta(*): </label><br>
        <input type="text" id="pregunta" name="pregunta"><br>
  
        <!-- Respuestas -->
        <label for="pregunta">Respuesta correcta(*): </label>
        <input type="text" id="respuestac" name="resc"><br>

        <label for="pregunta">Respuesta incorrecta(*): </label>
        <input type="text" id="respuestai1" name="resi1"><br>

        <label for="pregunta">Respuesta incorrecta(*): </label>
        <input type="text" id="respuestai2" name="resi2"><br>

        <label for="pregunta">Respuesta incorrecta(*): </label>
        <input type="text" id="respuestai3" name="resi3"><br>


        <!-- Complejidad de la pregunta -->
        <label for="complejidad">Complejidad:</label>
        <select name="complejidad" id="complejidad">
        <option value="1">Baja</option>
        <option value="2">Media</option>
        <option value="3">Alta</option>
        </select><br>
      

        <!-- Tema de la pregunta -->
        <label for="temaPregunta">Tema de la pregunta(*): </label>
        <input type="text" id="temaPregunta" name="TemaPreg"><br><br>

        
        <!-- Boton de enviar -->
        <input type="submit" id="subir" name="subir" value="Enviar pregunta"/>

      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
