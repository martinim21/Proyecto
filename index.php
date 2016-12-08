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


    if(isset($_GET['ctl']) && $_GET['ctl'] == 'regresar' && isset($_SESSION['username'])){
      $mvc=new UsuarioController();

      if(isset($_SESSION['username'])){
        $_REQUEST['username']= $_SESSION['username'];
          $_REQUEST['password']= "";
      }
      $mvc->showView($_REQUEST['username'], $_REQUEST['password']);
    }
    elseif(isset($_GET['ctl']) && $_GET['ctl'] == 'updateUser' && isset($_REQUEST['username'])){
      if($_REQUEST["name"] == ""){

        echo("error el usuario esta vacio");

      }
      else{
        $mvc=new UsuarioController();
        $mvc->updateUser($_REQUEST);
      }
    }
    elseif(isset($_GET['ctl']) && $_GET['ctl'] == 'sendMessage' && isset($_REQUEST['receptor_id'])&&isset($_SESSION['username'])){
      $mvc=new UsuarioController();
      $username_remitente = $_SESSION['username'];
      $receptor_id = $_REQUEST['receptor_id'];
      $asunto = $_REQUEST['asunto'];
      $cuerpo = $_REQUEST['cuerpo'];

      $mvc->saveMessage($username_remitente, $receptor_id, $asunto,  $cuerpo);
    }
    elseif(isset($_GET['ctl']) && $_GET['ctl'] == 'saveMessage' && isset($_REQUEST['correoId']) && is_numeric($_REQUEST['correoId'])){
      $mensajeId =$_REQUEST['correoId'];
      $mvc=new UsuarioController();
      $mvc->updateMensajeFechaVistoById($mensajeId);
    }
    elseif(isset($_REQUEST['logout']) && $_REQUEST['logout'] == 'true'){
      $mvc=new UsuarioController();
      $mvc->logout();
      require 'Controlador/LoginController.php';
      $mvc=new LoginController();
      $mvc->showView(array());
    }
    elseif(isset($_GET['ctl']) && $_GET['ctl'] == 'saveMessage' && isset($_REQUEST['correoId']) && is_numeric($_REQUEST['correoId'])){
      $mensajeId =$_REQUEST['correoId'];
      $mvc=new UsuarioController();
      $mvc->updateMensajeFechaVistoById($mensajeId);
    }
    elseif(isset($_REQUEST['user_password']) && isset($_REQUEST['user_password2'])){
      $mvcUser=new UsuarioController();
      require 'Controlador/LoginController.php';
      $mvcLogin=new LoginController();

      $msg = $mvcUser->insertUser($_POST);
      $mvcLogin->showView(array('mensaje' => $msg));

    }
    elseif(isset($_REQUEST['register']) && $_REQUEST['register'] == 'true'){
      $procesadorPlantillas->show("student_register.html");
    }
    elseif(!isset($_GET['ctl'])&&((isset($_REQUEST['username']) && isset($_REQUEST['password'])) || (isset($_SESSION['username'])))){
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
    elseif(isset($_GET['ctl']) && $_GET['ctl'] == 'search' && isset($_SESSION['username'])){
      $params=array();
      $userList=array();
      $items=array();
      if(isset($_REQUEST['queryParams']) && $_REQUEST['queryParams']!="" && isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $query = $_REQUEST['queryParams'];
        $mvc=new UsuarioController();
        //$userList = $mvc->searchUsers($username, $query);
        $items["items"] = $mvc->searchUsers($username, $query);

      }
      $procesadorPlantillas->show("search_company.html", $items);
    }
    else{
      require 'Controlador/LoginController.php';
      $mvc=new LoginController();
      $mvc->showView(array());
    }

?>
