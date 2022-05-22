<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Google\Cloud\Storage\StorageClient;

class Google_storage extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	public function index() {
		// $storage = new StorageClient();
		$storage = new StorageClient([
			'keyFile' => json_decode(file_get_contents('./data/crucial-summer-313307-1beae6e5346d.json'), true)
		]);

		$bucket = $storage->bucket('dev-bucket-test-001');
		
		// $bucket->upload(
			// fopen('./data/file2.txt', 'r')
		// );
		
		$folder_name = "level1/level2/folder/file2a.txt";
		$options = [
			'name'=> $folder_name
		];
		$upload_result = $bucket->upload(fopen('./data/file2.txt', 'r'), $options);
		
		print_r($upload_result);
	}
	
	public function get() {
		$object_folder = "level1/level2/folder/";
		$object_name = "level1/level2/folder/file2a.txt";
		$storage = new StorageClient([
			'keyFile' => json_decode(file_get_contents('./data/crucial-summer-313307-1beae6e5346d.json'), true)
		]);
		// $storage->registerStreamWrapper();

		// $contents = file_get_contents('gs://dev-bucket-test-001/file.txt');
		
		// print_r($contents);
		
		// $buckets = $storage->buckets('dev-bucket-test-001');
		// print_r($buckets->object());
		
		
		// $buckets = $storage->buckets();

		// foreach ($buckets as $bucket) {
			// echo $bucket->name() . PHP_EOL;
		// }
		
		$bucket = $storage->bucket('dev-bucket-test-001');
		$object = $bucket->object($object_name);
		echo $object->name();
		
		// print_r($bucket->object('file2.txt')->name());
		// foreach ($bucket->objects() as $object) {
			// printf('Object: %s' . PHP_EOL, $object->name());
		// }
		
		
		if ($object->exists()) {
			echo 'Object exists!';
		} else {
			echo 'Object not exists!';
		}
	}
	
	public function prefix() {
		$bucketName = 'dev-bucket-test-001';
		$directoryPrefix = 'level1/level2/folder/';
		
		$storage = new StorageClient([
			'keyFile' => json_decode(file_get_contents('./data/crucial-summer-313307-1beae6e5346d.json'), true)
		]);
		$bucket = $storage->bucket($bucketName);
		$options = ['prefix' => $directoryPrefix];
		foreach ($bucket->objects($options) as $object) {
			// printf('Object: %s' . PHP_EOL, $object->name());
			echo $object->name()."<br>";
		}
	}

}