<?php
require_once 'Model/db.php';
class Entity{
    private $table;
    private $db;
    private $conectar;

    public function __construct($table) {
        $this->table=(string) $table;
        $this->conectar=ConnectDb::getInstance();
        $this->db=$this->conectar->getConnection();
    }


    public function db(){
        return $this->db;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY id DESC");

        while ($row = $query->fetchAll(PDO::FETCH_ASSOC)) {
           $resultSet[]=$row;
        }

        return $resultSet;
    }

    public function getById($id){
        $query=$this->db->query("SELECT * FROM $this->table WHERE id=$id");

        if($row = $query->fetchAll(PDO::FETCH_ASSOC)) {
           $resultSet=$row;
        }

        return $resultSet;
    }

    public function getBy($column,$value){
        $query=$this->db->query("SELECT * FROM $this->table WHERE $column='$value'");

        while($row = $query->fetchAll(PDO::FETCH_ASSOC)) {
           $resultSet[]=$row;
        }

        return $resultSet;
    }

    public function deleteById($id){
        $query=$this->db->query("DELETE FROM $this->table WHERE id=$id");
        return $query;
    }

    public function deleteBy($column,$value){
        $query=$this->db->query("DELETE FROM $this->table WHERE $column='$value'");
        return $query;
    }


}
?>
