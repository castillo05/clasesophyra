<?php
    namespace views;
    interface viewsInterface{
        /**
         * construccion de codigo html y javascripts de la cabecera de la pagina
         */
        function header($visible=true);
        /**
         * construccion de codigo html y javascripts del footer de la pagina
         */
        function footer($visible=true);
        /**
         * construccion de codigo html y javascripts de la columna izquierda (menú izquierdo) de la pagina
         */
        function leftSidebar($visible=true);
        /**
         * construccion de codigo html y javascripts de la columna derecho (menú derecho) de la pagina
         */
        function rightSidebar($visible=true);
        /**
         * construccion de codigo html y javascripts del cuerpo (Body) de la pagina
         */
        function body($visible=true);
        /**
         * reglas de manejo de POST
         */
        function managePost();
        /**
         * reglas de manejo de GET
         */
        function manageGet();
        /**
         * reglas de manejo de GET
         */
        function managePut();
        /**
         * reglas de manejo de GET
         */
        function manageDelete();
    } 
?>