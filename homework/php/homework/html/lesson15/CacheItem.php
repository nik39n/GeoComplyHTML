<?php

namespace Psr\Cache;

class CacheItem implements CacheItemInterface
{
    public $key;
    public $value;
    public function __construct($key,$value){
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @inheritDoc
     */
    public function get()
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function isHit()
    {
        // TODO: Implement isHit() method.
    }

    /**
     * @inheritDoc
     */
    public function set($value)
    {
        return $value;
    }

    /**
     * @inheritDoc
     */
    public function expiresAt($expiration)
    {
        // TODO: Implement expiresAt() method.
    }

    /**
     * @inheritDoc
     */
    public function expiresAfter($time)
    {
        // TODO: Implement expiresAfter() method.
    }
}