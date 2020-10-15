<?php
    namespace view\templates;
    
    require_once('..\app\View\viewsInterface.php');
    use views\viewsInterface;
    
    class mainStructure implements viewsInterface {
        private $header,$footer,$leftSideBar,$rigthSideBar,$body,$Post,$Get,$Put,$Delete;
        function header($visible=true){
            $this->header='header.php';
            include $this->header;
        }
        function footer($visible=true){
            $this->footer='footer.php';
            include $this->footer;
        }
        function leftSidebar($visible=true){
            $this->leftSideBar='leftSideBar.php';
            include $this->leftSideBar;
        }
        function rightSidebar($visible=true){
            $this->rigthSideBar='rigthSideBar.php';
            include $this->rigthSideBar;
        }
        function body($visible=true){
            $this->body='body.php';
            include $this->body;
        }
        function managePost() {
            $this->Post='Post.php';
            include $this->Post;
        }
        function manageGet() {
            $this->Get='Get.php';
            include $this->Get;
        }
        function managePut() {
            $this->Put='Put.php';
            include $this->Put;
        }
        function manageDelete() {
            $this->Delete='Delete.php';
            include $this->Delete;
        }
    }
?>