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
      <form id='fquestion' name='fquestion' action=’AddQuestion.php’>

        <!-- Correo del autor de la pregunta -->
        <label for="correo">Correo electrónico(*): </label>
        <input type="text" id="correo" name="correo"><br><br>

        <!-- Enunciado de la pregunta -->
        <label for="pregunta">Enunciado de la pregunta(*): </label><br>
        <input type="text" id="pregunta" name="pregunta"><br>
  
        <!-- Respuestas -->
        <label for="pregunta">Respuesta correcta(*): </label>
        <input type="text" id="respuesta1" name="res"><br>

        <label for="pregunta">Respuesta incorrecta(*): </label>
        <input type="text" id="respuesta2" name="res"><br>

        <label for="pregunta">Respuesta incorrecta(*): </label>
        <input type="text" id="respuesta3" name="res"><br>

        <label for="pregunta">Respuesta incorrecta(*): </label>
        <input type="text" id="respuesta4" name="res"><br>


        <!-- Complejidad de la pregunta -->
        <label for="complejidad">Complejidad:</label>
        <select name="complejidad" id="complejidad">
        <option value="Baja">Baja</option>
        <option value="Media">Media</option>
        <option value="Alta">Alta</option>
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
