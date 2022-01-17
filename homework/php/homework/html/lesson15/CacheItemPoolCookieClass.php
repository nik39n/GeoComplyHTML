<?php
namespace Psr\Cache;
class CacheItemPoolCookieClass implements CacheItemPoolInterface
{
    public $deferred = [];
    public static function info(){
        phpinfo();
    }
    public static function getClassName(){
        return 'CacheItemPoolCookieClass';
    }
    public function getItem($key)
    {
        if (isset($_COOKIE[$key])){
            return [$key=>$_COOKIE[$key]];
        } else {
            return [];
        }
    }

    public function getItems(array $keys = array())
    {
        $res = [];
        foreach ($keys as $item)
        {
            foreach ($_COOKIE as $keyC => $valueC){
                if ($keyC == $item){
                    $res[$keyC] = $valueC;
                }
            }
        }
        return $res;
    }

    public function hasItem($key)
    {
        if (isset($_COOKIE[$key])){
            return true;
        }
        else{
            return false;
        }
    }

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


    public function deleteItems(array $keys)
    {
        $res = [];
        foreach ($keys as $item)
        {
            foreach ($_COOKIE as $keyC => $valueC){
                if ($keyC == $item){
                    unset($_COOKIE[$keyC]);
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
        $cookieResult = setcookie($key,$value,time()+36000);

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
            setcookie($item,$value,time()+36000);
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
