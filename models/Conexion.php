
<?php
class Conexion{
    public $host = "localhost";
    public $port = "3306";
    public $dbname = "mydb";
    public $username = "root";
    public $password = "";
    
    public function Conectar(){
        try{
            $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbname";
            $username = $this->username;
            $password = $this->password;
            $option =array(
                PDO::MYSQL_ATTR_LOCAL_INFILE =>1,
                PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES utf8",
                PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION);
            $result = new PDO($dsn, $username,$password,$option);
            return $result;
            }
            
            
         catch (PDOException $ex){
            
                echo 'No se Puede Conectar a la BD'.$ex->getMessage();
            
        }
        
        
    }
    
    
}