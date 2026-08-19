<?php namespace Pauldro\Minicli\v2\Spreadsheet\PhpSpreadsheet\Cells;

// PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Cell\DataType;

enum DplusFieldDataType: string
{
    case String = DataType::TYPE_STRING;
    case Number = DataType::TYPE_NUMERIC;

    /**
     * Return FieldTypeJustify
     */
    public static function find(string $fieldtype): DplusFieldDataType
    {
        $search = strtoupper($fieldtype);
        return match ($search) {
            'C' => self::String,
            'D' => self::Number,
            'I' => self::Number,
            'N' => self::Number,
            default => self::String
        };
    }
}
