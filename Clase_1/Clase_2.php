<?php
require_once('./Clase_1.php');
class clase_suma extends Database{
     function __construct() {
        $this->db=new Database();
        echo $this->db->suma(30,30);
    }
}

$cs=new clase_suma();

?>