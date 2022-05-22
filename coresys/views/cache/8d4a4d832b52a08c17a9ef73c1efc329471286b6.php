<div id="logo-group">

	<!-- PLACE YOUR LOGO HERE -->
	<span id="logo" style="margin: 10px 5px 0px 5px;"> 
		<a href="#" class="zoomsmall" data-toggle="modal" data-target="#myMenu">
		<img src="<?=BASE_LAYOUT?>/img/LOGOITS.png" alt="PROTOTYPE" style="width: 100%; margin: -5px 0px 0px 0px;"> </a>
	</span>
	<!-- END LOGO PLACEHOLDER -->

	<!-- Note: The activity badge color changes when clicked and resets the number to 0
	Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
	<span id="activity" class="activity-dropdown">
		<img style="margin: -5px 0px 0px 0px;" src="<?=BASE_LAYOUT?>/img/calendar.png" height="20" width="20" />
		<b class="badge" id="my_notify" style="margin: 0px 0px -20px 0px;"> 0 </b> 
	</span>

	<!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
	<div class="ajax-dropdown" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);color;white;">
		<div class="btn-group btn-group-justified" data-toggle="buttons">
			<label class="btn btn-default">
				<input type="radio" name="activity" id="<?=base_url()?>notification/get_notif_ticket">
				Notification (<span id="my_notify_ticket">0</span>) </label>
			<!--<label class="btn btn-default">
				<input type="radio" name="activity" id="<?=base_url()?>notification/get_notif_costing">
				Costing Request (<span id="my_notify_costing">0</span>) </label>-->
			
		</div>
		<div class="ajax-notifications custom-scroll">
			<div class="alert alert-transparent">
				Silahkan Pilih Tombol Notification untuk melihat Pesan Notifikasi.
			</div>
			<center>
			<img style="margin: 0px 0px 0px 0px;" src="<?=BASE_LAYOUT?>/img/colormix.png" height="80" width="80" />
			</center>
		</div>
		
		<span> Last Updated On : <span id="last_update">12/12/2020 00:00AM</span>
			<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading Notification..." id="reloading_notif" class="btn btn-xs btn-default pull-right">
				<i class="fa fa-refresh"></i>
			</button> 
		</span>
	</div>
	<!-- END AJAX-DROPDOWN -->
</div>

<?php
	function access_exo($user_access, $accepted_access){
		if(strtolower($user_access['level'])!=="super") {
			if (in_array(strtolower($user_access['level']),  $accepted_access)) {
				echo "";
			} else {
				echo "hidden";
			}
		}
	}
?>


<!-- pulled right: nav area -->
<div class="pull-right">
	
	<!-- collapse menu button -->
	<div id="hide-menu" class="btn-header pull-right">
		<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
	</div>
	<!-- end collapse menu -->
	
	<!-- #MOBILE -->
	<!-- Top menu profile link : this shows only when top menu is active -->
	<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
		<li class="">
			<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
				<img src="<?=BASE_LAYOUT?>img/avatars/sunny.png" alt="John Doe" class="online" />  
			</a>
			<ul class="dropdown-menu pull-right">
				<li>
					<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="<?=base_url()?>login" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
				</li>
			</ul>
		</li>
	</ul>

	<!-- logout button -->
	<div id="logout" class="btn-header transparent pull-right">
		<span> <a href="<?=base_url()?>login/logout" title="Sign Out" data-action="userLogout" data-logout-msg="Apakah Anda Yakin akan Logout dari sistem ???">
		<img style="float: left; margin: 3px 0px 0px 3px;" src="<?=BASE_LAYOUT?>/img/logout.png" height="18" width="18" />
		</a> </span>
	</div>
	<!-- end logout button -->

	<!-- fullscreen button -->
	<div id="fullscreen" class="btn-header transparent pull-right ">
		<span> <a href="javascript:void(0);" class="zoomsmall" data-action="launchFullscreen" title="Full Screen"><img style="float: left; margin: 3px 0px 0px 3px;" src="<?=BASE_LAYOUT?>/img/buttonblue.png" height="18" width="18" /></a> </span>
	</div>
	<!--<div id="fullscreen" class="btn-header transparent pull-right">
		<span> 	
			<a href="<?=base_url()?>display_mon" class="btn btn-primary pull-right zoomsmall" target="blank" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);border-radius: 4px;width: 100%;height:30px;color:gray"><img style="float: left; margin: 3px 5px 0px 3px;" src="<?=BASE_LAYOUT?>/img/foltime3.png" height="18" width="18" /><b style="float: left; margin: 0px 5px 0px 0px;font-size:12px;">Display Monitoring</b></a>
		</span>
	</div>-->
	<!-- end fullscreen button -->
	
	<!-- #Voice Command: Start Speech -->
	<div id="speech-btn" class="btn-header transparent pull-right hidden-sm hidden-xs">
		<div> 
			<a href="javascript:void(0)" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a> 
			<div class="popover bottom"><div class="arrow"></div>
				<div class="popover-content">
					<h4 class="vc-title">Voice Command Cctivated <br><small>Please Speak Clearly into the microphone</small></h4>
					<h4 class="vc-title-error text-center">
						<i class="fa fa-microphone-slash"></i> Voice Command Failed
						<br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
						<br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>
					</h4>
					<a href="javascript:void(0);" class="btn btn-success" onclick="commands.help()">See Commands</a> 
					<a href="javascript:void(0);" class="btn bg-color-purple txt-color-white" onclick="$('#speech-btn .popover').fadeOut(50);">Close Popup</a> 
				</div>
			</div>
		</div>
	</div>
	<!-- end voice command -->

</div>	
<!-- end pulled right: nav area --><?php /**PATH D:\DEV_SERVER\htdocs\2022\premesis\coresys\views/layouts/master_header.blade.php ENDPATH**/ ?>