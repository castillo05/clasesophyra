<?php
namespace config;
include ('Logger.php');
use config\Logger;
use PDO;
use PDOException;

require_once('config.php');
    
    class Database {
        protected $Logger;
        //parametros de BD
        private $host = DB_HOST;
        private $usuario = DB_USUARIO;
        private $password = DB_PASSWORD;
        private $nombre_bd = DB_NOMBRE;

        private $dbh; //conexion de la BD por PDO
        private $query; //sentencia sql a ejecutar en BD
        
        function __construct(){
            $this->Logger=new Logger;
            $conn='mysql:host='.$this->host.';dbname='.$this->nombre_bd;
            $options=array(
                PDO::ATTR_PERSISTENT=>true,
                PDO::ATTR_PERSISTENT=>PDO::ERRMODE_EXCEPTION
            );
            try {
                $this->dbh= new PDO($conn,$this->usuario,$this->password,$options);
                $this->dbh->exec('set names utf8');
            } catch (PDOException $th) {
                $this->Logger->setLogRegister($th->getCode(),$th->getMessage());
                return $this->Logger->getLastLog();
            }
        }

        // Funcion para recibir la sentencia sql
        function query($query){
            try {
                $this->query=$this->dbh->prepare($query);
            } catch (PDOException $th) {
                $this->Logger->setLogRegister($th->getCode(),$th->getMessage());
                return $this->Logger->getLastLog();
            }
        }

        // Funcion para ejecutar las consultas
        function execute(){
            if($this->query !== null){ 
                return $this->query->execute(); 
            } else { 
                $this->Logger->setLogRegister('0000',"El query es nulo");
				return $this->Logger->getLastLog();
            }
        }

        function fetch(){
            try {
                if($this->query !== null){ 
                    return $this->query->fetchAll(PDO::FETCH_OBJ); 
                } else { 
                    $this->Logger->setLogRegister('1406','Error de sintax');
                    return $this->Logger->getLastLog();
                 }
            } catch (PDOException $th) {
                $this->Logger->setLogRegister($th->getCode(),$th->getMessage());
				return $this->Logger->getLastLog();
            }
        }

        // GetOne
        function fetchOne(){
            try {
                if($this->query !== null){ 
                    return $this->query->fetch(PDO::FETCH_OBJ); 
                } else { 
                    return array(1406,'Error de sintax');
                 }
            } catch (PDOException $th) {
                $this->Logger->setLogRegister($th->getCode(),$th->getMessage());
				return $this->Logger->getLastLog();
            }
        }

        function bind($parametro,$valor,$tipo=null){
            try {
                if(is_null($tipo)){
                    switch (true) {
                    case is_int($valor):
                        $tipo= PDO::PARAM_INT;
                        break;
                    case is_bool($valor):
                        $tipo= PDO::PARAM_BOOL;
                        break;
                    case is_null($valor):
                        $tipo= PDO::PARAM_NULL;
                        break;
                    default:
                        $tipo=PDO::PARAM_STR;
                        break;
                    }
                }
                $this->query->bindValue($parametro,$valor,$tipo);
            } catch (PDOException $th) {
                $this->Logger->setLogRegister($th->getCode(),$th->getMessage());
				return $this->Logger->getLastLog();
            }
        }
    }  
?>