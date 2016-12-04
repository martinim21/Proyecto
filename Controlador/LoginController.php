<?php
require_once 'Controlador/controlador_base.php';
require_once 'Model/UsuarioModel.php';
require_once 'Vista/ProcesadorPlantilla.php';
class LoginController extends ControladorBase{

    public function __construct() {
        parent::__construct();
    }

    public function showView($vars = array()){
      $procesadorPlantillas = new ProcesorViews();
      if(!isset($vars["mensaje"]) || $vars["mensaje"] == ""){
        $vars["dialog"] = "";
      }
      else{
        $vars["dialog"] = $this->createDialog($vars["mensaje"]);
      }
      $procesadorPlantillas->show("login.html", $vars);
    }

    public function createDialog($msg){
      $dialog = "<script>$(document).ready(function() {
        Materialize.toast('".$msg."', 4000);
      });</script>";
      return $dialog;
    }
}
?>
