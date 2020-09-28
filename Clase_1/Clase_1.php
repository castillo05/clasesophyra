<?php
  class Database {

     function __construct() {
      
    }


    function suma($a,$b){
        return $a+$b;
    }
  }  


  $db=new Database();

  $suma=$db->suma(10,10);

  // print($suma);
?>