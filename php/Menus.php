<?php
session_start();
if (!isset($_SESSION['correo'])) {
  echo ("<div id='page-wrap'>
          <header class='main' id='h1'>
            <span class='right'><a href='SignUp.php'>Registro</a></span>
            <span class='right'><a href='LogIn.php'>Login</a></span>
          </header>
          <nav class='main' role='navigation'>
            <span><a href='Layout.php'>Inicio</a></span>
            <span><a href='Credits.php'>Creditos</a></span>
          </nav>
        </div>");
} else {
  echo ("<div id='page-wrap'>
          <header class='main' id='h1'>
            <span class='right'><a href='LogOut.php'>Logout</a></span>
          </header>
          <nav class='main' role='navigation'>
            <span><a href='Layout.php'>Inicio</a></span>
            <span><a href='QuestionFormWithImage.php'> Insertar Pregunta</a></span>
            <span><a href='ShowQuestionsWithImage.php'> Ver preguntas</a></span>
            <span><a href='ShowXMLQuestions.php'> Ver preguntas XML</a></span>
            <span><a href='ShowJsonQuestions.php'> Ver preguntas JSON</a></span>
            <span><a href='Credits.php'>Creditos</a></span>
            </nav>
        </div>");
}
?>
