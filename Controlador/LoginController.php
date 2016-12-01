<?php
require_once 'Controlador/controlador_base.php';
require_once 'Model/UsuarioModel.php';
require_once 'Vista/ProcesadorPlantilla.php';
class LoginController extends ControladorBase{

    public function __construct() {
        parent::__construct();
    }

    public function showView(){
      $procesadorPlantillas = new ProcesorViews();
      $procesadorPlantillas->show("login.html");
    }

}
?>
