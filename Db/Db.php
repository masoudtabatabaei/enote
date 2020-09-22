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
        $response = [];
        $result  = $this->connection->query($sql);

        if (!$result) {
            echo "Query failed due to " . mysqli_error($this->connection);
            exit();
        }

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $response[] = $row;
            }
        }

        return $response;
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
        $result = $this->connection->query($sql);

        if (!$result) {
            echo "Query failed due to " . mysqli_error($this->connection);
            exit();
        }

        return $this->connection->insert_id;
    }

    public function modify($sql)
    {
        $result = $this->connection->query($sql);

        if (!$result) {
            echo "Query failed due to " . mysqli_error($this->connection);
            exit();
        }

        return $this->connection->affected_rows;
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