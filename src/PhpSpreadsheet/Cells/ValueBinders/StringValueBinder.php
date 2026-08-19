<?php namespace Pauldro\Minicli\v2\Spreadsheet\PhpSpreadsheet\Cells\ValueBinders;

// PHP Spreadsheet Library
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

/**
 * Handles Binding Cell Data as string
 */
class StringValueBinder extends DefaultValueBinder
{
    /**
     * DataType for value.
     */
    public static function dataTypeForValue(mixed $pValue): string
    {
        return DataType::TYPE_STRING;
    }
}
