<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
use Mpdf\Mpdf;

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class Qr extends CI_Controller {
    
    public function index() {       
		$qrCode = new QrCode();
		
		header('Content-Type: '.$qrCode->getContentType());
		echo $qrCode->writeString();
    }
	
	public function tes() {
		$query = "SELECT * FROM master_client";
		
		$result = $this->db->query($query)->result();
		
		echo "<form method='post' action='".base_url()."qr/print_unixqr'>";
		echo "<select name='id_bank'>";
		foreach($result as $r) {
			echo "<option value='$r->id'>$r->nama</option>";
		}
		echo "</select>";
		echo "<input type='submit' value='SUBMIT'></input>";
		echo "</form>";
	}
	
	public function print_qr() {
		if($_REQUEST['id_bank']!=="") {
			$template_content = '';
			
			$query = "SELECT * FROM master_atm LEFT JOIN master_client ON (master_client.id=master_atm.id_bank) WHERE id_bank='".$_REQUEST['id_bank']."'";
			$result = $this->db->query($query)->result();
			
			foreach($result as $r) {
				$spintf = $r->idatm;
				$qrCode = new QrCode($spintf);
				$qrCode->setSize(300);
				$qrCode->writeFile(realpath(__DIR__ . '/../../upload/tes').'/'.$spintf.'.png');
			}
			
			foreach($result as $r) {
				$spintf = $r->idatm;
				
				$template_content .= '
					<table>
						<tr>
							<td>
								<img style="margin-left: 10px; margin-top: 25px" src="'.realpath(__DIR__ . '/../../upload/tes').'/'.$spintf.'.png" width="90" height="90"></img>
							</td>
							<td>
								<span style="font-family: Arial; font-weight: 900">
									<br>
									<span>'.$r->nama.'</span><br>
									<span>QRCODE ATM : </span><br>
									<span>'.$r->idatm.'</span><br>
								</span>
							</td>
						</tr>
					</table>
				';
				
				// $template_content .= '
					// <table>
						// <tr>
							// <td>
								// <img style="margin-left: 10px; margin-top: 25px" src="'.base_url().'upload/tes/'.$spintf.'.png" width="90" height="90"></img>
							// </td>
							// <td>
								// <span>
									// <span>'.$r->nama.'</span><br>
									// <span>ID ATM : </span><br>
									// <span>'.$r->idatm.'</span><br>
								// </span>
							// </td>
						// </tr>
					// </table>
				// ';
			}
			
			$template_html = '
				<html>
					<head>
						<style>
							
							@page { margin: 0px; size: 6cm 4cm portrait; }
						
						
							body {
								margin: 1px 1px 1px 1px; 
								font-family: Arial;            
							}
						</style>
					</head>

					<body>
						'.$template_content.'
					</body>
				</html>
			';
			
			// echo $template_html;
			
			$dompdf = new DOMPDF();
			$dompdf->loadHtml($template_html);
			$dompdf->set_paper(array(0, 0, 227, 151), "portrait");
			$dompdf->render();

			$dompdf->stream('document.pdf', array("Attachment" => false));
		}
	}
	
	public function print_unixqr() {
		if($_REQUEST['id_bank']!=="") {
			$template_content = '';
			
			$query = "SELECT * FROM master_atm LEFT JOIN master_client ON (master_client.id=master_atm.id_bank) WHERE id_bank='".$_REQUEST['id_bank']."'";
			$result = $this->db->query($query)->result();
			
			$i = 0;
			foreach($result as $r) {
				$i++;
				$leading = str_pad($i, 3, '0', STR_PAD_LEFT);
				$spintf = "ASD".$r->kode_ticket.$leading;
				$qrCode = new QrCode($spintf);
				$qrCode->setSize(300);
				$qrCode->writeFile(realpath(__DIR__ . '/../../upload/tes').'/'.$spintf.'.png');
			}
			$j = 0;
			foreach($result as $r) {
				$j++;
				$leading = str_pad($j, 3, '0', STR_PAD_LEFT);
				$spintf = "ASD".$r->kode_ticket.$leading;
				
				$template_content .= '
					<table style="width: 100%">
						<tr>
							<td style="width: 50%">
								<img style="margin-left: 0px; margin-top: 5px" src="'.realpath(__DIR__ . '/../../upload/tes').'/'.$spintf.'.png" width="90" height="90"></img>
							</td>
							<td style="width: 50%">
								<div style="margin-left: px;">
									<span style="font-weight: bold; font-size: 12px">
										<span>'.$r->nama.'</span><br>
										<span>QRCODE : </span><br>
										<span>'.$spintf.'</span><br>
									</span>
								</div>
							</td>
						</tr>
					</table>
				';
				
				// $template_content .= '
					// <table>
						// <tr>
							// <td>
								// <img style="margin-left: 10px; margin-top: 25px" src="'.base_url().'upload/tes/'.$spintf.'.png" width="90" height="90"></img>
							// </td>
							// <td>
								// <span>
									// <span>'.$r->nama.'</span><br>
									// <span>ID ATM : </span><br>
									// <span>'.$r->idatm.'</span><br>
								// </span>
							// </td>
						// </tr>
					// </table>
				// ';
			}
			
			$template_html = '
				<html>
					<head>
						<style>
							
							@page { margin: 0px; size: 5cm 3cm portrait; }
						
						
							body {
								margin: 1px 1px 1px 1px; 
								font-family: "Open Sans";            
							}
							
							table {
								font-family: Arial, Helvetica, sans-serif;
							}
						</style>
					</head>

					<body>
						'.$template_content.'
					</body>
				</html>
			';
			
			// echo $template_html;
			
			$dompdf = new DOMPDF();
			$template_html = preg_replace('/>\s+</', "><", $template_html);
			$dompdf->loadHtml($template_html);
			$dompdf->set_paper(array(0, 0, 227, 151), "portrait");
			$dompdf->render();

			$dompdf->stream('document.pdf', array("Attachment" => false));
		}
	}
	
	public function gen() {
		$template_content = '';
		$from = $this->uri->segment(3);
		$to = $this->uri->segment(4);
		
		for($i=$from; $i<=$to; $i++) {
			$spintf = "BST".sprintf('%04d', $i);
			$qrCode = new QrCode($spintf);
			$qrCode->setSize(300);
			$qrCode->writeFile(realpath(__DIR__ . '/../../upload/tes').'/'.$spintf.'.png');
		}
		
		for($i=$from; $i<=$to; $i++) {
			$spintf = "BST".sprintf('%04d', $i);
			
			$template_content .= '
				<table style="width: 100%; height: 120px">
					<tr>
						<td style="width: 10%">
							<img style="margin-left: 10px; margin-top: 25px" src="'.realpath(__DIR__ . '/../../upload/tes').'/'.$spintf.'.png" width="90" height="90"></img>
						</td>
						<td style="text-align: left" valign="middle" align="left">
							<span style="float: left; margin-left: 10px; margin-top: 30px; font-size: 14px; font-weight: bold">
								<span>BANK KALTENG</span><br>
								<span>ID ATM : </span><br>
								<span>11223344</span><br>
							</span>
						</td>
					</tr>
				</table>
			';
			
			// $template_content .= '
				// <div class="">
					// <div class="">
						
						// <center>
							// <img style="margin-top: 18px" src="'.base_url().'upload/tes/'.$spintf.'.png" width="80" height="80"></img>
						// </center>
						// <center style="margin-top: 1px; font-size: 12px; font-weight: bold">
							// <span>a'.$i.'</span>
						// </center>
					// </div>
				// </div>
			// ';
		}
		
		$template_html = '
			<html>
				<head>
					<style>
						
						@page { margin: 0px; size: 6cm 4cm portrait; }
					
					
						body {
							margin: 1px 1px 1px 1px; 
							font-family: Calibri;            
						}
					</style>
				</head>

				<body>
					'.$template_content.'
				</body>
			</html>
		';
		
		$dompdf = new DOMPDF();
		$dompdf->loadHtml($template_html);
		$dompdf->set_paper(array(0, 0, 227, 151), "portrait");
		$dompdf->render();

		$dompdf->stream('document.pdf', array("Attachment" => false));
	}
}