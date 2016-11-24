<html>
  <head>
    <title>Welcome to choose.com!</title>
  </head>
  <body>
    <h1>The choose.com virtual host is working!</h1>
    <a href="Vista/templates/student.php">estudiante</a>
    <?php
  /*  require 'Controlador/sesiones.php';
    session_start();
    $sesion = new SessionControlller();
    $sesion->login(2,3);
*/
    require 'Controlador/AlumnoController.php';
    $a=new AlumnoController();
    $a->index();
    //$sesion->logout();
     ?>
  </body>
</html>
