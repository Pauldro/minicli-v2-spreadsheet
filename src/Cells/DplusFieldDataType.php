<?php namespace Pauldro\Minicli\v2\PhpSpreadsheet\Cells;
// PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Cell\DataType;

enum DplusFieldDataType : string
{
    case C = DataType::TYPE_STRING;
	case D = DataType::TYPE_NUMERIC;
	case I = DataType::TYPE_NUMERIC;
	case N = DataType::TYPE_NUMERIC;
    case DEFAULT = DataType::TYPE_STRING;

    /**
     * Return FieldTypeJustify 
     * @param  string $fieldtype
     * @return DplusFieldDataType
     */
    public static function find(string $fieldtype) : DplusFieldDataType {
        $search = strtoupper($fieldtype);
        return match($search) {
            'C' => self::C,
            'D' => self::D,
            'I' => self::I,
            'N' => self::N,
            default => self::DEFAULT
        };
    }
}
