<?php
require_once 'Model/model.php';
require_once 'Model/CurriculumEntity.php';
class CurriculumModel extends Model{
    private $table;

    public function __construct(){
        $this->table="Curriculum";
        parent::__construct($this->table);
    }

    public function findCurriculumByUserId($userId){
        $query="SELECT * FROM Curriculum WHERE id_usuario='".$userId."'";
        $result=$this->ejecutarSql($query);
        return $this->parsearCurriculum($result);
    }

    public function parsearCurriculum($result){
      if($result){
        $curriculum = new Curriculum();
        $curriculum->setId($result[0]["id"]);
        $curriculum->setIdUsuario($result[0]["id_usuario"]);
        $curriculum->setDescripcion($result[0]["descripcion"]);
        $curriculum->setExperiencia($result[0]["experiencia"]);
        $curriculum->setHistorialAcademico($result[0]["historial_academico"]);
        $curriculum->setArchivo($result[0]["archivo"]);
        return $curriculum;
      }
      else{
        return false;
      }
    }

    public function save($curriculum){
        $query="INSERT INTO Curriculum (id_usuario,descripcion,experiencia, historial_academico, archivo)
                VALUES(
                       ".$curriculum->getIdUsuario().",
                       '".$curriculum->getDescripcion()."',
                       '".$curriculum->getExperiencia()."',
                       '".$curriculum->getHistorialAcademico()."',
                       '".$curriculum->getArchivo()."');";
        $result = $this->ejecutarSql($query);
        return $result;
    }
}
?>
