<?php
require_once 'Controlador/controlador_base.php';
class EmpresaController extends ControladorBase{

    public function __construct() {
        parent::__construct();
    }

    public function getEmpresasByGiro($listaGiros){
      $model=new EmpresaModel();
      $result = $model->findEmpresaByGiro($listaGiros);
      return $result;
    }

    public function getEmpresaByBusinessName($name){
      $model=new EmpresaModel();
      $result = $model->findEmpresaByBusinessName($name);
      return $result;
    }

}
?>
