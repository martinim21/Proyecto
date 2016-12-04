<?php
require_once 'Controlador/controlador_base.php';
require_once 'Model/UsuarioModel.php';
require_once 'Model/CurriculumModel.php';
require_once 'Model/MensajeModel.php';
require_once 'Model/SkillModel.php';
require_once 'Model/UsuarioEntity.php';
require_once 'Model/CurriculumEntity.php';
require_once 'Model/SkillEntity.php';
require_once 'Model/MensajeEntity.php';
require_once 'Vista/ProcesadorPlantilla.php';

class UsuarioController extends ControladorBase{

    public function __construct() {
        parent::__construct();
    }

    public function showView($username, $password){
      $procesadorPlantillas = new ProcesorViews();
      $usuario = $this->login($username, $password);
      if($usuario){
        $procesadorPlantillas->show("student.html", $this->getParams($usuario));
      }
      else{
        require 'Controlador/LoginController.php';
        $mvcLogin=new LoginController();
        $mvcLogin->showView(array('mensaje' => "el usuario no se encontro o el password es incorrecto"));
      }
    }


    public function getParams($usuario){
        $CurriculumModel=new CurriculumModel();
        $curriculum = $CurriculumModel->findCurriculumByUserId($usuario->getId());
        $paramList = array();
        $paramList["mailList"] = $this->createMailList($usuario->getId());
        $paramList["name"] = $usuario->getNombre();
        $paramList["username"] = $usuario->getUsername();
        $paramList["carrera"] = $usuario->getCarrera();
        $paramList["descripcion"] = ($curriculum)?$curriculum->getDescripcion():"";
        $paramList["experiencia"] = ($curriculum)?$curriculum->getExperiencia():"";
        $paramList["historial_academico"] = ($curriculum)?$curriculum->getHistorialAcademico():"";
        $paramList["skills"] = $this->createSkillList($usuario->getId());

        return $paramList;
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

    public function createMailList($userId){
      $mailList = [];
      $idBtnModal = "btnModal";
      $idModal = "modal";
      $count=1;

      $mensajeModel=new MensajeModel();
      $usuarioModel=new UsuarioModel();

      $mensajes = $mensajeModel->findMensajesRecibidosByUserId($userId);
      foreach ($mensajes as $mensaje) {
        $usuarioRemitente = $usuarioModel->findUsuarioById($mensaje->getIdEmisor());
        array_push($mailList, $this->mailString($idBtnModal.$count, $idModal.$count, $mensaje->getAsunto(), $usuarioRemitente->getNombre(), $mensaje->getContenido(), $mensaje->getFechaEnviado(), $mensaje->getFechaVisto()));
      }
      return $mailList;
    }

    public function mailString($id, $idModal, $asunto, $remitente, $cuerpo, $fecha, $estaLeido){
      $icon = "drafts";
      if($estaLeido=='0000-00-00 00:00:00'){
        $icon = "mail";
      }
      $mail = "<a id=\"" . $id . "\" class=\"waves-effect waves-light collapsible-header modal-trigger grey lighten-3\" data-target=\"" . $idModal . "\"><i class=\"material-icons\">" . $icon . "</i>" . $remitente . "</a>
      <div id=\"" . $idModal . "\" class=\"modal\">
          <div class=\"modal-content\">
              <h4>" . $asunto . "</h4><small> " . $fecha . "</small>
              <p>" . $cuerpo . "</p>
          </div>
          <div class=\"modal-footer\">
              <a href=\"#!\" class=\" modal-action modal-close waves-effect waves-green btn-flat\">ok</a>
          </div>
      </div>
      ";
      return $mail;
    }

    public function createSkillList($userId){
      $skillList = [];
      $skillModel=new SkillModel();
      $skillResult = $skillModel->findSkillByUserId($userId);
      foreach ($skillResult as $skill) {
        $starts ="";
        for($index=0; $index<($skill->getPorcentaje()/20);$index++){
          $starts = $starts."<img src=\"Vista/img/estrella_azul_18_18.jpg\" class=\"icon_start\">";
        }


        $skill = "<tr class=\"row\"><td class=\"col s6\">" . $skill->getNombre() . "</td><td class=\"col s6\">" . $starts . "</td></tr>";
        array_push($skillList, $skill);
      }
      return $skillList;
    }

}
?>
