<?php
require_once 'Model/entity.php';
class Skill extends Entity{
  private $id;
  private $idUsuario;
  private $nombre;
  private $porcentaje;

    public function __construct() {
        $table="Skill";
        parent::__construct($table);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPorcentaje() {
        return $this->porcentaje;
    }

    public function setPorcentaje($porcentaje) {
        $this->porcentaje = $porcentaje;
    }

    public function initDefaultValues(){
       $nombre = '';
       $porcentaje = 100;

    }
    public function imprime(){
      echo("<br>");
      echo("id: " . $this->id);
      echo("id usuario: " . $this->idUsuario);
      echo("nombre: " . $this->nombre);
      echo("porcentaje: " . $this->porcentaje);
    }

}
?>
