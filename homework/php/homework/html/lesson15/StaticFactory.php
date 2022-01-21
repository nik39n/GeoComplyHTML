<?php


namespace Psr\Cache;


final class StaticFactory
{
    public static function factory($type)
    {
        if ($type == 'KeyValueSession') {
            return new CacheItemPoolSessionClass();
        } elseif ($type == 'KeyValueCookie') {
            return new CacheItemPoolCookieClass();
        } elseif($type == 'ItemSession'){
            return new CacheItemPoolSession();
        } elseif($type == 'ItemCookie'){
            return new CacheItemPoolCookie();
        } elseif($type == 'ItemDB'){
            return new CacheItemPoolDatabase();
        }

    }
}