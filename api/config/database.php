<?php
    class Database
    {
        private $dbHost;
        private $dbUsername;
        private $dbPassword;
        private $dbName;

        public function __construct($dbHost, $dbUsername, $dbPassword, $dbName)
        {
            $this->dbHost = $dbHost;
            $this->dbUsername = $dbUsername;
            $this->dbPassword = $dbPassword;
            $this->dbName = $dbName;
        }

        public function getConnection()
        {
            return new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
        }
    }
?>