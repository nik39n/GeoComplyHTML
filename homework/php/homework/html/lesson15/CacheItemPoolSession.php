<?php

namespace Psr\Cache;

class CacheItemPoolSession implements CacheItemPoolInterfaceItem
{

    public $deferred = [];
    public function __construct(){
        session_start();
    }
    public function getItem($key)
    {
        $value = unserialize($_SESSION[$key]);
        return new CacheItem($key,$value);
    }

    /**
     * @inheritDoc
     */
    public function getItems(array $keys = array())
    {
        $res = [];
        foreach ($keys as $item)
        {
            foreach ($_SESSION as $keyC => $valueC){
                if ($keyC == $item){
                    $res[$keyC] = unserialize($valueC);
                }
            }
        }
        return $res;
    }

    /**
     * @inheritDoc
     */
    public function hasItem($key)
    {
        if (isset($_SESSION[$key])){
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
        foreach ( $_SESSION as $key => $value )
        {
            unset($_SESSION[$key]);
        }
        if (empty($_SESSION)){
            return false;
        }
        else{
            return true;
        }
    }

    /**
     * @inheritDoc
     */
    public function deleteItem($key)
    {
        unset($_SESSION[$key]);
        if (!isset($_SESSION[$key])){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * @inheritDoc
     */
    public function deleteItems(array $keys)
    {
        $res = [];
        foreach ($keys as $item)
        {
            echo $item;
            echo "<br>";
            print_r($_SESSION);
            echo "<br>";
            unset($_SESSION[$item]);
                $res[] = 1;
        }
        if (count($keys) == count($res)){
            return true;
        } else {
            return 0;
        }
    }

    /**
     * @inheritDoc
     */
    public function save(CacheItemInterface $item)
    {
        $cacheKey = $item->getKey();
        $_SESSION[$cacheKey] = serialize($item->get());

        if(isset($_SESSION)){
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
            $_SESSION[$item] = $value;
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