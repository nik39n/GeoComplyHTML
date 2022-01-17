<?php

namespace Psr\Cache;

class CacheItemPoolSessionClass implements CacheItemPoolInterface
{
    public $deferred = [];
    public static function info(){
        phpinfo();
    }
    public static function getClassName(){
        return 'CacheItemPoolSessionClass';
    }
    public function __construct(){
        session_start();
    }

    public function getItem($key)
    {
        if (isset($_SESSION[$key])){
            return [$key=>$_SESSION[$key]];
        } else {
            return [];
        }
    }

    public function getItems(array $keys = array())
    {
        $res = [];
        foreach ($keys as $item)
        {
            foreach ($_SESSION as $keyC => $valueC){
                if ($keyC == $item){
                    $res[$keyC] = $valueC;
                }
            }
        }
        return $res;
    }

    public function hasItem($key)
    {
        if (isset($_SESSION[$key])){
            return true;
        }
        else{
            return false;
        }
    }

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


    public function deleteItems(array $keys)
    {
        $res = [];
        foreach ($keys as $item)
        {
            foreach ($_SESSION as $keyC => $valueC){
                if ($keyC == $item){
                    unset($_SESSION[$keyC]);
                    $res[] = 1;
                }
            }
        }
        if (count($keys) == count($res)){
            return true;
        } else {
            return false;
        }

    }


    public function save($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function saveDeferred($key,$value)
    {
        $this->deferred[$key] = $value;
        if (isset($deferred[$key])){
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