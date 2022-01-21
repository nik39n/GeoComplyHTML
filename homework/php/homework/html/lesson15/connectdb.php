<?php

namespace Psr\Cache;
use PDO;

class connectdb
{
    private static $instance = null;
    private $db;


    // The db connection is established in the private constructor.
    private function __construct()
    {

        $this->db = new PDO("mysql:host=".$_ENV['DB_HOST'].";port=3306;dbname=my_db_cache;charset=utf8",
            $_ENV['DB_USER'], $_ENV['DB_PASS']);
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->db;
    }
}