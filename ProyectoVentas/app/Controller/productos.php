<?php
    use config\Database;
    use ControllerInterface\ControllerInterface;

    require('../config/Database.php');
    require('../Controller/ControllerInterface.php');
    class productos extends Database implements ControllerInterface {
        
        function __construct() {
            $this->db=new Database;
        }
        function selectAll(){
            try {
                $this->db->query('SELECT * from curso.productos ');
                $this->db->execute();
                $data=$this->db->fetch();
                $this->db->Logger->setLogRegister('0200','OK Select');
                return $data;
            } catch (Exception $th) {
                return $th;
            }
        }
        function SelectBy($columnName, $valueToSearch) {
            try {
                $this->db->query("SELECT * FROM curso.productos WHERE $columnName=:$columnName ");
                $this->db->bind(":$columnName",$valueToSearch);
                $this->db->execute();
                $data=$this->db->fetch();
                $this->db->Logger->setLogRegister('0200','OK Select');
                return $data;
            } catch (Exception $th) {
                return $th;
            }
        }
        function CreateDataRegister($arrayParams) {
            if($arrayParams!=null){
                if(is_array($arrayParams)){                
                    try {
                        $this->db->query('INSERT into curso.User (nombre,precio)
                                        values(null,:nombre,:precio)');
                        $this->db->bind(':nombre',$arrayParams['nombre']);
                        $this->db->bind(':precio',$arrayParams['precio']);
                        //ejecuto el query
                        $this->db->execute();
                        $this->db->Logger->setLogRegister('0200','OK Create');
                        return 'Ok';
                    }catch (Exception $th) {
                        $this->db->Logger->setLogRegister($th->getCode(),$th->getMessage());
                        $this->db->Logger->getLastLog();
                        return $th;
                    }
                }else{
                   throw new Exception("Error Processing Request", 1); 
                }
            }else{
                throw new Exception("Error Processing Request", 1);             
            }
        }
        function UpdateDataRegister($arrayParams){
            $query='UPDATE curso.User SET nombre=:nombre,precio=:precio 
                    WHERE idproductos=:idproductos';
            if($arrayParams!=null){
                if(is_array($arrayParams)){
                    try {
                        $this->db->query($query);
                        $this->db->bind(':nombre',$arrayParams['nombre']);
                        $this->db->bind(':precio',$arrayParams['precio']);
                        $this->db->bind(':idproductos',$arrayParams['idproductos']);
                        //ejecucion de query
                        $this->db->execute();
                        $this->db->Logger->setLogRegister('0200','OK Update');
                        return 'Ok';
                    }catch (Exception $th) {
                        return $th;
                    }
                }else{
                    return "Error Processing Request";        
                }
            }else{
                return "Error Processing Request";       
            }
        }
        function LogicalDelete($id){
            try {
                $this->db->query('UPDATE curso.User set softdelete=:softdelete where idproductos=:idproductos');
                $this->db->bind(':idproductos',$id);
                $this->db->bind(':softdelete',1);
                $this->db->execute();
                $this->db->Logger->setLogRegister('0200','OK Logical');
                return 'Ok Delete Logical';
            }catch (Exception $th) {
                return $th;
            }
        }
        function RealDelete($id){
            try {
                $this->db->query('DELETE from curso.User where idproductos=:idproductos');
                $this->db->bind(':idproductos',$id);
                $this->db->execute();
                $this->db->Logger->setLogRegister('0200','OK Delete');
                return 'Ok Delete';
            }catch (Exception $th) {
                return $th;
            }
        }

    }
?>