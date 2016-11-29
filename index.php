<?php
  /*  require 'Controlador/sesiones.php';
    session_start();
    $sesion = new SessionControlller();
    $sesion->login(2,3);
*/
    $array = array("electronico");
    require 'Controlador/UsuarioController.php';
    $a=new UsuarioController();
    $a->getAllUsuarios();
    //$sesion->logout()
?>
