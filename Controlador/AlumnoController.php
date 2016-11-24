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
        //$this->view("index",array(
        //    "allusers"=>$allusers,
        //    "Hola"    =>"Soy Víctor Robles"
        //));
    }



    public function pruebas(){
        $alumno=new AlumnoModel();
        $usu=$alumno->getAlumnoByName("1");
        echo "hola: ".$usu[0]["email"];
        $usus=$alumno->getAll();
        print_r($usus);

    }

}
?>
