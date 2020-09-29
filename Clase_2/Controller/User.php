<?php
require('../conexion/Database.php');

class User extends Database{
    function __construct(){
        $this->db=new Database;

       
      
    }

    function ShowUsers()
    {
        try {
            $this->db->query('SELECT * from user ');
            $this->db->execute();
            $data=$this->db->fetch();
            return $data;
        } catch (Exception $th) {
            return $th;
        }
    }

    function ShowUsersOne($email)
    {
        try {
            $this->db->query('SELECT * from user where email=:email');
            $this->db->bind(':email',$email);
            $this->db->execute();
            $data=$this->db->fetchOne();
            return $data;
        } catch (Exception $th) {
            return $th;
        }
    }

    


}

$user= new User();

?>