<?php namespace Pauldro\Minicli\v2\PhpSpreadsheet\Cells;
// PhpSpreadsheet
use Pauldro\Minicli\v2\Logging\FieldTypeJustify;
use PhpOffice\PhpSpreadsheet\Cell\Cell as SsCell;
// Lib PhpSpreadsheet
use Pauldro\Minicli\v2\PhpSpreadsheet\Styles;


/**
 * Cell
 * 
 * Handles Manipulating Cell
 */
class Cell {
	/**
	 * Set Value for cell after formatting value
	 * @param  SsCell $cell
	 * @param  string $fieldType Dplus Data Type (e.g. N for numeric)
	 * @param  mixed  $value     New Cell Value
	 * @return void
	 */
	public static function setValue(SsCell $cell, string $fieldType, $value = null) : void
	{
		/** @var string $dataType PhpSpreadsheet Data Type */
		$dataType = DplusFieldDataType::find($fieldType)->value;

		// Cleanup string value
		if ($dataType === DataTypes\Strings::TYPE) {
			$value = DataTypes\Strings::clean($value);
			$cell->setValueExplicit($value, $dataType);
			return;
		}

		if (strlen("$value")) {
			$cell->setValueExplicit($value, $dataType);
		}
		
		// Set Format Code for Numbers
		if ($dataType == DataTypes\Number::TYPE) {
			$formatCode = DataTypes\Number::generateFormatCode($value);
			
			// Remove Thousands comma, the formatter will add it back
			if (strpos($value, ',') !== false) { 
				$cell->setValueExplicit(str_replace(',', '', $value), $dataType);
			}

			if ($fieldType == DataTypes\Date::TYPE_DPLUS) {
				if ($value) {
					$formatCode = DataTypes\Date::getSsDateFormat($value);
					$cell->setValue(DataTypes\Date::getDate($value));
				}
			}

			if ($value) {
				$cellNumberFormat = $cell->getStyle()->getNumberFormat();
				$cellNumberFormat->setFormatCode($formatCode);
			}
		}
	}

	/**
	 * Set Cell Alignment (Justify) from Dplus Field Type
	 * @param  SsCell $cell
	 * @param  string $fieldType  Dplus Data Type (e.g. N for numeric)
	 * @return void
	 */
	public static function setAlignmentFromFieldtype(SsCell $cell, $fieldType) : void
	{
		$cellAlignment = $cell->getStyle()->getAlignment();
		$cellAlignment->setHorizontal(Styles::getAlignmentCode(DplusFieldJustify::find($fieldType)->value));
	}
}