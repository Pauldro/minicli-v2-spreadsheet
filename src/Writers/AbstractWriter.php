<?php namespace Pauldro\Minicli\v2\PhpSpreadsheet\Writers;
// PhpSpreadsheet Library
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\BaseWriter;


/**
 * Writer
 * Base Class for Writing Spreadsheets
 *
 * @property string $directory       Directory to Write file to
 * @property string $lastWrittenFile Last Written File
 * @property string $errorMsg 
 */
abstract class AbstractWriter {
	const EXTENSION = 'txt';
	public $lastWrittenFile = '';
	public $errorMsg = '';
	protected $dir;

	public function __construct($dir) {
		if (is_dir($dir) === false) {
			throw new \Exception("Write Directory not found: '$dir'");
		}
		$this->dir = rtrim($dir, '/') . '/';
	}

	/**
	 * Generate Filepath for filename
	 * @param  string $filename
	 * @return string
	 */
	protected function generateFilepath(string $filename) : string
	{
		return $this->dir . $filename . '.' . static::EXTENSION;
	}

	/**
	 * Return Spreadsheet File Writer
	 * @return BaseWriter
	 */
	abstract protected function getWriter(Spreadsheet $spreadsheet) : BaseWriter;

	/**
	 * Writes Spreadsheet to File
	 * @param  Spreadsheet $spreadsheet Spreadsheet
	 * @param  
	 * @return bool
	 */
	public function write(Spreadsheet $spreadsheet, string $filename) : bool
	{	
		$filepath = $this->generateFilepath($filename);
		$writer  = $this->getWriter($spreadsheet);
		$writer->save($filepath);
		$saved = file_exists($filepath);

		if ($saved === false) {
			$this->errorMsg = "Failed to write spreadsheet: '$filepath'";
			return false;
		}
		$this->lastWrittenFile = $filepath;
		return true;
	}
}
