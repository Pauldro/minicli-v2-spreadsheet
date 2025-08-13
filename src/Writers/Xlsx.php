<?php namespace Pauldro\Minicli\v2\PhpSpreadsheet\Writers;
// PhpSpreadsheet Library
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriterXlsx;
// Dplus Spreadsheets
use Pauldro\Minicli\v2\PhpSpreadsheet\Writers\AbstractWriter;

/**
 * Writer\Xlsx
 * Handles Writing Xlsx files
 */
class Xlsx extends AbstractWriter {
	const EXTENSION = 'xlsx';

	/**
	 * Return Spreadsheet File Writer
	 * @return WriterXlsx
	 */
	protected function getWriter(Spreadsheet $spreadsheet) : WriterXlsx {
		$writer = new WriterXlsx($spreadsheet);
		return $writer;
	}
}
