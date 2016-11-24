<?php

  require 'Model/db.php';
  require 'Model/model_student.php';

  class SessionControlller{

    public function isLogged(){
      if(isset($_SESSION['user']))
        return true;
      return false;
    }

    public function isStudent(){

    }

    public function isCompany(){

    }

    public function logout(){
      session_unset();
      session_destroy();
      setcookie(session_name(), '', time() - 36000);
    }

    public function login($user_name, $pass){
      $alumno = new Alumno();
      if($_SESSION['username'] == $user_name){
        echo '<br>el usuario ya esta logeado<br>';
        return;
      }
      if ($alumno->isLogged($user_name, $pass)){
        echo '<br>el usuario no esta logeado<br>';
      }

      $_SESSION['username'] = $user_name;
      echo '<br>Login<br>';


      echo '->'.$_SESSION['username'].'<br>';
    }

  }
?>
