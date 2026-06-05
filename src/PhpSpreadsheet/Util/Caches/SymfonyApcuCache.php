<?php namespace Pauldro\Minicli\v2\Spreadsheet\PhpSpreadsheet\Util\Caches;
// Psr
use Psr\SimpleCache\CacheInterface;
// Symfony
use Symfony\Component\Cache\Adapter\ApcuAdapter;
use Symfony\Component\Cache\Psr16Cache;


class SymfonyApcuCache extends AbstractCache {
    protected static function cache() : CacheInterface 
    {
        $apcuAdapter = new ApcuAdapter();
        return new Psr16Cache($apcuAdapter);
    }
}