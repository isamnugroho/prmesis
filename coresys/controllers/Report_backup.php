<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Medoo\Medoo;

class Report_backup extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->load->model('Datatables_model', 'datatables');
		$this->data['that'] = $this;
	}
	
	public function index() {
		$this->data['mem'] = $this->memory_usage();
		$this->data['persen'] = $this->memory_percen($this->data['mem']);
		$this->data['count_backup'] = $this->db->query("SELECT * FROM backup_cnt")->num_rows();
		$this->data['count_local_db'] = $this->count_local_db();
        return view('pages/report_backup/index', $this->data);
	}
	
	public function count_local_db() {
		$db = new Medoo([
			'type' => 'sqlite',
			'database' => 'data/data_report/data.sqlite'
		]);
		
		$count = $db->count("daily_report");
		
		return $count;
	}
	
	public function memory_usage() {
		function formatBytes($bytes, $precision = 2) { 
			$units = array("B", "KB", "MB", "GB", "TB"); 

			$bytes = max($bytes, 0); 
			$pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
			$pow = min($pow, count($units) - 1); 

			$bytes /= (1 << (10 * $pow)); 

			return array("value"=>round($bytes, $precision), "unit"=>$units[$pow]); 
		}

		// print formatBytes(memory_get_peak_usage()) . PHP_EOL;
		
		$file_path = 'data/data_report/data.sqlite';
		$fileSizeInBytes = filesize($file_path); 
		
		return formatBytes($fileSizeInBytes);
	}
	
	public function memory_percen($mem) {
		// $target = 2 * 1024;
		// $target = 2 * 1024;
		$target = 0.05 * 1024; // 100 MB
		if($mem['unit']=="KB") {
			$target = 2 * 1024;
		} else if($mem['unit']=="MB") {
			$target = 2 * 1024;
		} else if($mem['unit']=="GB") {
			$target = 2 * 1024;
		}
		
		if($mem['unit']=="GB") {
			$target2 = $target / 1024;
			$unit = $mem['unit'];
		} else if($mem['unit']=="MB") {
			$target2 = $target;
			$unit = $mem['unit'];
		} else if($mem['unit']=="KB") {
			$target2 = $target * 1024;
			$unit = "MB";
		}
		// $unit = $mem['unit'];
		$memory = $mem['value'];
		$hitung = round(($memory/$target2)*100, 2);
		
		// return $hitung;
		return array("target"=> $target." ".$unit, "persen"=>$hitung);
	}
	
	public function recursiveDirectoryIterator($path) {
		foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $file) {
			if (!$file->isDir()) {
				yield $file->getFilename() . $file->getExtension();
			}
		}
	}
	
	public function update_backup() {
		$count = $this->db->query("SELECT * FROM backup_cnt")->num_rows();
	
		if($count==0) {
			echo "INSERT";
			$this->db->insert('backup_cnt', array(
				"timestamp" => date("Y-m-d H:i:s"),
				"count" => 1
			));
		} else {
			echo "UPDATE";
			$row = $this->db->query("SELECT * FROM backup_cnt")->row();
			$this->db->where('id', $row->id);
			$this->db->update('backup_cnt', array(
				"timestamp" => date("Y-m-d H:i:s"),
				"count" => $row->count + 1
			));
		}
	}
	
	public function delete_backup() {
		$row = $this->db->query("SELECT * FROM backup_cnt")->row();
		$this->db->where('id', $row->id);
		$this->db->delete('backup_cnt');
	}
	
	public function backup() {
		$file_path = 'data/data_report/data.sqlite';
		$ctype = "application/octet-stream";
		
		// $file_name  =   "report_".date("d-m-Y").".sqlite";
		$file_name  =  date("d-m-Y").".sqlite";
		if(!empty($file_path) && file_exists($file_path)) {
			
			$db = new Medoo([
				'type' => 'sqlite',
				'database' => 'data/data_report/data.sqlite'
			]);
			
			$count = $db->count("daily_report");
			
			if($count>0) {
				header("Pragma:public");
				header("Expired:0");
				header("Cache-Control:must-revalidate");
				header("Content-Control:public");
				header("Content-Description: File Transfer");
				header("Content-Type: $ctype");
				header("Content-Disposition:attachment; filename=\"".basename($file_name)."\"");
				header("Content-Transfer-Encoding:binary");
				header("Content-Length:".filesize($file_path));
				flush();
				readfile($file_path);
				
				$this->update_backup();
				
				exit();
				redirect('report_backup');
			}
		} else {
			echo "The File does not exist.";
		}
		
		// $file_name  =   "report_".date("d-m-Y");
		// //save the file by using base name
		// $fn         =   file_put_contents($file_name, $path);
		
		// header("Expires: 0");
		// header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		// header("Cache-Control: no-store, no-cache, must-revalidate");
		// header("Cache-Control: post-check=0, pre-check=0", false);
		// header("Pragma: no-cache");
		// header("Content-type: application/octet-stream");
		// header('Content-length: '.filesize($file_name));
		// header('Content-disposition: attachment; filename="'.basename($file_name).'"');
		// readfile($file_name);
		
		// header('Content-Description: File Transfer');
		// header('Content-Type: application/octet-stream');
		// header('Content-Disposition: attachment; filename='.basename($filename));
		// header('Expires: 0');
		// header('Cache-Control: must-revalidate');
		// header('Pregma: public');
		// header('Content-Length: '. filesize($filename));
		// readfile($filename);
		// exit();
	}
	
	
	public function download_report() {
		$file_path = 'data/data_report/data.sqlite';
		$ctype = "application/octet-stream";
		
		// $file_name  =   "report_".date("d-m-Y").".sqlite";
		$file_name  =  date("d-m-Y").".sqlite";
		if(!empty($file_path) && file_exists($file_path)) {
			
			$db = new Medoo([
				'type' => 'sqlite',
				'database' => 'data/data_report/data.sqlite'
			]);
			
			$count = $db->count("daily_report");
			
			if($count>0) {
				header("Pragma:public");
				header("Expired:0");
				header("Cache-Control:must-revalidate");
				header("Content-Control:public");
				header("Content-Description: File Transfer");
				header("Content-Type: $ctype");
				header("Content-Disposition:attachment; filename=\"".basename($file_name)."\"");
				header("Content-Transfer-Encoding:binary");
				header("Content-Length:".filesize($file_path));
				flush();
				readfile($file_path);
				
				$this->update_backup();
				
				exit();
			}
		} else {
			echo "The File does not exist.";
		}
		
		// $file_name  =   "report_".date("d-m-Y");
		// //save the file by using base name
		// $fn         =   file_put_contents($file_name, $path);
		
		// header("Expires: 0");
		// header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		// header("Cache-Control: no-store, no-cache, must-revalidate");
		// header("Cache-Control: post-check=0, pre-check=0", false);
		// header("Pragma: no-cache");
		// header("Content-type: application/octet-stream");
		// header('Content-length: '.filesize($file_name));
		// header('Content-disposition: attachment; filename="'.basename($file_name).'"');
		// readfile($file_name);
		
		// header('Content-Description: File Transfer');
		// header('Content-Type: application/octet-stream');
		// header('Content-Disposition: attachment; filename='.basename($filename));
		// header('Expires: 0');
		// header('Cache-Control: must-revalidate');
		// header('Pregma: public');
		// header('Content-Length: '. filesize($filename));
		// readfile($filename);
		// exit();
	}
	
	public function delete_data() {
		$db = new Medoo([
			'type' => 'sqlite',
			'database' => 'data/data_report/data.sqlite'
		]);
		
		// $db->query("DELETE FROM SQLITE_SEQUENCE WHERE name='daily_report'");
		$db->query("DELETE FROM daily_report;");
		$db->query("VACUUM;");
		$this->delete_backup();
		
		redirect('report_backup');
	}
}