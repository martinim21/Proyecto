<?php
require_once 'Model/model.php';
class EmpresaModel extends Model{
    private $table;

    public function __construct(){
        $this->table="Empresa";
        parent::__construct($this->table);
    }

    public function findEmpresaByBusinessName($razonSocial){
        $query="SELECT * FROM Empresa WHERE razon_social like '%".$razonSocial."%'";
        $result=$this->ejecutarSql($query);
        return $result;
    }

    public function findEmpresaByUserName($username){
        $query="SELECT * FROM Empresa WHERE user_name like '%".$username."%'";
        $result=$this->ejecutarSql($query);
        return $result;
    }

    public function findEmpresaById($id){
        $query="SELECT * FROM Empresa WHERE id='".$id."'";
        $result=$this->ejecutarSql($query);
        return $result;
    }

    public function findEmpresaByGiro($listaGiros){
      $giroParams="";
      foreach ($listaGiros as $giro) {
        $giroParams=$giroParams.", '". $giro."'";
      }
      $giroParams = substr($giroParams, 1);
      $query = "select * from Empresa  where giro in (".$giroParams.")";
      $result=$this->ejecutarSql($query);
      return $result;
    }

}
?>
