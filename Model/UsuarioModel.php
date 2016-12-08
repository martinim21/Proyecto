<?php
require_once 'Model/model.php';
require_once 'Model/UsuarioEntity.php';
class UsuarioModel extends Model{
    private $table;

    public function __construct(){
        $this->table="Usuario";
        parent::__construct($this->table);
    }

    public function findUsuarioByName($name){
        $name = trim(str_replace("'","",$name));
        $query="SELECT * FROM Usuario WHERE nombre like '%".$name."%';";
        $results=$this->ejecutarSql($query);
        return $this->parsearUsuarios($results);
    }

    public function findUsuarioByEspecialidad($especialidad){
        $especialidad = trim(str_replace("'","",$especialidad));
        $query="SELECT * FROM Usuario WHERE carrera like '%".$especialidad."%';";
        print_r($query);
        $results=$this->ejecutarSql($query);
        return $this->parsearUsuarios($results);
    }
    public function findUsuarioByUsername($name){

        $name = trim(str_replace("'","",$name));
        $query="SELECT * FROM Usuario WHERE user_name like '%".$name."%'";
        $result=$this->ejecutarSql($query);
        return $this->parsearUsuario($result);
    }

    public function findUsuarioByMail($mail){
        $query="SELECT * FROM Usuario WHERE email = '".$mail."'";
        $result=$this->ejecutarSql($query);
        return $this->parsearUsuario($result);
    }

    public function findUsuarioByNameAndPassword($name, $password){
        $query="SELECT * FROM Usuario WHERE user_name='".$name."' and password = '".$password."'";
        $result=$this->ejecutarSql($query);
        return $this->parsearUsuario($result);
    }

    public function findUsuarioById($id){
        $query="SELECT * FROM Usuario WHERE id='".$id."'";
        $result=$this->ejecutarSql($query);
        return $this->parsearUsuario($result);
    }

    public function findUsuariosBySkills($skillList){
      $skillArgs="";
      foreach ($skillList as $skill) {
        $skillArgs=$skillArgs.", '". $skill."'";
      }
      $skillArgs = substr($skillArgs, 1);
      $query = "select Usuario.* from Usuario inner join Skill on Usuario.id = Skill.id_Usuario where Skill.nombre in (".$skillArgs.")";
      $results=$this->ejecutarSql($query);
      return $this->parsearUsuarios($results);
    }

    public function findUsuariosByStringSkills($stringSkillList){
      $query = "select Usuario.* from Usuario inner join Skill on Usuario.id = Skill.id_Usuario where Skill.nombre in (".$stringSkillList.")";
      $results=$this->ejecutarSql($query);
      return $this->parsearUsuarios($results);
    }

    public function findUsuariosByStringCurriculum($stringQualitie){
      $stringQualitie = trim(str_replace("'","",$stringQualitie));
      $query = "select Usuario.* from Usuario inner join Curriculum on Usuario.id = Curriculum.id_Usuario where Curriculum.descripcion like '%".$stringQualitie."%' or Curriculum.experiencia like '%".$stringQualitie."%' or Curriculum.historial_academico like '%".$stringQualitie."%' ";

      $results=$this->ejecutarSql($query);
      return $this->parsearUsuarios($results);
    }

    public function findUsuariosBySkillAndPercent($skill, $percent){
      $query = "select Usuario.* from Usuario inner join Skill on Usuario.id = Skill.id_Usuario where Skill.nombre like '".$skill."' and porcentaje >= ".$percent."";
      $results=$this->ejecutarSql($query);
      return $this->parsearUsuarios($results);
    }

    public function findUsuarioByGiro($listaGiros){
      $giroParams="";
      foreach ($listaGiros as $giro) {
        $giroParams=$giroParams.", '". $giro."'";
      }
      $giroParams = substr($giroParams, 1);
      $query = "select * from Usuario  where giro in (".$giroParams.")";
      $results=$this->ejecutarSql($query);
      return $this->parsearUsuarios($results);
    }

    public function parsearUsuario($result){
      if($result){
        $usuario = new Usuario();
        $usuario->setId($result[0]["id"]);
        $usuario->setNombre($result[0]["nombre"]);
        $usuario->setUsername($result[0]["user_name"]);
        $usuario->setPassword($result[0]["password"]);
        $usuario->setEmail($result[0]["email"]);
        $usuario->setCarrera($result[0]["carrera"]);
        $usuario->setDireccion($result[0]["direccion"]);
        $usuario->setLastLogin($result[0]["fecha_ultimo_login"]);
        $usuario->setDescripcion($result[0]["descripcion"]);
        $usuario->setGiro($result[0]["giro"]);
        $usuario->setTipo($result[0]["tipo"]);
        $usuario->setFoto($result[0]["foto"]);
        return $usuario;
      }
      else{
        return false;
      }
    }

    public function parsearUsuarios($results){

      $usuarioList=[];
      foreach($results as $result){

        $usuario = new Usuario();
        $usuario->setId($result["id"]);
        $usuario->setNombre($result["nombre"]);
        $usuario->setUsername($result["user_name"]);
        $usuario->setPassword($result["password"]);
        $usuario->setEmail($result["email"]);
        $usuario->setCarrera($result["carrera"]);
        $usuario->setDireccion($result["direccion"]);
        $usuario->setLastLogin($result["fecha_ultimo_login"]);
        $usuario->setDescripcion($result["descripcion"]);
        $usuario->setGiro($result["giro"]);
        $usuario->setTipo($result["tipo"]);
        $usuario->setFoto($result["foto"]);

        array_push($usuarioList, $usuario);
      }
      return $usuarioList;
    }

    public function update($usuario){
        $query="UPDATE Usuario SET
                       nombre = '".$usuario->getNombre()."',
                       user_name = '".$usuario->getUsername()."',
                       password = '".$usuario->getPassword()."',
                       email = '".$usuario->getEmail()."',
                       carrera = '".$usuario->getCarrera()."',
                       direccion = '".$usuario->getDireccion()."',
                       fecha_ultimo_login = '".$usuario->getLastLogin()."',
                       descripcion = '".$usuario->getDescripcion()."',
                       giro = '".$usuario->getGiro()."',
                       tipo = '".$usuario->getTipo()."',
                       foto = '".$usuario->getFoto()."'
                       WHERE id = " . $usuario->getId() . ";";
        $result = $this->ejecutarSql($query);
        return $result;
    }

    public function save($usuario){
        $query="INSERT INTO Usuario (nombre,user_name,password, email, carrera, direccion, fecha_ultimo_login, descripcion, giro, tipo, foto)
                VALUES(
                       '".$usuario->getNombre()."',
                       '".$usuario->getUsername()."',
                       '".$usuario->getPassword()."',
                       '".$usuario->getEmail()."',
                       '".$usuario->getCarrera()."',
                       '".$usuario->getDireccion()."',
                       ".$usuario->getLastLogin().",
                       '".$usuario->getDescripcion()."',
                       '".$usuario->getGiro()."',
                       '".$usuario->getTipo()."',
                       '".$usuario->getFoto()."');";
        $result = $this->ejecutarSql($query);
        return $result;
    }
}
?>
