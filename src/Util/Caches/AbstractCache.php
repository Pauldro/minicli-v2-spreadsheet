<?php namespace Pauldro\Minicli\v2\PhpSpreadsheet\Util\Caches;
// Psr
use Psr\SimpleCache\CacheInterface;
// PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Settings as PhpSpreadsheetSettings;


abstract class AbstractCache {
    public static function setup() : void
    {
        $cache = static::cache();
		PhpSpreadsheetSettings::setCache($cache);
    }

    abstract protected static function cache() : CacheInterface;
}


