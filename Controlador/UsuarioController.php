<?php
require_once 'Controlador/controlador_base.php';
require_once 'Model/UsuarioModel.php';
require_once 'Vista/ProcesadorPlantilla.php';
class UsuarioController extends ControladorBase{

    public function __construct() {
        parent::__construct();
    }

    public function showView($username, $password){
      $procesadorPlantillas = new ProcesorViews();
      if($this->login($username, $password)){
        $procesadorPlantillas->show("student.html", array('nombre' => "manzano", 'list' => array("manzana",2,3), 'list2' => array(4,5,6)));
      }
      else{
        $procesadorPlantillas->show("login.html");
      }
    }

    public function isLogged($username){
      if(isset($_SESSION[$username]))
        return true;
      return false;
    }

    public function logout(){
      session_unset();
      session_destroy();
      setcookie(session_name(), '', time() - 36000);
    }

    public function login($username, $password){
      $model=new UsuarioModel();

      if(isset($_SESSION['username'] )){
        $result = $model->findUsuarioByUsername($_SESSION['username']);
        return $result;
      }

      $result = $model->findUsuarioByNameAndPassword($username, $password);

      if(!$result){
        return $result;
      }
      $_SESSION['username'] = $username;
        return $result;
    }

    public function getAllUsuarios(){
        $usuario=new UsuarioModel();
        $allusers=$usuario->getAll();
        return $allusers;
    }

    public function getAlumnsBySkills($skillList){
      $model=new UsuarioModel();
      $result = $model->findUsuariosBySkills($skillList);
      return $result;
    }

    public function getAlumnsBySkillAndPercent($skill, $percent){
      $model=new UsuarioModel();
      $result = $model->findUsuariosBySkillAndPercent($skill, $percent);
      return $result;
    }

    public function getUsuarioByName($name){
      $model=new UsuarioModel();
      $result = $model->findUsuarioByName($name);
      return $result;
    }

    public function getEmpresasByGiro($listaGiros){
      $model=new UsuarioModel();
      $result = $model->findUsuarioByGiro($listaGiros);
      return $result;
    }

}
?>
