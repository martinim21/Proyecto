<?php
require_once 'Model/entity.php';
class Empresa extends Entity{
  private $id;
  private $razonSocial;
  private $username;
  private $password;
  private $email;
  private $giro;
  private $direccion;
  private $descripcion;

    public function __construct() {
        $table="Empresa";
        parent::__construct($table);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getRazonSocial() {
        return $this->razonSocial;
    }

    public function setRazonSocial($razonSocial) {
        $this->razonSocial = $razonSocial;
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


    public function getGiro() {
        return $this->giro;
    }

    public function setGiro($giro) {
        $this->giro = $giro;
    }


    public function getDireccion() {
        return $this->dirreccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }


    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function save(){
        $query="INSERT INTO Empresa (id,razon_social,user_name,password, email, giro, direccion, descripcion)
                VALUES(rand(1, 1000),
                       '".$this->razonSocial."',
                       '".$this->username."',
                       '".$this->password."',
                       '".$this->email."',
                       '".$this->giro."',
                       '".$this->direccion."',
                       '".$this->descripcion."');";
        $save=$this->db()->query($query);
        return $save;
    }

}
?>
