<?php
require_once 'Model/entity.php';
class Mensaje extends Entity{
  private $id;
  private $asunto;
  private $contenido;
  private $fechaEnviado;
  private $fechaVisto;
  private $idEmisor;
  private $idReceptor;

    public function __construct() {
        $table="Mensaje";
        parent::__construct($table);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAsunto() {
        return $this->asunto;
    }

    public function setAsunto($asunto) {
        $this->asunto = $asunto;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function getFechaEnviado() {
        return $this->fechaEnviado;
    }

    public function setFechaEnviado($fechaEnviado) {
        $this->fechaEnviado = $fechaEnviado;
    }

    public function getFechaVisto() {
        return $this->fechaVisto;
    }

    public function setFechaVisto($fechaVisto) {
        $this->fechaVisto = $fechaVisto;
    }

    public function getIdEmisor() {
        return $this->idEmisor;
    }

    public function setIdEmisor($idEmisor) {
        $this->idEmisor = $idEmisor;
    }

    public function getIdReceptor() {
        return $this->idReceptor;
    }

    public function setIdReceptor($idReceptor) {
        $this->idReceptor = $idReceptor;
    }

    public function initDefaultValues(){
       $asunto = '';
       $contenido = '';
       $fechaEnviado = "CURRENT_TIMESTAMP()";
       $fechaVisto = '0';

    }
    public function imprime(){
      echo("<br>");
      echo("id: " . $this->id);
      echo("asunto: " . $this->asunto);
      echo("fechaEnviado: " . $this->fechaEnviado);
      echo("fechaVisto: " . $this->fechaVisto);
    }

}
?>
