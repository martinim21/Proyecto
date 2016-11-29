<?php
require_once 'Controlador/controlador_base.php';
require_once 'Model/UsuarioModel.php';
require_once 'Vista/ProcesadorPlantilla.php';
class UsuarioController extends ControladorBase{

    public function __construct() {
        parent::__construct();
    }

    public function getAllUsuarios(){

        $usuario=new UsuarioModel();
        $procesadorPlantillas = new ProcesorViews();

        $allusers=$usuario->getAll();
        $procesadorPlantillas->show("student.html", array('nombre' => "manzano", 'list' => array("manzana",2,3), 'list2' => array(4,5,6)));
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
