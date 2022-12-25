<?php

    class Database {
       private $serverName = "maximilian.database.windows.net"; 
       private $connectionOptions = array(
            "Database" => "maximilianDB", 
            "Uid" => "maxiarat1", 
            "PWD" => "mypassword123!." 
        );
       private $conn;

    public function connect() {
        $this->conn = null;
        sqlsrv_configure("WarningsReturnAsErrors", 0);  
        $this->conn = sqlsrv_connect($this->serverName, $this->connectionOptions);
        
        if( $this->conn ) {
            return $this->conn;
          }else{
            echo "Connection could not be established. DBmodel<br />";
            die( print_r( sqlsrv_errors(), true));
          }

        
    }

    }
