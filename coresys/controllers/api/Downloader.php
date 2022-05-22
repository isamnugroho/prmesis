<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Medoo\Medoo;
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
// header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
// $method = $_SERVER['REQUEST_METHOD'];
// if ($method == "OPTIONS") {
	// die();
// }

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Google\Cloud\Storage\StorageClient;

class Downloader extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	public function tes_get() {
		// Get real path for our folder
		$rootPath = realpath('./upload/2022/JAYAPURA');

		// Initialize archive object
		$zip = new ZipArchive();
		$zip->open('file.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

		// Create recursive directory iterator
		/** @var SplFileInfo[] $files */
		$files = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator($rootPath),
			RecursiveIteratorIterator::LEAVES_ONLY
		);

		foreach ($files as $name => $file)
		{
			// print_r($file);
			// Skip directories (they would be added automatically)
			if (!$file->isDir())
			{
				echo "A";
				// Get real and relative path for current file
				$filePath = $file->getRealPath();
				$relativePath = substr($filePath, strlen($rootPath) + 1);

				// Add current file to archive
				$zip->addFile($filePath, $relativePath);
			}
		}

		// Zip archive will be created only after closing object
		$zip->close();
	}
	
	public function delete_get() {
		$file = realpath('file.zip');
		
		if (file_exists($file)) {
			unlink($file);
		} else {
			// File not found.
		}
	}
}