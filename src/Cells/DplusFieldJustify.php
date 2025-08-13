<?php namespace Pauldro\Minicli\v2\PhpSpreadsheet\Cells;

enum DplusFieldJustify : string
{
    case Left  = 'left';
    case Right = 'right';

    /**
     * Return FieldJustify 
     * @param  string $fieldtype
     * @return DplusFieldJustify
     */
    public static function find(string $fieldtype) : DplusFieldJustify {
        $search = strtoupper($fieldtype);
        return match($search) {
            'C' => self::Left,
            'D' => self::Left,
            'I' => self::Right,
            'N' => self::Right,
            default => self::Left
        };
    }
}
