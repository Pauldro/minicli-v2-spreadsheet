<?php namespace Pauldro\Minicli\v2\PhpSpreadsheet\Util\Caches;
// Psr
use Psr\SimpleCache\CacheInterface;
// Cache
use Cache\Adapter\Apcu\ApcuCachePool as CachePool;
use Cache\Bridge\SimpleCache\SimpleCacheBridge;


class ApcuCachePool extends AbstractCache {
    protected static function cache() : CacheInterface 
    {
        $pool = new CachePool();
        return new SimpleCacheBridge($pool);
    }
}