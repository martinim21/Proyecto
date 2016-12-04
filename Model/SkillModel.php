<?php
require_once 'Model/model.php';
require_once 'Model/SkillEntity.php';
class SkillModel extends Model{
    private $table;

    public function __construct(){
        $this->table="Skill";
        parent::__construct($this->table);
    }

    public function findSkillByUserId($userId){
        $query="SELECT * FROM Skill WHERE id_usuario='".$userId."'";
        $results=$this->ejecutarSql($query);
        return $this->parsearSkills($results);
    }

    public function parsearSkills($results){
      $skillList=[];
      foreach($results as $result){
          $skill = new Skill();
          $skill->setId($result["id"]);
          $skill->setIdUsuario($result["id_usuario"]);
          $skill->setNombre($result["nombre"]);
          $skill->setPorcentaje($result["porcentaje"]);
          array_push($skillList, $skill);
      }
      return $skillList;
    }

    public function save($skill){
        $query="INSERT INTO Skill (id_usuario,nombre,porcentaje)
                VALUES(
                       ".$skill->setIdUsuario().",
                       '".$skill->setNombre()."',
                       '".$skill->setPorcentaje()."');";
        $result = $this->ejecutarSql($query);
        return $result;
    }
}
?>
