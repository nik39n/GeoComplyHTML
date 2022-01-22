<?php

namespace Psr\Cache;
use PDO;

class connectdb
{
    private static $instances = [];
    private $db;


    private function __construct()
    {

        $this->db = new PDO("mysql:host=".$_ENV['DB_HOST'].";port=3306;dbname=my_db_cache;charset=utf8",
            $_ENV['DB_USER'], $_ENV['DB_PASS']);
    }

    public static function getInstance()
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function getConnection()
    {
        return $this->db;
    }
}