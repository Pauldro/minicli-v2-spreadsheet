<?php namespace Pauldro\Minicli\v2\Spreadsheet\PhpSpreadsheet\Writers;

// PhpSpreadsheet Library
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriterXlsx;
// Dplus Spreadsheets
use Pauldro\Minicli\v2\Spreadsheet\PhpSpreadsheet\Writers\AbstractWriter;

/**
 * Writer\Xlsx
 * Handles Writing Xlsx files
 */
class Xlsx extends AbstractWriter
{
    public const EXTENSION = 'xlsx';

    /**
     * Return Spreadsheet File Writer
     */
    protected function getWriter(Spreadsheet $spreadsheet): WriterXlsx
    {
        return new WriterXlsx($spreadsheet);
    }
}
