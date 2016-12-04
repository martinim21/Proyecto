<?php
require_once 'Model/entity.php';
class Curriculum extends Entity{
  private $id;
  private $idUsuario;
  private $descripcion;
  private $experiencia;
  private $historialAcademico;
  private $archivo;

    public function __construct() {
        $table="Curriculum";
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

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getExperiencia() {
        return $this->experiencia;
    }

    public function setExperiencia($experiencia) {
        $this->experiencia = $experiencia;
    }

    public function getHistorialAcademico() {
        return $this->historialAcademico;
    }

    public function setHistorialAcademico($historialAcademico) {
        $this->historialAcademico = $historialAcademico;
    }

    public function getArchivo() {
        return $this->archivo;
    }

    public function setArchivo($archivo) {
        $this->archivo = $archivo;
    }


    public function initDefaultValues(){
      $descripcion = "";
      $experiencia = "";
      $historialAcademico = "";
      $archivo = "";

    }
    public function imprime(){
      echo("<br>");
      echo("id: " . $this->id);
      echo("id_usuario: " . $this->idUsuario);
      echo("descripcion: " . $this->descripcion);
      echo("experiencia: " . $this->experiencia);
      echo("historialAcademico: " . $this->historialAcademico);
    }

}
?>
