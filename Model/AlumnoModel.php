<?php
require_once 'Model/model.php';
class AlumnoModel extends Model{
    private $table;

    public function __construct(){
        $this->table="Alumno";
        parent::__construct($this->table);
    }

    //Metodos de consulta
    public function getAlumnoByName($name){
        $query="SELECT * FROM Alumno WHERE nombre='".$name."'";
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }
}
?>
