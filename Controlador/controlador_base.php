<?php
class ControladorBase{

    public function __construct() {
        require_once 'Model/entity.php';
        require_once 'Model/model.php';

        foreach(glob("Model/*.php") as $file){
            require_once $file;
        }
    }


}
?>
