<?php namespace Pauldro\Minicli\v2\Spreadsheet\OpenSpout\Util;

enum DplusFieldDataType : string
{
    case Date = 'date';
    case Float = 'float';
    case Integer = 'integer';
    case String ='string';
    

    /**
     * Return FieldTypeJustify 
     * @param  string $fieldtype
     * @return DplusFieldDataType
     */
    public static function find(string $fieldtype) : DplusFieldDataType
    {
        $search = strtoupper($fieldtype);

        return match($search) {
            'C' => self::String,
            'D' => self::Date,
            'I' => self::Integer,
            'N' => self::Float,
            default => self::String
        };
    }
}
