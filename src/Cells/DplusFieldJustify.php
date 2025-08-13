<?php namespace Pauldro\Minicli\v2\PhpSpreadsheet\Cells;

enum DplusFieldJustify : string
{
    case C = 'left';
	case D = 'left';
	case I = 'right';
	case N = 'right';
    case DEFAULT = 'left';

    /**
     * Return FieldJustify 
     * @param  string $field
     * @return DplusFieldJustify
     */
    public static function find(string $field) : DplusFieldJustify {
        $search = strtoupper($field);
        return match($search) {
            'C' => self::C,
            'D' => self::D,
            'I' => self::I,
            'N' => self::N,
            default => self::DEFAULT
        };
    }
}
