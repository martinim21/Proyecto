<?php
require_once 'Model/entity.php';
class Alumno extends Entity{
  private $id;
  private $nombre;
  private $username;
  private $password;
  private $email;
  private $carrera;
  private $direccion;
  private $idCurriculum;
  private $isAdmin;
  private $lastLogin;

    public function __construct() {
        $table="Alumno";
        parent::__construct($table);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }


    public function getCarrera() {
        return $this->carrera;
    }

    public function setCarrera($carrera) {
        $this->carrera = $carrera;
    }


    public function getDireccion() {
        return $this->dirreccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }


    public function getIdCurriculum() {
        return $this->idCurriculum;
    }

    public function setIdCurriculum($idCurriculum) {
        $this->idCurriculum = $idCurriculum;
    }

    public function getIsAdmin() {
        return $this->isAdmin;
    }

    public function setIsAdmin($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    public function getLastLogin() {
        return $this->lastLogin;
    }

    public function setLastLogin($lastLogin) {
        $this->lastLogin = $lastLogin;
    }

    public function save(){
        $query="INSERT INTO Alumno (id,nombre,user_name,password, email, carrera, direccion, id_curriculum, is_admin, fecha_ultimo_login)
                VALUES(rand(1, 1000),
                       '".$this->nombre."',
                       '".$this->username."',
                       '".$this->password."',
                       '".$this->email."',
                       '".$this->carrera."',
                       '".$this->direccion."',
                       '".$this->idCurriculum."',
                       '".$this->isAdmin."',
                       '".$this->lastLogin."');";
        $save=$this->db()->query($query);
        return $save;
    }

}
?>
