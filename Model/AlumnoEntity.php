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

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
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

    public function save(){
        $query="INSERT INTO Alumno (id,nombre,user_name,password, email, carrera, direccion, id_curriculum)
                VALUES(rand(1, 1000),
                       '".$this->nombre."',
                       '".$this->username."',
                       '".$this->password."',
                       '".$this->email."',
                       '".$this->carrera."',
                       '".$this->direccion."',
                       '".$this->id_curriculum."');";
        $save=$this->db()->query($query);
        return $save;
    }

}
?>
