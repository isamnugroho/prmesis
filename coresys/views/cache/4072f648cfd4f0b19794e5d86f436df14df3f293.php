<aside id="left-panel" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% ); margin: 0px 0px 0px 0px;">
	<!-- User info -->
	<div class="login-info" style="background: linear-gradient(to bottom, #000000, #434343);color;white;">
		<span>
			<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
			<p class="small" align="justify" style="color:white;font-size:10px; margin: 0px 0px 0px 0px;">
			<b style="letter-spacing: -1px; color:white;font-size:16px; margin: 0px 0px 0px 0px;">
			User Credential Access</b><br>
			<small style="color:white;font-size:10px; margin: 0px 0px 0px 0px;"><?=$user_access['level']?> : <?=$user_access['name']?> (<?=$user_access['username']?>)</small></p>
			</a>
		</span>
	</div>

	<!-- NAVIGATION : This navigation is also responsive-->
	<nav>
		<ul>
			<?php
				function active($that, $currect_page){
					$url_array = explode("/", $that->router->fetch_class());
					$url = end($url_array);  
					if($currect_page == $url){
						echo "class='active'";
					} 
					if(is_array($currect_page)) {
						if(in_array($url, $currect_page)){
							echo "class='active'";
						}
					}
				}
				function access($user_access, $accepted_access){
					if(strtolower($user_access['level'])!=="super") {
						if (in_array(strtolower($user_access['level']),  $accepted_access)) {
							echo "";
						} else {
							echo "hidden";
						}
					}
				}
			?>
			
			<!-- SEPARATOR CLEANING -->
			<li <?=access($user_access, array('admin', 'koordinator'))?> style="background: linear-gradient(to bottom, #e52d27, #b31217);color;white;height:40px">
			
				<span class="menu-item-parent">
				<p class="small" style="margin: 5px 0px 0px 10px;">
					<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Cleaning Service CRM</small><br>
					<small style="color:white;font-size:10px;">Dashboard Summary & Performance</small>
				</p>
				</span>					
			</li>		

			<!-- MENU DASHBOARD CLEANING -->
			<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, 'dashboard')?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
				<a href="<?=base_url()?>dashboard" title="" class="menu-item-parent zoomsmall">
				<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=BASE_LAYOUT?>/img/homelock.png" height="28" width="28" />
				<span class="menu-item-parent">
				<p class="small" style="">
					<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Main Dashboard</small><br>
					<small style="color:white;font-size:10px;">Cleaning Service Summary</small>
				</p>
				</span>
				</a>
			</li>
			
			
			<!-- MENU DASHBOARD CLEANING -->
			<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, 'dash_performance')?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
				<a href="<?=base_url()?>dash_performance" title="" class="menu-item-parent zoomsmall">
				<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=BASE_LAYOUT?>/img/n43.png" height="28" width="28" />
				<span class="menu-item-parent">
				<p class="small" style="">
					<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">All Performance</small><br>
					<small style="color:white;font-size:10px;">Summary Job Performance</small>
				</p>
				</span>
				</a>
			</li>
			
			<!-- SEPARATOR CLEANING -->
			<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, array('dash_key', 'provide_key', 'status_key', 'list_keyopen','list_keyclose'))?> style="background: linear-gradient(to bottom, #e52d27, #b31217);color;white;height:40px">
			
				<span class="menu-item-parent">
				<p class="small" style="margin: 5px 0px 0px 10px;">
					<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Management</small><br>
					<small style="color:white;font-size:10px;">Master Data Management</small>
				</p>
				</span>					
			</li>
			

			<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, array('new_ticket', 'status_ticket', 'master_jobcard', 'trouble_category', 'trouble_sub_category','documentation'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
				<a href="#" class="zoomsmall">
					<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=BASE_LAYOUT?>/img/kdmconfig.png" height="28" width="28" />
					<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Staff Management</small><br>
							<small style="color:white;font-size:10px;">Staff Data Management</small>
						</p>
					</span>
				</a>						
				<ul>
					<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, 'master_staff')?>>
						<a href="<?=base_url()?>master_staff" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=BASE_LAYOUT?>/img/userpro.png" height="15" width="15" />Karyawan / Staff</a>
					</li>
					<!--<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, 'master_user')?>>
						<a href="<?=base_url()?>master_user" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=BASE_LAYOUT?>/img/lock.png" height="15" width="15" />User Access</a>
					</li>-->
				</ul>
			</li>
			
			
			<li <?=access($user_access, array('admin'))?> <?=active($that, array('new_ticket', 'status_ticket', 'master_jobcard', 'trouble_category', 'trouble_sub_category','documentation'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
				<a href="#" class="zoomsmall">
					<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=BASE_LAYOUT?>/img/db_add.png" height="28" width="28" />
					<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Master Management</small><br>
							<small style="color:white;font-size:10px;">Master Data Management</small>
						</p>
					</span>
				</a>						
				<ul>
					<li <?=access($user_access, array('admin'))?> <?=active($that, 'master_atm')?>>
						<a href="<?=base_url()?>master_atm" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=BASE_LAYOUT?>/img/atm2.png" height="15" width="15" />Data Mesin CRM</a>
					</li>
					<li <?=access($user_access, array('admin'))?> <?=active($that, 'master_vendor')?>>
						<a href="<?=base_url()?>master_vendor" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=BASE_LAYOUT?>/img/building.png" height="15" width="15" />Vendor Cleaning</a>
					</li>
					<li <?=access($user_access, array('admin'))?> <?=active($that, array('master_kelolaan', 'master_kelolaan_detail'))?>>
						<a href="<?=base_url()?>master_kelolaan" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=BASE_LAYOUT?>/img/whiteloc.png" height="15" width="15" />Area & Location</a>
					</li>
				</ul>
			</li>
						
			<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, array('trans_schedule', 'trans_switch', 'trans_complaint', 'data_checklist', 'news'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
				<a href="#" class="zoomsmall">
					<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=BASE_LAYOUT?>/img/cl03.png" height="28" width="28" />
					<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Cleaning Schedule</small><br>
							<small style="color:white;font-size:10px;">Schedule Data Management</small>
						</p>
					</span>
				</a>						
				<ul>
					<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, 'trans_schedule')?>>
						<a href="<?=base_url()?>trans_schedule" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=BASE_LAYOUT?>/img/taskyellow.png" height="15" width="15" />Work Schedule</a>
					</li>
					<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, 'trans_switch')?>>
						<a href="<?=base_url()?>trans_switch" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=BASE_LAYOUT?>/img/send.png" height="15" width="15" />Switch Schedule</a>
					</li>
					<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, 'trans_complaint')?>>
						<a href="<?=base_url()?>trans_complaint" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=BASE_LAYOUT?>/img/send.png" height="15" width="15" />Complaint</a>
					</li>
					<li <?=access($user_access, array('admin'))?> <?=active($that, array('data_checklist', 'data_checklist_detail'))?>>
						<a href="<?=base_url()?>data_checklist" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=BASE_LAYOUT?>/img/cal.png" height="15" width="15" />Checklist Job Item</a>
					</li>
					<li hidden <?=access($user_access, array('admin'))?> <?=active($that, 'news')?>>
						<a href="<?=base_url()?>news" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=BASE_LAYOUT?>/img/phonepink.png" height="15" width="15" />News Broadcast</a>
					</li>
				</ul>
			</li>
			
			<!-- SEPARATOR CLEANING -->
			<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, array('dash_key', 'provide_key', 'status_key', 'list_keyopen','list_keyclose'))?> style="background: linear-gradient(to bottom, #e52d27, #b31217);color;white;height:40px">
			
				<span class="menu-item-parent">
				<p class="small" style="margin: 5px 0px 0px 10px;">
					<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Reports Management</small><br>
					<small style="color:white;font-size:10px;">Data Reporting Premesis Overall</small>
				</p>
				</span>					
			</li>
			
			<!-- MENU CLEANING REPORTS -->
			<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, array('report_attendance', 'inventory_report', 'report_maintenance', 'report_jobcard'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
				<a href="#" class="zoomsmall">
				<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=BASE_LAYOUT?>/img/graphraw.png" height="28" width="28" />
				<span class="menu-item-parent">
				<p class="small" style="">
					<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Cleaning Reports</small><br>
					<small style="color:white;font-size:10px;">Overall Reports Management</small>
				</p>
				</span>
				</a>					
				<ul>
					<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, 'report_cleaning')?>>
						<a href="<?=base_url()?>report_cleaning" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=BASE_LAYOUT?>/img/pdf.png" height="15" width="15" />Report Daily</a>
					</li>
					<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, 'report_cleaning_switch')?>>
						<a href="<?=base_url()?>report_cleaning_switch" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=BASE_LAYOUT?>/img/pdf.png" height="15" width="15" />Report Switch</a>
					</li>
					<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, 'report_cleaning_complaint')?>>
						<a href="<?=base_url()?>report_cleaning_complaint" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=BASE_LAYOUT?>/img/pdf.png" height="15" width="15" />Report Complaint</a>
					</li>
				</ul>
			</li>

						
			<!-- SEPARATOR CLEANING -->
			<li <?=access($user_access, array('admin', 'koordinator'))?> <?=active($that, array('report_backup', 'provide_key', 'status_key', 'list_keyopen','list_keyclose'))?> style="background: linear-gradient(to bottom, #e52d27, #b31217);color;white;height:40px">
			
				<span class="menu-item-parent">
				<p class="small" style="margin: 5px 0px 0px 10px;">
					<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Instruction & Utility </small><br>
					<small style="color:white;font-size:10px;">Utility, Requirement & Instruction</small>
				</p>
				</span>					
			</li>
					<li <?=access($user_access, array('admin'))?> <?=active($that, 'report_backup')?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="<?=base_url()?>report_backup" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>assets/img/brangkas2.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">
							Database Backup
							</small><br>
							<small style="color:white;font-size:10px;">Report backup</small>
						</p>
						</span>
						</a>
					</li>	
					<li style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="<?=base_url()?>server_mon" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>assets/img/n34.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">
							Server Monitoring
							</small><br>
							<small style="color:white;font-size:10px;">Server Monitoring & Status</small>
						</p>
						</span>
						</a>
					</li>		
					<li style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="<?=base_url()?>master_instruction" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>assets/img/userguide.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Manual Instruction</small><br>
							<small style="color:white;font-size:10px;">User Guide & Documentation</small>
						</p>
						</span>
						</a>
					</li>	
					
					<li style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="helpdesk" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>assets/img/helpdesk.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Helpdesk System</small><br>
							<small style="color:white;font-size:10px;">Complaint Management</small>
						</p>
						</span>
						</a>
					</li>		
					<li style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="<?=base_url()?>login/logout" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/logout.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Logout System</small><br>
							<small style="color:white;font-size:10px;">Exit & Unload System</small>
						</p>
						</span>
						</a>
					</li>				

		</ul>
	</nav>

</aside><?php /**PATH D:\DEV_SERVER\htdocs\2022\25-01-2022\premesis\coresys\views/layouts/master_navbar.blade.php ENDPATH**/ ?>