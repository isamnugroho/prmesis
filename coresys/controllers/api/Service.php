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

class Service extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	public function tes_post() {
		$database = new Medoo([
			'type' => 'sqlite',
			// 'database' => 'data/data_report/data.sqlite'
			'database' => '../prmesis_filemanager/data/data_report/data.sqlite'
		]);
		
		print_r($_REQUEST);
		print_r($_FILES);
		var_dump(file_get_contents('php://input'));
		
		// $imgdata = $_FILES['file'];
		
		// $data = array(
           // 'data_blob' => $imgdata,
		// );
		
		// $this->db->insert('tes', $data);
		
		if(!isset($_FILES['file']['tmp_name'])){
			echo '<span style="color:red"><b><u><i>Pilih file gambar</i></u></b></span>';
		} else {
			// $file_name = $_FILES['file']['name'];
			$file_name = $_REQUEST['name'];
			$file_size = $_FILES['file']['size'];
			$file_type = $_FILES['file']['type'];
			// if ($file_size < 2048000 and ($file_type =='image/jpeg' or $file_type == 'image/png'))
			if (($file_type =='image/jpeg' or $file_type == 'image/png' or $file_type == 'application/pdf'))
			{
				$image = file_get_contents($_FILES['file']['tmp_name']);
				// $data = array(
				   // 'data_blob' => $image,
				   // 'file_type' => $file_type,
				// );
				
				$count = $database->count("daily_report", [
					"id_detail" => $_REQUEST['id_report']
				]);
				
				if($count==0) {
					if($_REQUEST['job_type']=="PAGI") {
						$data = array("daily_report_pagi" => $file_name);
						$data2 = array(
						   'date' => $_REQUEST['date'],
						   'timestamp' => date("Y-m-d H:i:s"),
						   'id_detail' => $_REQUEST['id_report'],
						   'tid' => $_REQUEST['tid'],
						   'kanwil' => $_REQUEST['kanwil'],
						   'lokasi' => $_REQUEST['lokasi'],
						   'alamat' => $_REQUEST['alamat'],
						   'file_report_pagi' => $image,
						   'daily_report_pagi' => $file_name,
						);
					} else {
						$data = array("daily_report_sore" => $file_name);
						$data2 = array(
						   'date' => $_REQUEST['date'],
						   'timestamp' => date("Y-m-d H:i:s"),
						   'id_detail' => $_REQUEST['id_report'],
						   'tid' => $_REQUEST['tid'],
						   'kanwil' => $_REQUEST['kanwil'],
						   'lokasi' => $_REQUEST['lokasi'],
						   'alamat' => $_REQUEST['alamat'],
						   'file_report_sore' => $image,
						   'daily_report_sore' => $file_name,
						);
					}
					
					$this->db->where('id', $_REQUEST['id_report']);
					$this->db->update('trans_clean_detail', $data);
					$database->insert('daily_report', $data2);
				} else {
					if($_REQUEST['job_type']=="PAGI") {
						$data = array("daily_report_pagi" => $file_name);
						$data2 = array(
						   'timestamp' => date("Y-m-d H:i:s"),
						   'file_report_pagi' => $image,
						   'daily_report_pagi' => $file_name,
						);
					} else {
						$data = array("daily_report_sore" => $file_name);
						$data2 = array(
						   'timestamp' => date("Y-m-d H:i:s"),
						   'file_report_sore' => $image,
						   'daily_report_sore' => $file_name,
						);
					}
					
					$this->db->where('id', $_REQUEST['id_report']);
					$this->db->update('trans_clean_detail', $data);
					$database->update("daily_report", $data2, [
						"id_detail" => $_REQUEST['id_report']
					]);
				}
			} else {
				echo '<span style="color:red"><b><u><i>Ukuruan File / Tipe File Tidak Sesuai</i></u></b></span>';
			}
		}
	}
	
	public function tes2_get() {
		$data = $this->db->query("SELECT * FROM tes")->result();
		// header("Content-type: ".$data->file_type);
		// echo $data->data_blob;
		// echo '<img src="data:'.$data->file_type.';base64,'.base64_encode($data->data_blob).'"/>';
		
		// echo $data->data_blob;
	
		foreach($data as $r) {
			$file_type = $r->file_type;
			if (($file_type =='image/jpeg' or $file_type == 'image/png')) {
				echo '<img src="data:'.$r->file_type.';base64,'.base64_encode($r->data_blob).'"/>';
			} else {
				echo '<object data="data:'.$r->file_type.';base64,'.base64_encode($r->data_blob).'" type="'.$r->file_type.'" style="height:800px;width:100%"></object>';
			}
		}
	}
	
	public function tes_get() {
		print_r($_REQUEST);
	}
	
	public function upload_get() {
		print_r($_REQUEST);
		print_r($_FILES);
	}
	
	public function set_public_get() {
		$storage = new StorageClient([
			'keyFile' => json_decode(file_get_contents('./data/crucial-summer-313307-1beae6e5346d.json'), true)
		]);
		$bucket = $storage->bucket('dev-bucket-test-001');
		$object = $bucket->object('2022/JANUARI/JAYAPURA/2022-01-17_PAGI_190099.pdf');
		
		
		$object->update(['acl' => []], ['predefinedAcl' => 'PUBLICREAD']);
		printf('gs://%s/%s is now public' . PHP_EOL, $bucketName, $objectName);
	}
	
	public function upload_post() {
		print_r($_REQUEST);
		print_r($_FILES);
		$id_report = $_REQUEST['id_report'];
		$job_type = $_REQUEST['job_type'];
		
		$bulan = array (1 =>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		
		$thn = "dev/".date("Y");
		$bln = $bulan[(int)date("m")];
		$object_name = $thn."/".strtoupper($bln)."/".$_REQUEST['kanwil']."/".$_REQUEST['name'];
		// echo $object_name;
		
		$storage = new StorageClient([
			'keyFile' => json_decode(file_get_contents('./data/crucial-summer-313307-1beae6e5346d.json'), true)
		]);
		$bucket = $storage->bucket('dev-bucket-test-001');
		$object = $bucket->object($object_name);
		if ($object->exists()) {
			echo 'Object exists!';
			
			$options = [
				'name'=> $object_name
			];
			$upload_result = $bucket->upload(fopen($_FILES['file']['tmp_name'], 'r'), $options);
			
			
			if($job_type=="PAGI") {
				$data = array("daily_report_pagi" => $object_name);
			} else {
				$data = array("daily_report_sore" => $object_name);
			}
			
			$this->db->where('id', $id_report);
			$this->db->update('trans_clean_detail', $data);
			
		} else {
			echo 'Object not exists!';
			
			$options = [
				'name'=> $object_name
			];
			$upload_result = $bucket->upload(fopen($_FILES['file']['tmp_name'], 'r'), $options);
			
			if($job_type=="PAGI") {
				$data = array("daily_report_pagi" => $object_name);
			} else {
				$data = array("daily_report_sore" => $object_name);
			}
			
			$this->db->where('id', $id_report);
			$this->db->update('trans_clean_detail', $data);
		}
		
		
		
		
		
		
		// $thn = date("Y");
		// $bln = $bulan[(int)date("m")];
		
		// $dir_tahun = "upload/doc/".$thn;
		// $dir_bulan = $dir_tahun."/".$bln;
		// if( is_dir($dir_tahun) === false ) {
			// mkdir($dir_tahun);
		// }
		// if( is_dir($dir_bulan) === false ) {
			// mkdir($dir_bulan);
		// }
		
		// $new_image_name = $_FILES["file"]["name"];
		// if($new_image_name=="blob") {
			// $new_image_name = $_REQUEST["name"];
			// $foto = $this->_uploadBlob($new_image_name, $dir_bulan);
		// } else {
			// $foto = $this->_uploadImage($new_image_name, $dir_bulan);
		// }
	}
	
	public function upload_pending_post() {
		$database = new Medoo([
			'type' => 'sqlite',
			// 'database' => 'data/data_report/data.sqlite'
			'database' => '../prmesis_filemanager/data/data_report/data.sqlite'
		]);
		
		print_r($_REQUEST);
		print_r($_FILES);
		var_dump(file_get_contents('php://input'));
		
		// $imgdata = $_FILES['file'];
		
		// $data = array(
           // 'data_blob' => $imgdata,
		// );
		
		// $this->db->insert('tes', $data);
		
		if(!isset($_FILES['file']['tmp_name'])){
			echo '<span style="color:red"><b><u><i>Pilih file gambar</i></u></b></span>';
		} else {
			// $file_name = $_FILES['file']['name'];
			$file_name = $_REQUEST['name'];
			$file_size = $_FILES['file']['size'];
			$file_type = $_FILES['file']['type'];
			// if ($file_size < 2048000 and ($file_type =='image/jpeg' or $file_type == 'image/png'))
			if (($file_type =='image/jpeg' or $file_type == 'image/png' or $file_type == 'application/pdf'))
			{
				$image = file_get_contents($_FILES['file']['tmp_name']);
				// $data = array(
				   // 'data_blob' => $image,
				   // 'file_type' => $file_type,
				// );
				
				$count = $database->count("daily_report", [
					"id_detail" => $_REQUEST['id_report']
				]);
				
				if($count==0) {
					if($_REQUEST['job_type']=="PAGI") {
						$data = array("daily_report_pagi" => $file_name);
						$data2 = array(
						   'date' => $_REQUEST['date'],
						   'timestamp' => date("Y-m-d H:i:s"),
						   'id_detail' => $_REQUEST['id_report'],
						   'tid' => $_REQUEST['tid'],
						   'kanwil' => $_REQUEST['kanwil'],
						   'lokasi' => $_REQUEST['lokasi'],
						   'alamat' => $_REQUEST['alamat'],
						   'file_report_pagi' => $image,
						   'daily_report_pagi' => $file_name,
						);
					} else {
						$data = array("daily_report_sore" => $file_name);
						$data2 = array(
						   'date' => $_REQUEST['date'],
						   'timestamp' => date("Y-m-d H:i:s"),
						   'id_detail' => $_REQUEST['id_report'],
						   'tid' => $_REQUEST['tid'],
						   'kanwil' => $_REQUEST['kanwil'],
						   'lokasi' => $_REQUEST['lokasi'],
						   'alamat' => $_REQUEST['alamat'],
						   'file_report_sore' => $image,
						   'daily_report_sore' => $file_name,
						);
					}
					
					$this->db->where('id', $_REQUEST['id_report']);
					$this->db->update('trans_clean_detail', $data);
					$database->insert('daily_report', $data2);
				} else {
					if($_REQUEST['job_type']=="PAGI") {
						$data = array("daily_report_pagi" => $file_name);
						$data2 = array(
						   'timestamp' => date("Y-m-d H:i:s"),
						   'file_report_pagi' => $image,
						   'daily_report_pagi' => $file_name,
						);
					} else {
						$data = array("daily_report_sore" => $file_name);
						$data2 = array(
						   'timestamp' => date("Y-m-d H:i:s"),
						   'file_report_sore' => $image,
						   'daily_report_sore' => $file_name,
						);
					}
					
					$this->db->where('id', $_REQUEST['id_report']);
					$this->db->update('trans_clean_detail', $data);
					$database->update("daily_report", $data2, [
						"id_detail" => $_REQUEST['id_report']
					]);
				}
			} else {
				echo '<span style="color:red"><b><u><i>Ukuruan File / Tipe File Tidak Sesuai</i></u></b></span>';
			}
		}
	}
	
	public function upload_pending2_post() {
		print_r($_REQUEST);
		print_r($_FILES);
		$id_report = $_REQUEST['id_report'];
		$job_type = $_REQUEST['job_type'];
		
		$bulan = array (1 =>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		
		$thn = "dev/pending/".date("Y");
		$bln = $bulan[(int)date("m")];
		$object_name = $thn."/".strtoupper($bln)."/".$_REQUEST['kanwil']."/".$_REQUEST['name'];
		// echo $object_name;
		
		$storage = new StorageClient([
			'keyFile' => json_decode(file_get_contents('./data/crucial-summer-313307-1beae6e5346d.json'), true)
		]);
		$bucket = $storage->bucket('dev-bucket-test-001');
		$object = $bucket->object($object_name);
		if ($object->exists()) {
			echo 'Object exists!';
			
			$options = [
				'name'=> $object_name
			];
			$upload_result = $bucket->upload(fopen($_FILES['file']['tmp_name'], 'r'), $options);
			
			
			if($job_type=="PAGI") {
				$data = array("daily_report_pagi" => $object_name);
			} else {
				$data = array("daily_report_sore" => $object_name);
			}
			
			$this->db->where('id', $id_report);
			$this->db->update('trans_clean_detail', $data);
			
		} else {
			echo 'Object not exists!';
			
			$options = [
				'name'=> $object_name
			];
			$upload_result = $bucket->upload(fopen($_FILES['file']['tmp_name'], 'r'), $options);
			
			if($job_type=="PAGI") {
				$data = array("daily_report_pagi" => $object_name);
			} else {
				$data = array("daily_report_sore" => $object_name);
			}
			
			$this->db->where('id', $id_report);
			$this->db->update('trans_clean_detail', $data);
		}
	}
	
	public function upload_closed_post() {
		$database = new Medoo([
			'type' => 'sqlite',
			// 'database' => 'data/data_report/data.sqlite'
			'database' => '../prmesis_filemanager/data/data_report/data.sqlite'
		]);
		
		print_r($_REQUEST);
		print_r($_FILES);
		var_dump(file_get_contents('php://input'));
		
		// $imgdata = $_FILES['file'];
		
		// $data = array(
           // 'data_blob' => $imgdata,
		// );
		
		// $this->db->insert('tes', $data);
		
		if(!isset($_FILES['file']['tmp_name'])){
			echo '<span style="color:red"><b><u><i>Pilih file gambar</i></u></b></span>';
		} else {
			// $file_name = $_FILES['file']['name'];
			$file_name = $_REQUEST['name'];
			$file_size = $_FILES['file']['size'];
			$file_type = $_FILES['file']['type'];
			// if ($file_size < 2048000 and ($file_type =='image/jpeg' or $file_type == 'image/png'))
			if (($file_type =='image/jpeg' or $file_type == 'image/png' or $file_type == 'application/pdf'))
			{
				$image = file_get_contents($_FILES['file']['tmp_name']);
				// $data = array(
				   // 'data_blob' => $image,
				   // 'file_type' => $file_type,
				// );
				
				$count = $database->count("daily_report", [
					"id_detail" => $_REQUEST['id_report']
				]);
				
				if($count==0) {
					if($_REQUEST['job_type']=="PAGI") {
						$data = array("daily_report_pagi" => $file_name);
						$data2 = array(
						   'date' => $_REQUEST['date'],
						   'timestamp' => date("Y-m-d H:i:s"),
						   'id_detail' => $_REQUEST['id_report'],
						   'tid' => $_REQUEST['tid'],
						   'kanwil' => $_REQUEST['kanwil'],
						   'lokasi' => $_REQUEST['lokasi'],
						   'alamat' => $_REQUEST['alamat'],
						   'file_report_pagi' => $image,
						   'daily_report_pagi' => $file_name,
						);
					} else {
						$data = array("daily_report_sore" => $file_name);
						$data2 = array(
						   'date' => $_REQUEST['date'],
						   'timestamp' => date("Y-m-d H:i:s"),
						   'id_detail' => $_REQUEST['id_report'],
						   'tid' => $_REQUEST['tid'],
						   'kanwil' => $_REQUEST['kanwil'],
						   'lokasi' => $_REQUEST['lokasi'],
						   'alamat' => $_REQUEST['alamat'],
						   'file_report_sore' => $image,
						   'daily_report_sore' => $file_name,
						);
					}
					
					$this->db->where('id', $_REQUEST['id_report']);
					$this->db->update('trans_clean_detail', $data);
					$database->insert('daily_report', $data2);
				} else {
					if($_REQUEST['job_type']=="PAGI") {
						$data = array("daily_report_pagi" => $file_name);
						$data2 = array(
						   'timestamp' => date("Y-m-d H:i:s"),
						   'file_report_pagi' => $image,
						   'daily_report_pagi' => $file_name,
						);
					} else {
						$data = array("daily_report_sore" => $file_name);
						$data2 = array(
						   'timestamp' => date("Y-m-d H:i:s"),
						   'file_report_sore' => $image,
						   'daily_report_sore' => $file_name,
						);
					}
					
					$this->db->where('id', $_REQUEST['id_report']);
					$this->db->update('trans_clean_detail', $data);
					$database->update("daily_report", $data2, [
						"id_detail" => $_REQUEST['id_report']
					]);
				}
			} else {
				echo '<span style="color:red"><b><u><i>Ukuruan File / Tipe File Tidak Sesuai</i></u></b></span>';
			}
		}
	}
	
	private function _uploadBlob($name, $path) {
		$file_name 	= $_FILES['file']['name'];
		$file_size 	= $_FILES['file']['size'];
		$file_tmp 	= $_FILES['file']['tmp_name'];
		$file_type	= $_FILES['file']['type'];
		// if ($file_size < 2048000 and ($file_type =='image/jpeg' or $file_type == 'image/png'))
		if (($file_type =='image/jpeg' or $file_type == 'image/png' or $file_type == 'application/pdf'))
		{
			$image = file_get_contents($_FILES['file']['tmp_name']);
			$url_file = $path.'/'.$name;
			move_uploaded_file($file_tmp, $url_file);
		} else {
			
		}
	}
	
	private function _uploadImage($name, $path) {
		$errors= array();
		$url_file = "default.pdf";
		if(isset($_FILES['file'])) {
			if($_FILES['file']['name']!=="") {
				$file_name 	= $_FILES['file']['name'];
				$file_size 	= $_FILES['file']['size'];
				$file_tmp 	= $_FILES['file']['tmp_name'];
				$file_type	= $_FILES['file']['type'];
				$file	= explode('.', strtolower($file_name));
				$file_ext	= end($file);
				
				$extensions= array("pdf");
				
				if(in_array($file_ext,$extensions)=== false){
					$errors[]="extension not allowed.<br>";
				}
				
				if(empty($errors)==true){
					// $file_name = "upload/foto_client/logo_".$client.".".$file_ext;
					// $url_file = base_url().$file_name;
					$url_file = $path.'/'.$name;
					move_uploaded_file("tes.xlsx", $url_file);
					
					// print_r($url_file);
				} else {
					echo $errors[0];
				}
			}
			
			// $url_file = json_encode($url_file);
		}
		
		return $url_file;
	}
}