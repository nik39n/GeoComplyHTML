<?php

namespace Psr\Cache;

class CacheItemPoolCookie implements CacheItemPoolInterfaceItem
{

    public $deferred = [];
    public function __construct(){
    }
    public function getItem($key)
    {
        $value = unserialize($_COOKIE[$key]);
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
            foreach ($_COOKIE as $keyC => $valueC){
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
        if (isset($_COOKIE[$key])){
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
        foreach ( $_COOKIE as $key => $value )
        {
            unset($_COOKIE[$key]);
        }
        if (empty($_COOKIE)){
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
        unset($_COOKIE[$key]);
        if (!isset($_COOKIE[$key])){
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
            print_r($_COOKIE);
            echo "<br>";
            unset($_COOKIE[$item]);
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
        setcookie($cacheKey,serialize($item->get()),time()+3600);

        if(isset($_COOKIE)){
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
            $_COOKIE[$item] = $value;
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