<?php
require('../conexion/Database.php');

class User extends Database{
    function __construct(){
        $this->db=new Database;

      
    }

    function ShowUsers()
    {
        try {
            $this->db->query('SELECT * from students ');
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
            $this->db->query('SELECT * from students where email=:email');
            $this->db->bind(':email',$email);
            $this->db->execute();
            $data=$this->db->fetchOne();
            return $data;
        } catch (Exception $th) {
            return $th;
        }
    }


    // function CreateUser($name,$lastName,$age,$email,$password){
    //     try
    //     {
    //         $this->db->query('INSERT into students (id,name,lastName,age,email,password)
    //         values(null,:name,:lastName,:age,:email,:password)');
    //         $this->db->bind(':email',$email);
    //         $this->db->bind(':name',$name);
    //         $this->db->bind(':lastName',$lastName);
    //         $this->db->bind(':age',$age);
    //         $this->db->bind(':password',$password);

    //         $this->db->execute();

    //         return 'Ok';

    //     }catch (Exception $th) {
    //         return $th;
    //     }
    // }

    /**
     * metodo para crear usuarios en la BD pasandole los valores de las columnas por un array [key,values]
     * $params parametro _post
     */
    function CreateUser($params){
    //  foreach ($params as $key => $value) {
    //      # code...
    //      echo $key;
    //  }
    print_r($params['name']);
        $email='';$name='';$lastName='';$age='';$password='';
        if($params!=null){
            if(is_array($params)){
               
              
                try {
                    
                   
                    $this->db->query('INSERT into students (id,name,lastName,age,email,password)
                    values(null,:name,:lastName,:age,:email,:password)');
                    $this->db->bind(':email',$params['email']);
                    $this->db->bind(':name',$params['name']);
                    $this->db->bind(':lastName',$params['lastName']);
                    $this->db->bind(':age',$params['age']);
                    $this->db->bind(':password',$params['password']);

                    $this->db->execute();

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

    // function UpdateUser($id,$name,$lastName,$age,$email,$password){
    //     try
    //     {
    //         $this->db->query('UPDATE students set name=:name,lastName=:lastName,
    //         age=:age,email=:email,password=:password where id=:id');
    //         $this->db->bind(':email',$email);
    //         $this->db->bind(':name',$name);
    //         $this->db->bind(':lastName',$lastName);
    //         $this->db->bind(':age',$age);
    //         $this->db->bind(':password',$password);
    //         $this->db->bind(':id',$id);

    //         $this->db->execute();

    //         return 'Ok';

    //     }catch (Exception $th) {
    //         return $th;
    //     }
    // }

    function UpdateUser($params){
        $email='';$name='';$lastName='';$age='';$password='';$id='';
        $query='UPDATE students set name=:name,lastName=:lastName,age=:age,email=:email,password=:password where id=:id';
        if($params!=null){
            if(is_array($params)){
                
                try {
                    $this->db->query($query);
                    $this->db->bind(':email',$params['email']);
                    $this->db->bind(':name',$params['name']);
                    $this->db->bind(':lastName',$params['lastName']);
                    $this->db->bind(':age',$params['age']);
                    $this->db->bind(':password',$params['password']);
                    $this->db->bind(':id',$params['id']);
                    //ejecucion de query
                    $this->db->execute();
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
    
/*
    Funcion para eliminar usuario definitivamente de la BD
*/
    function DeleteUser($id){
        try {
            $this->db->query('DELETE from students where id=:id');
            $this->db->bind(':id',$id);
            $this->db->execute();

            return 'Ok Delete';
        }catch (Exception $th) {
            return $th;
        }
    }
/*
    Funcion para eliminar usuario de manera logica
*/
    function DeleteLogicalUser($id){
        try {
            $this->db->query('UPDATE students set isDelete=:isDelete where id=:id');
            $this->db->bind(':id',$id);
            $this->db->bind(':isDelete',1);
            $this->db->execute();

            return 'Ok Delete Logical';
        }catch (Exception $th) {
            return $th;
        }
    }
    
    


}

$user= new User();

?>