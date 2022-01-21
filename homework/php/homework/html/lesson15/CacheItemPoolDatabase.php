<?php

namespace Psr\Cache;
use PDO;

class CacheItemPoolDatabase implements CacheItemPoolInterfaceItem
{
    public $db;
    public $deferred = [];
    public function __construct(){
        $this->db = connectdb::getInstance()->getConnection();

    }
    public function getItem($key)
    {
        $stmt = $this->db->prepare('SELECT `obj_value` FROM things WHERE `obj_key` = ?');
        $stmt->execute([$key]);
        $res = $stmt->fetchALl();
        return unserialize($res[0]['obj_value']);
    }

    /**
     * @inheritDoc
     */
    public function getItems(array $keys = array())
    {
        $res = [];
        foreach ($keys as $item)
        {
            $stmt = $this->db->prepare('SELECT * FROM things WHERE `obj_key` = ?');
            if($stmt->execute([$item])){
                $result = $stmt->fetchALl();
                if (empty($result)){
                    return $res = [];
                }
                $res[$result[0]['obj_key']] = unserialize($result[0]['obj_value']);
            }else{
                return $res = [];
            };


        }
        return $res;

    }

    /**
     * @inheritDoc
     */
    public function hasItem($key)
    {
        $stmt = $this->db->prepare('SELECT true FROM things WHERE obj_key = ? LIMIT 1');
        if (($stmt->execute([$key]))){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * @inheritDoc
     */
    public function clear()
    {
        $stmt = $this->db->prepare("DELETE FROM `things`");
        return $stmt->execute();



    }

    /**
     * @inheritDoc
     */
    public function deleteItem($key)
    {
        $stmt = $this->db->prepare("DELETE FROM `things` WHERE `obj_key` = ?");
        return $stmt->execute([$key]);
    }

    /**
     * @inheritDoc
     */
    public function deleteItems(array $keys)
    {
        $res = [];
        foreach ($keys as $item)
        {
            $stmt = $this->db->prepare("DELETE FROM `things` WHERE `obj_key` = ?");
            $stmt->execute([$item]);
            $res[] = 1;
        }
        if (count($keys) == count($res)){
            return true;
        } else {
            return 0;
        }
        return $res;
    }

    /**
     * @inheritDoc
     */
    public function save(CacheItemInterface $item)
    {

        $key = $item->getKey();
        $value = serialize($item->get());
        $stmt = $this->db->prepare('INSERT INTO things (obj_key,obj_value) VALUES (?, ?)');
        if ($stmt->execute([$key,$value])){
            $item->isHit = true;
            return true;
        } else{
            return false;
        }


    }

    /**
     * @inheritDoc
     */
    public function saveDeferred(CacheItemInterface $item)
    {
        $cacheKey = $item->getKey();
        $cacheValue = $item->get();
        $this->deferred[$cacheKey] = serialize($cacheValue);
        if (isset($deferred[$cacheKey])){
            return true;
        } else {
            return false;
        }
    }


    public function commit()
    {
        $res = [];

        foreach ($this->deferred as $item => $value){
            $stmt = $this->db->prepare("INSERT INTO things (obj_key,obj_value) VALUES (?, ?)");
            $stmt->execute([$item,$value]);
            $res[] = 1;
        }
        if (count($this->deferred) == count($res)){
            $this->deferred = [];
            return true;
        } else {
            return false;
        }
    }
}