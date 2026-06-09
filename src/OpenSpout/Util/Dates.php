<?php namespace Pauldro\Minicli\v2\Spreadsheet\OpenSpout\Util;

/**
 * Utilities for Dates
 */
class Dates {
    const TYPE_DPLUS = 'D';

    const REGEX_PHPSS_DATEFORMATS = [
        // Y/m/d
        '([0-9]{4})/[0-9]{2}/[0-9]{2}' => 'mm/dd/yyyy',
        // m/d/Y
        '[0-9]{2}/[0-9]{2}/([0-9]{4})' => 'mm/dd/yyyy',
        // m/d/y
        '[0-9]{2}/[0-9]{2}/([0-9]{2})' => 'mm/dd/yyyy',
    ];

    const REGEX_PHP_DATEFORMATS = [
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
     * @return string
     */
    public static function getDate($date) : string
    {
        return date(self::getPhpDateFormat($date), strtotime($date));
    }
    
    /**
     * Return PhpSpreadsheet Date format for Date
     * @param  string $date
     * @return string
     */
    public static function getSsDateFormat(string $date) : string
    {
        foreach (self::REGEX_PHPSS_DATEFORMATS as $regexp => $dateFormat) {
            if (preg_match ('|' . $regexp . '|', $date)) {
                return $dateFormat;
            }
        }
        return 'mm/dd/yyyy';
    }

    /**
     * Return PHP Date Format that matches Date
     * @param  string $date
     * @return string
     */
    public static function getPhpDateFormat(string $date) : string
    {
        foreach (self::REGEX_PHP_DATEFORMATS as $regexp => $dateFormat) {
            if (preg_match ('|' . $regexp . '|', $date)) {
                return $dateFormat;
            }
        }
        return 'm/d/Y';
    }
}