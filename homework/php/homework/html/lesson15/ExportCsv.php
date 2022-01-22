<?php

namespace Psr\Cache;
use PDO;

class ExportCsv
{
    public function __construct()
    {
        $this->buffer = fopen('export/export.csv', 'w+');
        $this->db = connectdb::getInstance()->getConnection();
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
