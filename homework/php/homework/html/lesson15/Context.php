<?php

namespace Psr\Cache;

class Context
{
    private $strategy;

    public function __construct($strategy){
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }
    public function doGetItem($key)
    {
        return $this->strategy->getItem($key);
    }
    public function doGetItems(array $keys)
    {
        return $this->strategy->getItems($keys);
    }
    public function doHasItem($key)
    {
        return $this->strategy->hasItem($key);
    }
    public function doClear()
    {
        return $this->strategy->clear();
    }
    public function doDeleteItem($key)
    {
        return $this->strategy->deleteItem($key);
    }
    public function doDeleteItems(array $keys)
    {
        return $this->strategy->deleteItems($keys);
    }
    public function doSave(CacheItemInterface $item)
    {
        return $this->strategy->save($item);
    }
    public function doSaveDeferred(CacheItemInterface $item)
    {
        return $this->strategy->saveDeferred($item);
    }
    public function doCommit()
    {
        return $this->strategy->commit();
    }

}