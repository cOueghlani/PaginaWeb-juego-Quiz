<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
  <script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/ShowImageInForm.js"></script>
<script src="../js/ValidateFieldsQuestionJQ.js"></script>

</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

      <form id='fquestion' name='fquestion' action="AddQuestion.php">

        <!-- Correo del autor de la pregunta -->
        <label for="correo">Correo electrónico(*): </label>
        <input type="text" id="correo" name="correo"><br>

        <!-- Enunciado de la pregunta -->
        <label for="pregunta">Enunciado de la pregunta(*): </label>
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
        <label>Complejidad(*):</label>
        <select name="complejidad" id="complejidad">
          <option value=1>Baja</option>
          <option value=2>Media</option>
          <option value=3>Alta</option>
        </select>
        <br>

        <!-- Tema de la pregunta -->
        <label for="temaPregunta">Tema de la pregunta(*): </label>
        <input type="text" id="temaPregunta" name="TemaPreg" /><br>

                
        <!-- Imagen -->
        <input type="file" id="CargarImagen" /> <br>
        <img id="imagenprev" src="#" alt="imagenprev" width="120px" height="120px" /><br /><br />

        
        <!-- Boton de enviar -->
        <input type="submit" id="subir" name="subir" value="Enviar pregunta"/>

      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>

</body>

</html>