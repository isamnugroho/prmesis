<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
    
    class MY_Controller extends CI_Controller {
        public function __construct() {
			parent::__construct();
            
			if(!$this->session->userdata('user_data')) {
				redirect('');
			}
			
			
			$this->data['user_access'] = $this->session->userdata('user_data');
			$this->data['access_scope'] = $this->session->userdata('user_data')['access_scope'];
			$this->data['access_crud'] = function($user_access, $accepted_access) {
				if(strtolower($user_access['level'])!=="super") {
					if (in_array(strtolower($user_access['level']),  $accepted_access)) {
						echo "";
					} else {
						echo "hidden";
					}
				}
			};
        }
		
		public function notify() {
			echo "
				<script src=\"".base_url()."js/notification/SmartNotification.min.js\"></script>
				<scipt>
					$.smallBox({
						title : \"James Simmons liked your comment\",
						content : \"<i class='fa fa-clock-o'></i> <i>2 seconds ago...</i>\",
						color : \"#296191\",
						iconSmall : \"fa fa-thumbs-up bounce animated\",
						timeout : 4000
					});
				</script>
			";
		}
	}