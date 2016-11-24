<?php
require_once 'Model/entity.php';
class Model extends Entity{
    private $table;

    public function __construct($table) {
        $this->table=(string) $table;
        echo "table: ".$table;
        parent::__construct($table);
    }


    public function ejecutarSql($query){
        $query=$this->db()->query($query);
        $query->execute();
        //var_dump($query->fetchAll());
        $resultSet = array();
        if($query){
                while($row = $query->fetchAll(PDO::FETCH_ASSOC)) {
                   array_push($resultSet, $row);
                }
      }
      if($resultSet){
        return $resultSet[0];
      }
      return $resultSet;
    }


}
?>
