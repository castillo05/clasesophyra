<?php
    namespace ControllerInterface;
    interface ControllerInterface {
        /**
         * Method to select all the columns of the database 
         * table represented by the class Controller 
         * @return mixed[] $array 
         */
        public function SelectAll();
        /**
         * Method to select all the columns of the database 
         * table represented by the class Controller by 1 column name
         * @param string $columnName
         * @param string $valueToSearch
         * @return mixed[] $array 
         */
        public function SelectBy($columnName,$valueToSearch);
        /**
         * Method to Insert a record in the database 
         * table represented by the class Controller 
         * @param mixed[] $arrayParams
         */
        public function CreateDataRegister($arrayParams);
        /**
         * Method to Update all the columns of the database 
         * table represented by the class Controller 
         * @param mixed[] $arrayParams 
         */
        public function UpdateDataRegister($arrayParams);
        /**
         * Method to update the column `isdelete` of the database 
         * table represented by the class Controller by Id
         * @param string $id 
         */
        public function LogicalDelete($id);
        /**
         * Method to Delete a record from the database 
         * table represented by the class Controller by Id
         * @param string $id 
         */
        public function RealDelete($id);
    }
?>