<?php namespace Pauldro\Minicli\v2\Spreadsheet\PhpSpreadsheet\Cells\DataTypes;

// PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Utilities for Numbers
 */
class Number
{
    public const TYPE = DataType::TYPE_NUMERIC;
    public const TYPE_DPLUS = 'N';

    /**
     * Return Format Code from number
     * @param  float|int|string $nbr
     */
    public static function generateFormatCode($nbr): string
    {
        $nbr = "$nbr";
        $formatCode = rtrim(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1, '.00');
        $decimalFormatCode  = self::generateDecimalFormatCode($nbr);
        return $formatCode . $decimalFormatCode;
    }

    /**
     * Return Format Code for Decimal Seperator
     * @param  float|int|string $nbr
     */
    public static function generateDecimalFormatCode($nbr): string
    {
        $nbr = "$nbr";

        if (str_contains($nbr, '.')) {
            $parts = explode('.', $nbr);
            $beforeDecimal = str_pad('', strlen($parts[0]), '0');
            $afterDecimal = str_pad('', strlen($parts[1]), '0');
            return '.' . $afterDecimal;
        }
        return '';
    }
}
