<?php
class ConnectDb {
  private static $instance = null;
  private  $conn ;

  private $host;
  private $user;
  private $pass;
  private $dbname;

  private function __construct()
  {
    $db_cfg = require_once 'config/database.php';

    $this->host=$db_cfg["host"];
    $this->user=$db_cfg["user"];
    $this->pass=$db_cfg["pass"];
    $this->dbname=$db_cfg["database"];
    $this->charset=$db_cfg["charset"];

    $this->conn = new PDO("mysql:host={$this->host};
    dbname={$this->dbname}", $this->user,$this->pass,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '".$this->charset."'"));
//    var_dump($this->conn);
  }

  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new ConnectDb();
    }

    return self::$instance;
  }

  public function getConnection()
  {
    return $this->conn;
  }

 public function consulta($sql)
 {
    $query = $this->conn->prepare($sql);
    $query->execute();
    return $query->fetchAll();
 }

}
?>
