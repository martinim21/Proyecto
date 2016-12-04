<?php
require_once 'Model/entity.php';
class Usuario extends Entity{
  private $id;
  private $nombre;
  private $username;
  private $password;
  private $email;
  private $carrera;
  private $direccion;
  private $descripcion;
  private $idCurriculum;
  private $lastLogin;
  private $giro;
  private $tipo;

    public function __construct() {
        $table="Usuario";
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

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
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
        return $this->direccion;
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

    public function getLastLogin() {
        return $this->lastLogin;
    }

    public function setLastLogin($lastLogin) {
        $this->lastLogin = $lastLogin;
    }

    public function getGiro() {
        return $this->giro;
    }

    public function setGiro($giro) {
        $this->giro = $giro;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function initDefaultValues(){
      $this->nombre = "";
      $this->username = "";
      $this->password = "";
      $this->email = "";
      $this->carrera = "";
      $this->direccion = "";
      $this->descripcion = "";
      $this->idCurriculum = "null";
      $this->lastLogin = "CURRENT_TIMESTAMP()";
      $this->giro = "";
      $this->tipo = "";

    }
    public function imprime(){
      echo("<br>");
      echo("nombre: " . $this->nombre);
      echo("username: " . $this->username);
      echo("password: " . $this->password);
      echo("email: " . $this->email);
      echo("carrera: " . $this->carrera);
      echo("direccion: " . $this->direccion);
      echo("idCurriculum: " . $this->idCurriculum);
      echo("lastLogin: " . $this->lastLogin);
      echo("Giro: " . $this->giro);
      echo("tipo: " . $this->tipo);
    }

}
?>
