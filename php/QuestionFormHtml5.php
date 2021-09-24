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

        <label for="pregunta">Enunciado de la pregunta(*)</label><br>
        <input type=”text” id=pregunta name="pregunta" minlength=10 required><br>

        <label for="email">Correo(*)</label><br>

        <input type="email" id="email" name="email" required><br>

        <label for="respuesta1">Respuesta correcta(*) </label><br>
        <input type=”text” id=respuesta1 name="respuesta" required><br>

        <label for="respuesta2">Respuesta incorrecta(*) </label><br>
        <input type=”text” id=respuesta2 name="respuesta" required><br>

        <label for="respuesta3">Respuesta incorrecta(*) </label><br>
        <input type=”text” id=respuesta3 name="respuesta" required><br>

        <label for="respuesta4">Respuesta incorrecta(*) </label><br>
        <input type=”text” id=respuesta4 name="respuesta" required><br>

        <label for="complejidad">Complejidad(*) </label><br>
        <select id="complejidad" name="complejidad" required>
                <option value="1">Baja</option>
                <option value="2" selected>Media</option>
                <option value="3">Alta</option>
        </select>
        <br>


        <label for="temaPregunta">Tema de la pregunta(*): </label>
        <input type="text" id="temaPregunta" name="TemaPreg" required><br>
        <input type="file" id="CargarImagen" accept="image/*" name="Imagen">
        <img id="imagenprev" src="#" alt="" width="120px" height="120px" />

        <br><br>
        <button>Enviar</button>

      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>