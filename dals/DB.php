<?php 
 class DB{
    protected $pdo = null;
    protected $tableName = null;

    public function setTableName($tableName){
      $this->tableName = $tableName;
    }

    public function __construct()
    {
      try {
        $this->pdo = new PDO("mysql:host=localhost;dbname=fanofan","root","");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      } catch (\Throwable $th) {
      } 
    }
 }
?>