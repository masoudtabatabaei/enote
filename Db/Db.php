<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-09
 * Time: 12:20 PM
 */

class Db
{
    private $connection;
    private static $db;

    public static function getInstance($options = null)
    {
        if (self::$db == null) {
            self::$db = new Db($options);
        }

        return self::$db;
    }

    private function __construct($options = null)
    {
        if ($options) {
            $host = $options["db"]["host"];
            $userName = $options["db"]["userName"] ;
            $password = $options["db"]["password"] ;
            $dbName = $options["db"]["dbName"] ;
        } else {
            global $config;
            $host = $config["db"]["host"];
            $userName = $config["db"]["userName"] ;
            $password = $config["db"]["password"] ;
            $dbName = $config["db"]["dbName"] ;
        }

        $this->connection = new mysqli($host , $userName , $password , $dbName);

        if ($this->connection->connect_errno) {
            die("Connection error : " . $this->connection->connect_error);
        }

        $this->connection->query("set NAMES 'utf8'");
    }

    public function query($sql)
    {
        $result = [];
        $query  = $this->connection->query($sql);

        if ($query && $query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result[] = $row;
            }
        }

        return $result;
    }

    public function first($sql)
    {
        $result = $this->query($sql);

        if (!empty($result)) {
            return $result[0];
        }

        return null;
    }

    public function insert($sql)
    {
        $this->connection->query($sql);
        return $this->connection->insert_id;
    }

    public function connection()
    {
        return $this->connection;
    }

    public function close()
    {
        $this->connection->close();
    }
}