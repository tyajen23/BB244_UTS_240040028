<?php
class Database {
    protected $conn;

    public function __construct() {
        $this->connect();
    }

    protected function connect() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'db_inventaris';

        $this->conn =new mysqli($host, $user, $pass, $db);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}