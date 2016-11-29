<?php
require_once 'Model/model.php';
class UsuarioModel extends Model{
    private $table;

    public function __construct(){
        $this->table="Usuario";
        parent::__construct($this->table);
    }

    public function findUsuarioByName($name){
        $query="SELECT * FROM Usuario WHERE nombre='".$name."'";
        $Usuario=$this->ejecutarSql($query);
        return $Usuario;
    }
    public function findUsuarioById($id){
        $query="SELECT * FROM Usuario WHERE id='".$id."'";
        $Usuario=$this->ejecutarSql($query);
        return $Usuario;
    }

    public function findUsuariosBySkills($skillList){
      $skillArgs="";
      foreach ($skillList as $skill) {
        $skillArgs=$skillArgs.", '". $skill."'";
      }
      $skillArgs = substr($skillArgs, 1);
      $query = "select Usuario.* from Usuario inner join Skill on Usuario.id = Skill.id_Usuario where Skill.nombre in (".$skillArgs.")";
      $Usuarios=$this->ejecutarSql($query);
      return $Usuarios;
    }

    public function findUsuariosBySkillAndPercent($skill, $percent){
      $query = "select Usuario.* from Usuario inner join Skill on Usuario.id = Skill.id_Usuario where Skill.nombre like '".$skill."' and porcentaje >= ".$percent."";
      $Usuarios=$this->ejecutarSql($query);
      return $Usuarios;
    }

    public function findUsuarioByGiro($listaGiros){
      $giroParams="";
      foreach ($listaGiros as $giro) {
        $giroParams=$giroParams.", '". $giro."'";
      }
      $giroParams = substr($giroParams, 1);
      $query = "select * from Usuario  where giro in (".$giroParams.")";
      $result=$this->ejecutarSql($query);
      return $result;
    }

    public function save(){
        $query="INSERT INTO Usuario (id,nombre,user_name,password, email, carrera, direccion, id_curriculum, fecha_ultimo_login, descripcion, giro, tipo)
                VALUES(rand(1, 1000),
                       '".$this->nombre."',
                       '".$this->username."',
                       '".$this->password."',
                       '".$this->email."',
                       '".$this->carrera."',
                       '".$this->direccion."',
                       '".$this->idCurriculum."',
                       '".$this->lastLogin."',
                       '".$this->descripcion."',
                       ''".$this->giro."',
                       '".$this->tipo."'');";
        $save=$this->db()->query($query);
        return $save;
    }
}
?>
