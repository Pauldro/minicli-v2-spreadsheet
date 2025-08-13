<?php namespace Pauldro\Minicli\v2\PhpSpreadsheet\Cells;
// PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Cell\DataType;

enum DplusFieldDataType : string
{
    case String = DataType::TYPE_STRING;
    case Number = DataType::TYPE_NUMERIC;

    /**
     * Return FieldTypeJustify 
     * @param  string $fieldtype
     * @return DplusFieldDataType
     */
    public static function find(string $fieldtype) : DplusFieldDataType {
        $search = strtoupper($fieldtype);
        return match($search) {
            'C' => self::String,
            'D' => self::Number,
            'I' => self::Number,
            'N' => self::Number,
            default => self::String
        };
    }
}
