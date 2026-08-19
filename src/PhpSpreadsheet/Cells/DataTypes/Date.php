<?php namespace Pauldro\Minicli\v2\Spreadsheet\PhpSpreadsheet\Cells\DataTypes;

// PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Utilities for Dates
 */
class Date
{
    public const TYPE = DataType::TYPE_NUMERIC;
    public const TYPE_DPLUS = 'D';

    public const REGEX_PHPSS_DATEFORMATS = [
        // Y/m/d
        '([0-9]{4})/[0-9]{2}/[0-9]{2}' => NumberFormat::FORMAT_DATE_YYYYMMDDSLASH,
        // m/d/Y
        '[0-9]{2}/[0-9]{2}/([0-9]{4})' => NumberFormat::FORMAT_DATE_YYYYMMDDSLASH,
        // m/d/y
        '[0-9]{2}/[0-9]{2}/([0-9]{2})' => NumberFormat::FORMAT_DATE_YYYYMMDDSLASH,
    ];

    public const REGEX_PHP_DATEFORMATS = [
        // Y/m/d
        '([0-9]{4})/[0-9]{2}/[0-9]{2}' => 'Y/m/d',
        // m/d/Y
        '[0-9]{2}/[0-9]{2}/([0-9]{4})' => 'm/d/Y',
        // m/d/y
        '[0-9]{2}/[0-9]{2}/([0-9]{2})' => 'm/d/Y',
    ];

    /**
     * Return PHP Formatted Date
     * @param  string $date
     */
    public static function getDate($date): string
    {
        return date(self::getPhpDateFormat($date), strtotime($date));
    }

    /**
     * Return PhpSpreadsheet Date format for Date
     * @param  string $date
     */
    public static function getSsDateFormat($date): string
    {
        foreach (self::REGEX_PHPSS_DATEFORMATS as $regexp => $dateFormat) {
            if (preg_match('|' . $regexp . '|', $date)) {
                return $dateFormat;
            }
        }
        return NumberFormat::FORMAT_DATE_DDMMYYYY;
    }

    /**
     * Return PHP Date Format that matches Date
     * @param  string $date
     */
    public static function getPhpDateFormat($date): string
    {
        foreach (self::REGEX_PHP_DATEFORMATS as $regexp => $dateFormat) {
            if (preg_match('|' . $regexp . '|', $date)) {
                return $dateFormat;
            }
        }
        return 'm/d/Y';
    }
}
