<?php
abstract class mysql_con {
        private $conn;
        private $host;
        private $user;
        private $password;
        private $database;
        private $port;
        private $debug;

        function __construct($con,$database) {
                if($con==1) 
                {
                        #HV-3 First Instance
                        $this->conn = false;
                        $this->host = 'localhost';
                        $this->user = 'root';
                        $this->password = '';
                        $this->database = $database;
                        $this->port = '3306';
                }
                $this->debug = true;
                $this->connect();
        }

        function __destruct() {
                $this->disconnect();
        }

        private function connect() {
                if (!$this->conn) {
                        try {
                                $this->conn = new PDO('mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->database.'', $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));  
                        }
                        catch (Exception $e) {
                                die('Error : ' . $e->getMessage());
                        }

                        if (!$this->conn) {
                                $this->status_fatal = true;
                                die('Connection failed');
                        } else {
                                $this->status_fatal = false;
                        }
                }
                return $this->conn;
        }
 
        private function disconnect() {
                if ($this->conn) {
                        $this->conn = null;
                }
        }

        public function tableExists($table) { 
                $result = $this->conn->query("show tables from ".$this->database ." like '".$table."'");
                //if (!$result) { die(print_r($this->conn->errorInfo())); }
                return $result->rowCount();
        }
        public function selectOne($query) {
                $result = $this->conn->prepare($query);
                $ret = $result->execute();
                //if (!$ret) { die(print_r($this->conn->errorInfo())); }
                $result->setFetchMode(PDO::FETCH_BOTH);
                $reponse = $result->fetch();
                return $reponse;
        }
        public function selectAll($query) {
                $result = $this->conn->prepare($query);
                $ret = $result->execute();
                //if (!$ret) { die(print_r($this->conn->errorInfo())); }
                $result->setFetchMode(PDO::FETCH_BOTH);
                $reponse = $result->fetchAll();
                return $reponse;
        }
        public function selectAssoc($query) {
                $result = $this->conn->prepare($query);
                $ret = $result->execute();
                //if (!$ret) { die(print_r($this->conn->errorInfo())); }
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $reponse = $result->fetchAll();
                return $reponse;
        }
        public function query_exec($query) { 
                $result = $this->conn->prepare($query);
                $ret = $result->execute();
                //if (!$ret) { die(print_r($this->conn->errorInfo())); }
                /*if (!$response = $this->conn->exec($query)) { die(print_r($this->conn->errorInfo())); } */
                return $ret;
        }
        public function query_exec_res($query) { 
                $result = $this->conn->prepare($query);
                $ret = $result->execute();
                if (!$ret) { die(print_r($this->conn->errorInfo())); }
                /*if (!$response = $this->conn->exec($query)) { die(print_r($this->conn->errorInfo())); } */
                return $ret;
        }
        public function insert($query) { 
                $result = $this->conn->prepare($query);
                $ret = $result->execute();
                //if (!$ret) { die(print_r($this->conn->errorInfo())); }
                return $this->conn -> lastInsertId();
        }
        public function num_rows($query) { 
                $result = $this->conn->query($query);
                //if (!$result) { die(print_r($this->conn->errorInfo())); }
                return $result->rowCount();
        }
        public function exec($query) {
                $result = $this->conn->prepare($query);
                $ret = $result->execute();
                //if (!$ret) { die(print_r($this->conn->errorInfo())); }
                /*if (!$response = $this->conn->exec($query)) { die(print_r($this->conn->errorInfo())); } */
                return $result->rowCount();
        }
}

?>
