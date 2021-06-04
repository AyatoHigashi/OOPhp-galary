<?php

// require_once('new_config.php');

class Database
{

    public $conn;

    function __construct()
    {
        $this->open_db_connection();
    }

    public function open_db_connection()
    {

        //$this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conn->connect_errno) {
            die("Connection failed" . $this->conn->connect_error);
        }
    }

    public function query($sql)
    {
        $result = $this->conn->query($sql);
        $this->congirm_query($result);
        return $result;
    }

    private function congirm_query($result)
    {
        if (!$result) {
            die("Could not query" . $this->conn->error);
        }
    }

    public function escape_String($string)
    {
        $escapedString = $this->conn->real_escape_string($string);
        return $escapedString;
    }

    public function the_insert_id() {

        return mysqli_insert_id($this->conn);
    }
}

$database = new Database();
