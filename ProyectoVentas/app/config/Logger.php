<?php 
    namespace config;
    class Logger{
        
        private $initLog;
        //A PHP array containing the data that we want to log.
        private $dataToLog; 

        function __construct() {
            $this->initLog=date("YmdH");
        }
        /**
         * registrar en el log de registro un evento 
         */
        function setLogRegister($code,$message){
            $this->dataToLog = array(
                date("Y-m-d H:i:s"), //Date and time
                $_SERVER['REMOTE_ADDR'], //IP address
                $code, //Custom code
                $message //Custom text
            );
            $this->saveLogReg();
        }

        function saveLogReg(){
             //Turn array into a delimited string using the implode function
             $data = implode(" - ", $this->dataToLog);
             //Add a newline onto the end.
             $data .= PHP_EOL;
             //The a full path and name of your log file.
             $pathToFile = LOG_FILES_URL.'/ProyectoVentas'.$this->initLog.'.log';
             //Log the data to your file using file_put_contents.
             file_put_contents($pathToFile, $data, FILE_APPEND);
        }

        function getLastLog(){
            return $this->dataToLog[0].": ".$this->dataToLog[1]." - (".$this->dataToLog[2].") ".$this->dataToLog[3];
        }
    }
?>