<?php
    namespace views;

    use view\templates\mainStructure;

    require_once('..\app\View\Templates\mainStructure.php');
    
    class UserView extends mainStructure {

        function body($visible=true){
            echo 'hola mundo';
        }

        function excecute(){
            $this->header();
            $this->body();
        }
    }
?>