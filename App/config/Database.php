<?php

namespace App\config;

use \PDO;
use \PDOException;

/**
 *
 */
class Database
{
    /**  @var string     */
    private $host = "localhost";

    /** @var string  */
    private $database_name = "starship";

    /** @var string */
    private $username = "root";

    /** @var string  */
    private $password = "";

    /** @var  */
    private $conn;

    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];


    /**
     * @return PDO|null
     */
    public function getConnection(): PDO
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password, self::OPTIONS);
            $this->conn->exec("set names utf8");
        } catch (\PDOException $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }
}




