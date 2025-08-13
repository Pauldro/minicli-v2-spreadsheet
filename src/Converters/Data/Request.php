<?php namespace Pauldro\Minicli\v2\PhpSpreadsheet\Converters\Data;

use Pauldro\Minicli\v2\Util\Data;

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