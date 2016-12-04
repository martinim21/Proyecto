<?php
require_once 'Controlador/controlador_base.php';
require_once 'Model/UsuarioModel.php';
require_once 'Model/UsuarioEntity.php';
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
        $procesadorPlantillas->show("login.html",array("dialog" => ""));
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

    public function insertUser($formulario){
      try {
        $usuario = new Usuario();
        $model=new UsuarioModel();
        $msg = $this->isValidForm($formulario, $usuario);
        if($msg!="ok"){
          return "Usuario no registrado: " . $msg;
        }
        $this->setUser($formulario, $usuario);
        if($model->findUsuarioByUsername($usuario->getUsername()) ){
          return "Usuario no registrado: ya existe ese nombre de usuario";
        }
        if($model->findUsuarioByMail($usuario->getEmail()) ){
          return "Usuario no registrado: el email ya se encuentra registrado";
        }
        $model->save($usuario);
        $msg = "Usuario insertado correctamente";
      } catch (Exception $e) {
          $msg = 'Usuario no registrado: Error al insertar usuario: ' .  $e->getMessage();
      }
      return $msg;
    }

    public function isValidForm($formulario, $usuario){
      if(!preg_match("/^\w+$/", $formulario["student_user"])) {
        return "el username no valido";
      }
      if(!preg_match("/^\w(\.|\w)*@\w+(\.|\w)*$/", $formulario["student_email"])) {
        return "el e-mail no es valido";
      }
      if(!preg_match("/^\w(\w|\s)+$/", $formulario["student_name"])) {
        return "el nombre de usuario no es valido";
      }
      if(preg_match("/^\s+$/",$formulario["user_password"]) || $formulario["user_password"] != $formulario["user_password2"]) {
        return "el password no es correcto";
      }

      return "ok";
    }

    public function setUser($formulario, $usuario){
      $usuario->initDefaultValues();
      $usuario->setUsername($formulario["student_user"]);
      $usuario->setPassword($formulario["user_password"]);
      $usuario->setNombre($formulario["student_name"]);
      $usuario->setEmail($formulario["student_email"]);
    }

}
?>
