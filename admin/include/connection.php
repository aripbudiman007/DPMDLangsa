<?php
class Connection{
    private $dbHost;
    private $dbUser;
    private $dbPass;
    private $dbName;
    private $mysqli;

    public function __construct()
    {
        $this->ConnectionMySQLi();
    }

    public function ConnectionMySQLi()
    {
        $this->dbHost   = "localhost";
        $this->dbUser   = "root"; 
        $this->dbPass   = ""; 
        $this->dbName   = "dpmd_langsa";
        $this->mysqli   = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
        
        return $this->mysqli;
    }

}
?>