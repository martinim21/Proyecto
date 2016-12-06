<?php
require_once 'Model/model.php';
require_once 'Model/MensajeEntity.php';
class MensajeModel extends Model{
    private $table;

    public function __construct(){
        $this->table="Mensaje";
        parent::__construct($this->table);
    }

    public function findMensajesEnviadosByUserId($userId){
        $query="SELECT * FROM Mensaje WHERE id_emisor='".$userId."'";
        $results=$this->ejecutarSql($query);
        return $this->parsearMensajes($results);
    }

    public function findMensajesRecibidosByUserId($userId){
        $query="SELECT * FROM Mensaje WHERE id_receptor='".$userId."'";
        $results=$this->ejecutarSql($query);
        return $this->parsearMensajes($results);
    }

    public function updateFechaVistoById($id){
      $query="UPDATE Mensaje set fecha_visto = CURRENT_TIMESTAMP() WHERE id=".$id."";
      $results=$this->ejecutarSql($query);
      return $this->parsearMensajes($results);
    }

    public function parsearMensajes($results){
      $mensajesList=[];
      foreach($results as $result){
          $mensaje = new Mensaje();
          $mensaje->setId($result["id"]);
          $mensaje->setAsunto($result["asunto"]);
          $mensaje->setContenido($result["contenido"]);
          $mensaje->setFechaEnviado($result["fecha_enviado"]);
          $mensaje->setFechaVisto($result["fecha_visto"]);
          $mensaje->setIdEmisor($result["id_emisor"]);
          $mensaje->setIdReceptor($result["id_receptor"]);
          array_push($mensajesList, $mensaje);
      }
      return $mensajesList;
    }

    public function save($mensaje){
        $query="INSERT INTO Mensaje (asunto,contenido,fecha_enviado, fecha_visto, id_emisor, id_receptor) VALUES('".trim($mensaje->getAsunto())."','".trim($mensaje->getContenido())."','".trim($mensaje->getFechaEnviado())."','".trim($mensaje->getFechaVisto())."',".trim($mensaje->getIdEmisor()).",".trim($mensaje->getIdReceptor()).");";
        error_log("---------------------------------");
        error_log($query);
        $result = $this->ejecutarSql($query);
        return $result;
    }
}
?>
