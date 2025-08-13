<?php namespace Pauldro\Minicli\v2\PhpSpreadsheet\Converters;
// PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
// Lib PhpSpreadsheet
use Pauldro\Minicli\v2\PhpSpreadsheet\Styles;
use Pauldro\Minicli\v2\PhpSpreadsheet\Cells\Cell;


/**
 * Converter\Tsv2Xlsx
 * 
 * Handles Converting Cells for Xlsx from TSV
 * 
 * @property Data\Request     $request     Request Data Container
 * @property Spreadsheet $spreadsheet Original Spreadsheet
 */
class Tsv2Xlsx {
	public function __construct(Data\Request $request, Spreadsheet $spreadsheet) {
		$this->request = $request;
		$this->spreadsheet = $spreadsheet;
	}

	/**
	 * Convert Cell Data / Formatting for Xlsx use
	 * @return void
	 */
	public function convert() : void
	{
		$sheet = $this->spreadsheet->getActiveSheet();
		$highestColumnIndex = Coordinate::columnIndexFromString($sheet->getHighestColumn()); // e.g. 5
		Styles::setColumnsAutowidth($sheet, $highestColumnIndex);

		$colData = [];

		foreach ($this->request->fields as $field) {
			$colData[] = $field;
		}

		for ($row = 1; $row < $sheet->getHighestRow() + 1; $row++) {
			for ($col = 1; $col <= $highestColumnIndex; $col++) {
				$cell  = $sheet->getCell([$col, $row]);

				if ($row == 1) {
					$cell->getStyle()->applyFromArray(Styles::STYLES_COLUMN_HEADER);
				}
				/** @var string $fieldType Dplus Data Type */
				$fieldType = $colData[$col - 1]['type'];
				Cell::setAlignmentFromFieldtype($cell, $fieldType);
				
				if ($row > 1) {
					if ($fieldType == 'D' and $cell->getValue() == '00/00/00') {
						Cell::setValue($cell, 'C', '00/00/0000');
						continue;
					}
					Cell::setValue($cell, $fieldType, $cell->getValue());
				}
			}
		}
		// Freeze Column Heading Rows
		$sheet->freezePane('A2'); 
	}
}