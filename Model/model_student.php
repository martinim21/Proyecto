<?php

require_once 'db.php';
class Alumnoe{
  private $id;
  private $nombre;
  private $username;
  private $password;
  private $email;
  private $carrera;
  private $direccion;
  private $idCurriculum;

  public function isLogged($password, $username){
    $db = ConnectDb::getInstance();
    $existeAlumno = $db->consulta('select * from Alumno where password = '.$password.' and username = '.$username);
    if(!$existeAlumno){
      return false;
    }
    return true;
  }







}



?>
