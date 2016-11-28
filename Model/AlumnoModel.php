<?php
require_once 'Model/model.php';
class AlumnoModel extends Model{
    private $table;

    public function __construct(){
        $this->table="Alumno";
        parent::__construct($this->table);
    }

    public function findAlumnoByName($name){
        $query="SELECT * FROM Alumno WHERE nombre='".$name."'";
        $alumno=$this->ejecutarSql($query);
        return $alumno;
    }
    public function findAlumnoById($id){
        $query="SELECT * FROM Alumno WHERE id='".$id."'";
        $alumno=$this->ejecutarSql($query);
        return $alumno;
    }

    public function findAlumnosBySkills($skillList){
      $skillArgs="";
      foreach ($skillList as $skill) {
        $skillArgs=$skillArgs.", '". $skill."'";
      }
      $skillArgs = substr($skillArgs, 1);
      $query = "select Alumno.* from Alumno inner join Skill on Alumno.id = Skill.id_alumno where Skill.nombre in (".$skillArgs.")";
      $alumnos=$this->ejecutarSql($query);
      return $alumnos;
    }

    public function findAlumnosBySkillAndPercent($skill, $percent){
      $query = "select Alumno.* from Alumno inner join Skill on Alumno.id = Skill.id_alumno where Skill.nombre like '".$skill."' and porcentaje >= ".$percent."";
      $alumnos=$this->ejecutarSql($query);
      return $alumnos;
    }

}
?>
