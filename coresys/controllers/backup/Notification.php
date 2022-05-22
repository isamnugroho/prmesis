<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends MY_Controller {
    var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
    }
	
	public function get_notif_ticket() {
		$res = $this->db->query("SELECT * FROM notify WHERE status='unread' AND menu='status_ticket' ORDER BY id DESC")->result();
		
		$msg = '<ul class="notification-body">';
		foreach($res as $r) {
			$url = base_url().'notification';
			$msg .= '
				<li>
					<span class="padding-10">
						<em class="badge padding-5 no-border-radius bg-color-green pull-left margin-right-5">
							<i class="fa fa-check fa-fw fa-2x"></i>
						</em>
						<span>
							'.$r->msg.'<br>
							<span class="pull-right font-xs text-muted"><a href="javascript:void(0);" onclick="read_notif(\''.$url.'/read_notif/'.$r->id.'/'.$r->id_menu.'/'.$r->menu.'\')" class="display-normal">Click here</a></span>
						</span>
					</span>
				</li>
			';
		}
		$msg .= '</ul>';
		
		
		echo $msg;
	}
	
	public function get_notif_costing() {
		$res = $this->db->query("SELECT *, notify.id as id FROM notify LEFT JOIN flm_master_ticket ON(flm_master_ticket.id=notify.id_menu) LEFT JOIN finance_akomodation ON(finance_akomodation.ticket_id=flm_master_ticket.ticket_id OR finance_akomodation.id=notify.id_menu) WHERE notify.status='unread' AND (notify.menu='costing_job' OR notify.menu='costing_rev') GROUP BY notify.menu, notify.id_menu ORDER BY notify.id DESC ")->result();
		
		$msg = '<ul class="notification-body">';
		foreach($res as $r) {
		    
		    $jo = "";
		    if($r->job_order!=null) {
		        $jo = "<table>
		            <tr>
		                <td>TANGGAL: ".date('d-m-Y H:i:s', strtotime($r->date))."</td>
		            </tr>
		            <tr>
		                <td>TICKET: $r->ticket_id</td>
		            </tr>
		            <tr>
		                <td>JO: $r->job_order</td>
		            </tr>
		            <tr>
		                <td>KODE COSTING: $r->kode_costing</td>
		            </tr>
		            <tr>
		                <td>$r->msg</td>
		            </tr>
		        </table>";
		    } else {
		        $jo = "<table>
		            <tr>
		                <td>$r->msg</td>
		            </tr>
		        </table>";
		    }
			$url = base_url().'notification';
			$msg .= '
				<li>
					<span class="padding-10">
						<em class="badge padding-5 no-border-radius bg-color-green pull-left margin-right-5">
							<i class="fa fa-check fa-fw fa-2x"></i>
						</em>
						<span>
							'.$jo.'<br>
							<span class="pull-right font-xs text-muted"><a href="javascript:void(0);" onclick="read_notif(\''.$url.'/read_notif/'.$r->id.'/'.$r->id_menu.'/'.$r->menu.'\')" class="display-normal">Click here</a></span>
						</span>
					</span>
				</li>
			';
		}
		$msg .= '</ul>';
		
		
		echo $msg;
	}
	
	public function get_count() {
		$res1 = $this->db->query("SELECT * FROM notify WHERE status='unread' GROUP BY notify.menu, notify.id_menu");
		$res2 = $this->db->query("SELECT * FROM notify WHERE status='unread' AND menu='status_ticket' GROUP BY notify.menu, notify.id_menu");
		$res3 = $this->db->query("SELECT * FROM notify WHERE status='unread' AND (menu='costing_job' OR menu='costing_rev') GROUP BY notify.menu, notify.id_menu");
		$res4 = $this->db->query("SELECT last_update FROM notify WHERE status='unread' GROUP BY notify.menu, notify.id_menu ORDER BY last_update DESC")->row();
		
		echo json_encode(array(
			'count_all' => $res1->num_rows(),
			'count_ticket' => $res2->num_rows(),
			'count_costing' => $res3->num_rows(),
			'last_update' => date("d/m/Y H:iA", strtotime($res4->last_update)),
		));
	}
	
	public function read_notif($id, $id_menu, $menu) {
		$this->db->where('id', $id);
		$res = $this->db->update('notify', array('status'=>'readed'));
		
		if($res) {
			echo json_encode(array(
				'url' => base_url().$menu,
				'id' => $id_menu,
			));
		}
	}
}