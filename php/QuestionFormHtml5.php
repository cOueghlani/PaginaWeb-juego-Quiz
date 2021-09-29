<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
  <script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/ShowImageInForm.js"></script>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

      <form id='fquestion' name='fquestion' action=’AddQuestion.php’>

        <!-- Correo del autor de la pregunta -->
        <label for="correo">Correo(*) </label>
        <input type="correo" id="correo" name="correo" required><br>

        <!-- Enunciado de la pregunta -->
        <label for="pregunta">Enunciado de la pregunta(*) </label>
        <input type=”text” id=pregunta name="pregunta" minlength=10 required><br>

        <!-- Respuestas -->
        <label for="respuesta1">Respuesta correcta(*) </label>
        <input type=”text” id=respuesta1 name="respuesta" required><br>

        <label for="respuesta2">Respuesta incorrecta(*) </label>
        <input type=”text” id=respuesta2 name="respuesta" required><br>

        <label for="respuesta3">Respuesta incorrecta(*) </label>
        <input type=”text” id=respuesta3 name="respuesta" required><br>

        <label for="respuesta4">Respuesta incorrecta(*) </label>
        <input type=”text” id=respuesta4 name="respuesta" required><br>

        <!-- Complejidad de la pregunta -->
        <label for="complejidad">Complejidad(*) </label>
        <select id="complejidad" name="complejidad" required>
                <option value="1">Baja</option>
                <option value="2" selected>Media</option>
                <option value="3">Alta</option>
        </select><br>
        
        <!-- Tema de la pregunta -->
        <label for="temaPregunta">Tema de la pregunta(*): </label><br>
        <input type="text" id="temaPregunta" name="TemaPreg" required><br>

        <!-- Cargar imagen-->
        <input type="file" id="CargarImagen" accept="image/*" name="Imagen">
        <img id="imagenprev" src="#" alt="" width="120px" height="120px" /><br><br>

        <!-- Boton de enviar -->
        <button>Enviar</button>

      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>