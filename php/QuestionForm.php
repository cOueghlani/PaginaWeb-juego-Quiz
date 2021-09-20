<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

      <form>

        <!-- Enunciado de la pregunta -->
        <label for="pregunta">Enunciado de la pregunta:</label><br>
        <input type="text" id="pregunta" name="pregunta"><br>
  
        <!-- Respuestas -->
        <input type="radio" id="html" name="fav_language" value="HTML">
        <label for="html">HTML</label><br>
        <input type="radio" id="css" name="fav_language" value="CSS">
        <label for="css">CSS</label><br>
        <input type="radio" id="javascript" name="fav_language" value="JavaScript">
        <label for="javascript">JavaScript</label>

      </form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
