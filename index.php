<?php
  /*  require 'Controlador/sesiones.php';
    session_start();
    $sesion = new SessionControlller();
    $sesion->login(2,3);
*/
    /*$array = array("electronico");
    require 'Controlador/UsuarioController.php';
    $a=new UsuarioController();
    $a->getAllUsuarios();
    //$sesion->logout()
*/

    session_start();
    require_once 'Vista/ProcesadorPlantilla.php';
    require_once 'Controlador/UsuarioController.php';

    $procesadorPlantillas = new ProcesorViews();
    if(isset($_GET['logout']) && $_GET['logout'] == 'true'){
      $mvc=new UsuarioController();
      $mvc->logout();
    }

    if((isset($_REQUEST['username']) && isset($_REQUEST['password'])) || (isset($_SESSION['username']))){
      $mvc=new UsuarioController();

      if(isset($_SESSION['username'])){
        $_REQUEST['username']= $_SESSION['username'];
          $_REQUEST['password']= "";
      }
      $mvc->showView($_REQUEST['username'], $_REQUEST['password']);
    }
    elseif(isset($_GET['ctl']) && $_GET['ctl'] == 'compania'){
      $procesadorPlantillas->show("compania.html");
    }
    elseif(isset($_GET['ctl']) && $_GET['ctl'] == 'compania_register'){
      $procesadorPlantillas->show("company_register.html");
    }
    elseif(isset($_GET['ctl']) && $_GET['ctl'] == 'alumno_register'){
      $procesadorPlantillas->show("student_register.html");
    }
    else{
      require 'Controlador/LoginController.php';
      $mvc=new LoginController();
      $mvc->showView();
    }
?>
