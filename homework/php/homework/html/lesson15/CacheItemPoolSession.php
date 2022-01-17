<?php

namespace Psr\Cache;

class CacheItemPoolSession implements CacheItemPoolInterfaceItem
{

    /**
     * @inheritDoc
     */
    public function getItem($key)
    {
        return $_SESSION[$key];
    }

    /**
     * @inheritDoc
     */
    public function getItems(array $keys = array())
    {
        // TODO: Implement getItems() method.
    }

    /**
     * @inheritDoc
     */
    public function hasItem($key)
    {
        // TODO: Implement hasItem() method.
    }

    /**
     * @inheritDoc
     */
    public function clear()
    {
        // TODO: Implement clear() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteItem($key)
    {
        // TODO: Implement deleteItem() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteItems(array $keys)
    {
        // TODO: Implement deleteItems() method.
    }

    /**
     * @inheritDoc
     */
    public function save(CacheItemInterface $item)
    {
        $cacheKey = $item->getKey();
        $_SESSION[$cacheKey] = $item->get();
    }

    /**
     * @inheritDoc
     */
    public function saveDeferred(CacheItemInterface $item)
    {
        // TODO: Implement saveDeferred() method.
    }

    /**
     * @inheritDoc
     */
    public function commit()
    {
        // TODO: Implement commit() method.
    }
}