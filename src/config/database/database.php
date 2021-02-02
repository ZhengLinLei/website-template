<?php
namespace Config\database;

class DBconnection {
    protected $connection = [
        "host" => "localhost:3306", // Host and port
        "database" => "database", // Database name
        "user" => "root", // User
        "password" => "root" // Password
    ];
    public function connect(){
        try {
            return new \PDO("mysql:host=".$this->connection["host"].";dbname=".$this->connection["database"].";charset=utf8mb4", $this->connection["user"], $this->connection["password"]);
        } catch (\PDOException $defaultPDOError) {
            print "Error connection $defaultPDOError";
            die();
        }
    }
}