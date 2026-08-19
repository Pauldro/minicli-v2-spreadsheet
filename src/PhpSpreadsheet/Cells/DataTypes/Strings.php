<?php namespace Pauldro\Minicli\v2\Spreadsheet\PhpSpreadsheet\Cells\DataTypes;

// PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Cell\DataType;

/**
 * Utilities for Strings
 */
class Strings
{
    public const TYPE = DataType::TYPE_STRING;
    public const TYPE_DPLUS = 'C';

    public static function clean($str): string
    {
        return stripslashes($str);
    }
}
