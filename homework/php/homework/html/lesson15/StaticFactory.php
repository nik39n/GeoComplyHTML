<?php


namespace Psr\Cache;


final class StaticFactory
{
    public static function factory($type)
    {
        if ($type == 'KeyValueSession') {
            return new Context(new CacheItemPoolSessionClass());
        } elseif ($type == 'KeyValueCookie') {
            return new Context(new CacheItemPoolCookieClass());
        } elseif($type == 'ItemSession'){
            return new Context(new CacheItemPoolSession());
        } elseif($type == 'ItemCookie'){
            return new Context(new CacheItemPoolCookie());
        } elseif($type == 'ItemDB'){
            return new Context(new CacheItemPoolDatabase());
        }

    }
}