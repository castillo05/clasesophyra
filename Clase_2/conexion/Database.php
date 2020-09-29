<?php
    class Database 
    {
        private $dbh;
        private $query;
        function __construct(){
            $conn="mysql:host=localhost;dbname=covid";

            $options=array(
                PDO::ATTR_PERSISTENT=>true,
                PDO::ATTR_PERSISTENT=>PDO::ERRMODE_EXCEPTION
            );

            try {
                $this->dbh= new PDO($conn,'root','',$options);
                $this->dbh->exec('set names utf8');

               
   
            } catch (PDOException $th) {
                return $th;
            }




        }
// Funcion para recibir la sentencia sql
        function query($query){
            try {
                $this->query=$this->dbh->prepare($query);
            } catch (PDOException $th) {
                return $th;
            }
        }

        // Funcion para ejecutar las consultas
        function execute(){
            if($this->query !== null){ 
                return $this->query->execute(); 
            } else { 
                return false;
             }
        }

        function fetch(){
            try {
                
                if($this->query !== null){ 
                    return $this->query->fetchAll(PDO::FETCH_OBJ); 
                } else { 
                    return array(
                        1406,'Error de sintax'
                    );
                 }
            } catch (Exception $th) {
                return $th;
            }
        }

        // GetOne
        function fetchOne(){
            try {
                if($this->query !== null){ 
                    return $this->query->fetch(PDO::FETCH_OBJ); 
                } else { 
                    return array(
                        1406,'Error de sintax'
                    );
                 }
            } catch (Exception $th) {
                return $th;
            }
        }

        function bind($parametro,$valor,$tipo=null){
            
            try {
                if(is_null($tipo)){
                     switch ($valor) {
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


               
            } catch (Exception $th) {
                return $th;
            }
        }

       



    }

    

    
?>