<?php
namespace App\model;
use PDO;
use PDOException;

class database
{
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $databasename = "php2";
    private static $conn;

    public static function connection_database()
    {
        try {
            $conn = new PDO(
                "mysql:host=" . self::$servername . ";dbname=" . self::$databasename,
                self::$username,
                self::$password
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
        }
        return $conn;
    }
}



?>