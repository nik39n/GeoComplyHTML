<?php

namespace Psr\Cache;
use PDO;

class ExportCsv
{
    public function __construct()
    {
        $this->buffer = fopen('export/export.csv', 'w+');
        try {
            $this->db = new PDO("mysql:host=".$_ENV['DB_HOST'].";port=3306;dbname=my_db_cache;charset=utf8",
                $_ENV['DB_USER'], $_ENV['DB_PASS']);
        } catch(\PDOException $e){
            throw new \PDOException($e->getMessage(),$e->getCode());
        }
    }


    public function write()
    {
        $stmt = $this->db->prepare('SELECT * FROM things');
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($res as $item)
           fputcsv($this->buffer, $item,",");
    }
}
