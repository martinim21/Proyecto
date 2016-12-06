<?php
class ProcesorViews{

    function __construct(){

    }

    public function show($name, $vars = array()){

        $path = 'Vista/templates/' . $name;
        $headerPath = 'Vista/templates/header.html';
        $logoPath = 'Vista/templates/logo.html';

        if (file_exists($path) == false)
        {
            trigger_error ('Template `' . $path . '` does not exist.', E_USER_NOTICE);
            return false;
        }
        $header = file_get_contents($headerPath);
        $logo = file_get_contents($logoPath);
        $vars["header"]=$header;
        $vars["logo"]=$logo;
        $vista = file_get_contents($path);
        $vista = $this->replaceForStatement($vista, $vars);
        $vista = $this->replaceVariables($vista, $vars);
        echo($vista);
    }

    public function replaceVariables($vista, $vars){
      foreach($vars as $clave => $valor){
        if(is_array($valor)){
          continue;
        }
        $vista = str_replace("{{".$clave."}}", $valor, $vista);
      }
      return $vista;
    }

    private function replaceForStatement($vista, $vars){
      if(!preg_match_all("/({\s*%\s*for\s+(\w[\w|\d]*)\s+in\s+(\w[\w|\d]*)\s+%\s*})(\s+.+\s+)({\s*%\s*endfor\s*%\s*})/", $vista, $matches)){
        return $vista;
      }
      $elements=sizeof($matches[0]);
      for($index=0;$index<$elements;$index++){
          $fullString=$matches[0][$index];
          $forHeader=$matches[1][$index];
          $itemName=$matches[2][$index];
          $listName=$matches[3][$index];
          $target=$matches[4][$index];
          $endFor=$matches[5][$index];
          $vista = str_replace($fullString, $this->replaceItemFor($vista, $vars, $listName, $itemName, $target ), $vista);
      }
      return $vista;
    }

    private function replaceItemFor($vista, $vars, $listName, $itemName, $target ){
      $finalTarget="";
      foreach($vars[$listName] as $clave => $valor){
        $finalTarget=$finalTarget . str_replace("{{".$itemName."}}", $valor, $target);
      }
      return $finalTarget;
    }
}

?>
