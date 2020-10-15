<?php
require('../config/Database.php');
require('../Controller/ControllerInterface.php');

use config\Database;
use ControllerInterface\ControllerInterface;

class User extends Database implements ControllerInterface{

    function __construct(){
        $this->db=new Database;
    }

    function selectAll() {
        try {
            $this->db->query('SELECT * from curso.User ');
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
            $this->db->query("SELECT * FROM curso.User WHERE $columnName=:$columnName ");
            $this->db->bind(":$columnName",$valueToSearch);
            $this->db->execute();
            $data=$this->db->fetch();
            $this->db->Logger->setLogRegister('0200','OK Select');
            return $data;
        } catch (Exception $th) {
            return $th;
        }
    }
    function UpdateDataRegister($arrayParams) {
        $query='UPDATE curso.User set name=:name,lastName=:lastName,
                    age=:age,email=:email,password=:password where idUser=:idUser';
        if($arrayParams!=null){
            if(is_array($arrayParams)){
                
                print_r($arrayParams);
                try {
                    $this->db->query($query);
                    $this->db->bind(':email',$arrayParams['email']);
                    $this->db->bind(':name',$arrayParams['name']);
                    $this->db->bind(':lastName',$arrayParams['lastName']);
                    $this->db->bind(':age',$arrayParams['age']);
                    $this->db->bind(':password',$arrayParams['password']);
                    $this->db->bind(':idUser',$arrayParams['idUser']);
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
    function CreateDataRegister($arrayParams){
        if($arrayParams!=null){
            if(is_array($arrayParams)){                
                try {
                    $this->db->query('INSERT into curso.User (idUser,name,lastName,age,email,password)
                                    values(null,:name,:lastName,:age,:email,:password)');
                    $this->db->bind(':email',$arrayParams['email']);
                    $this->db->bind(':name',$arrayParams['name']);
                    $this->db->bind(':lastName',$arrayParams['lastName']);
                    $this->db->bind(':age',$arrayParams['age']);
                    $this->db->bind(':password',$arrayParams['password']);
                    //ejecuto el query
                    $this->db->execute();
                    $this->db->Logger->setLogRegister('0200','OK Create');
                    return 'Ok';
                }catch (Exception $th) {
                    $this->db->Logger->setLogRegister($th->getCode(),$th->getMessage());
                    echo $this->db->Logger->getLastLog();
                    return $th;
                }
            }else{
               throw new Exception("Error Processing Request", 1); 
            }
        }else{
            throw new Exception("Error Processing Request", 1);             
        }
    }

    /**
     * metodo
     */
    function ShowUsersOne($email) {
        try {
            $this->db->query('SELECT * from curso.User where email=:email and softdelete=0');
            $this->db->bind(':email',$email);
            $this->db->execute();
            $data=$this->db->fetchOne();
            $this->db->Logger->setLogRegister('0200','OK Select');
            return $data;
        } catch (Exception $th) {
            $this->db->Logger->setLogRegister($th->getCode(),$th->getMessage());
            echo $this->db->Logger->getLastLog();
            return $th;

        }
    }
    
    function logicalDelete($id) {
        try {
            $this->db->query('UPDATE curso.User set softdelete=:softdelete where id=:id');
            $this->db->bind(':id',$id);
            $this->db->bind(':softdelete',1);
            $this->db->execute();
            $this->db->Logger->setLogRegister('0200','OK Logical');
            return 'Ok Delete Logical';
        }catch (Exception $th) {
            return $th;
        }
    }
    function RealDelete($id) {
        try {
            $this->db->query('DELETE from curso.User where id=:id');
            $this->db->bind(':id',$id);
            $this->db->execute();
            $this->db->Logger->setLogRegister('0200','OK Delete');
            return 'Ok Delete';
        }catch (Exception $th) {
            return $th;
        }
    }
}

?>