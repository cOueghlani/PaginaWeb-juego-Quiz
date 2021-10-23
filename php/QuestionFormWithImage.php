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

  <form id='fquestion' name='fquestion' action="AddQuestionWithImage.php" method="POST" enctype="multipart/form-data" >
<!-- Correo del autor de la pregunta -->
<label for="correo">Correo electrónico(*): </label>
        <input type="text" id="correo" name="correo"><br><br>

        <!-- Enunciado de la pregunta -->
        <label for="pregunta">Enunciado de la pregunta(*): </label><br>
        <input type="text" id="pregunta" name="pregunta"><br>
  
        <!-- Respuestas -->
        <label for="pregunta">Respuesta correcta(*): </label>
        <input type="text" id="resc" name="resc"><br>

        <label for="pregunta">Respuesta incorrecta(*): </label>
        <input type="text" id="resi1" name="resi1"><br>

        <label for="pregunta">Respuesta incorrecta(*): </label>
        <input type="text" id="resi2" name="resi2"><br>

        <label for="pregunta">Respuesta incorrecta(*): </label>
        <input type="text" id="resi3" name="resi3"><br>


        <!-- Complejidad de la pregunta -->
        <label for="complejidad">Complejidad:</label>
        <select name="complejidad" id="complejidad">
        <option value="1">Baja</option>
        <option value="2">Media</option>
        <option value="3">Alta</option>
        </select><br>
      

        <!-- Tema de la pregunta -->
        <label for="temaPregunta">Tema de la pregunta(*): </label>
        <input type="text" id="TemaPreg" name="TemaPreg"><br><br>
         
        <!-- Imagen -->
        <input name="archivo" id="archivo" type="file"/>        
        <div id="imagenamostrar"></div>
        <!-- Boton de enviar -->
        <input type="submit" id="subir" name="subir" value="Enviar pregunta"/>

        <input type="reset" id="reset" name="Eliminar" value="Borrar los campos" onclick="borrar()"/>

      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>

</body>

</html>