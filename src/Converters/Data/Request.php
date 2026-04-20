<?php namespace Pauldro\Minicli\v2\PhpSpreadsheet\Converters\Data;
// Pauldro
use Pauldro\UtilityBelt\Data\Data;

/**
 * Container for spreadsheet conversion data
 * 
 * @property array $fields
 */
class Request extends Data {
    public function __construct() {
        $this->fields = [];
    }
}