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


    if(isset($_GET['ctl']) && $_GET['ctl'] == 'updateUser' && isset($_POST['username'])){
      if($_POST["name"] == ""){

        echo("error el usuario esta vacio");

      }
      else{
        $mvc=new UsuarioController();
        $mvc->updateUser($_POST);
      }
    }
    elseif(isset($_GET['ctl']) && $_GET['ctl'] == 'sendMessage' && isset($_POST['receptor_id'])&&isset($_SESSION['username'])){
      $mvc=new UsuarioController();
      $username_remitente = $_SESSION['username'];
      $receptor_id = $_POST['receptor_id'];
      $asunto = $_POST['asunto'];
      $cuerpo = $_POST['cuerpo'];

      $mvc->saveMessage($username_remitente, $receptor_id, $asunto,  $cuerpo);
    }
    elseif(isset($_GET['ctl']) && $_GET['ctl'] == 'saveMessage' && isset($_POST['correoId']) && is_numeric($_POST['correoId'])){
      $mensajeId =$_POST['correoId'];
      $mvc=new UsuarioController();
      $mvc->updateMensajeFechaVistoById($mensajeId);
    }
    elseif(isset($_POST['logout']) && $_POST['logout'] == 'true'){
      $mvc=new UsuarioController();
      $mvc->logout();
      require 'Controlador/LoginController.php';
      $mvc=new LoginController();
      $mvc->showView(array());
    }
    elseif(isset($_GET['ctl']) && $_GET['ctl'] == 'saveMessage' && isset($_POST['correoId']) && is_numeric($_POST['correoId'])){
      $mensajeId =$_POST['correoId'];
      $mvc=new UsuarioController();
      $mvc->updateMensajeFechaVistoById($mensajeId);
    }
    elseif(isset($_POST['user_password']) && isset($_POST['user_password2'])){
      $mvcUser=new UsuarioController();
      require 'Controlador/LoginController.php';
      $mvcLogin=new LoginController();

      $msg = $mvcUser->insertUser($_POST);
      $mvcLogin->showView(array('mensaje' => $msg));

    }
    elseif(isset($_POST['register']) && $_POST['register'] == 'true'){
      $procesadorPlantillas->show("student_register.html");
    }
    elseif((isset($_SESSION['username'])&&(!isset($_GET['ctl']) )) || (!isset($_GET['ctl'])&&isset($_POST['username']) && isset($_POST['password']))){
      $mvc=new UsuarioController();

      if(isset($_SESSION['username'])){
        $_POST['username']= $_SESSION['username'];
          $_POST['password']= "";
      }
      $mvc->showView($_POST['username'], $_POST['password']);
    }
    elseif(isset($_GET['ctl']) && $_GET['ctl'] == 'compania'){
      $procesadorPlantillas->show("compania.html");
    }
    elseif(isset($_GET['ctl']) && $_GET['ctl'] == 'search' && isset($_SESSION['username'])){
      $params=array();
      $userList=array();
      $items=array();
      if(isset($_POST['queryParams']) && $_POST['queryParams']!="" && isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $query = $_POST['queryParams'];

        $mvc=new UsuarioController();
        //$userList = $mvc->searchUsers($username, $query);
        $items["items"] = $mvc->searchUsers($username, $query);
      }
      $procesadorPlantillas->show("search_company.html", $items);
    }
    elseif((isset($_SESSION['username']))){
      $mvc=new UsuarioController();

      if(isset($_SESSION['username'])){
        $_POST['username']= $_SESSION['username'];
          $_POST['password']= "";
      }
      $mvc->showView($_POST['username'], $_POST['password']);

    }
    else{
      require 'Controlador/LoginController.php';
      $mvc=new LoginController();
      $mvc->showView(array());
    }

?>
