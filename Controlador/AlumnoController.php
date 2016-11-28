<?php
require_once 'Controlador/controlador_base.php';
class AlumnoController extends ControladorBase{

    public function __construct() {
        parent::__construct();
    }

    public function index(){

        $usuario=new Alumno();

        $allusers=$usuario->getAll();
        print_r($allusers);
    }



    public function pruebas(){
        $alumno=new AlumnoModel();
        $usu=$alumno->findAlumnoByName("1");
        echo "hola: ".$usu[0]["email"];
        $usus=$alumno->getAll();
        print_r($usus);

    }

    public function getAlumnsBySkills($skillList){
      $model=new AlumnoModel();
      $result = $model->findAlumnosBySkills($skillList);
      return $result;
    }

    public function getAlumnsBySkillAndPercent($skill, $percent){
      $model=new AlumnoModel();
      $result = $model->findAlumnosBySkillAndPercent($skill, $percent);
      return $result;
    }

}
?>
