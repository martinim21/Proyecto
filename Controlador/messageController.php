<?php

require_once 'Model/MensajeModel.php';
require_once 'Model/MensajeEntity.php';

class MensajeController extends ControladorBase{

    public function __construct() {
        parent::__construct();
    }

  public function getmessagesByUser($userId){
    $mensajeModel=new MensajeModel();

    $mensajes = $mensajeModel->findMensajesRecibidosByUserId($userId);
    return $mensajes;

  }

  public function updateMensajeFechaVistoById($mensajeId){
    $mensajeModel=new MensajeModel();
    $mensajeModel->updateFechaVistoById($mensajeId);
  }

  public function saveMessage($username_remitente, $receptor_id, $asunto,  $cuerpo){
    $mensajeModel=new MensajeModel();
    $mensaje = new Mensaje();
    $usuarioModel=new UsuarioModel();
    $user = $usuarioModel->findUsuarioByUsername($username_remitente);
    $mensaje->initDefaultValues();
    $mensaje->setAsunto($asunto);
    $mensaje->setContenido($cuerpo);
    $mensaje->setIdReceptor($receptor_id);
    $mensaje->setIdEmisor($user->getId());
    //$this->enviarCorreo();
    $mensajeModel->save($mensaje);
  }

  public function enviarCorreo(){
    $para      = 'martin.ibarra201@gmail.com';
    $titulo    = 'El título';
    $mensaje   = 'Hola';
    $cabeceras = 'From: mail@example.com' . "\r\n" .
      'Reply-To: mail@example.com' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();

    mail($para, $titulo, $mensaje, $cabeceras);
  }

}

 ?>
