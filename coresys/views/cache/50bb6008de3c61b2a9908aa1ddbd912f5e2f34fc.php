<?php $__env->startSection('stylesheet'); ?>
	<style>
		/*	start styles for the ContextMenu	*/
        .context_menu {
            background-color: #ebebeb;
			border: 1px solid black;
        }

        .context_menu_item {
            padding: 3px 6px;
        }

        .context_menu_item:hover {
            background-color: #CCCCCC;
        }

        .context_menu_separator {
            background-color: gray;
            height: 1px;
            margin: 0;
            padding: 0;
        }
		
		.controls {
			margin-top: 10px;
			border: 1px solid transparent;
			border-radius: 2px 0 0 2px;
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			height: 40px;
			color: rgb(86, 86, 86);
			font-family: Roboto, Arial, sans-serif;
			-moz-user-select: none;
			font-size: 18px;
			background-color: rgb(255, 255, 255);
			padding: 0px 17px;
			border-bottom-right-radius: 2px;
			border-top-right-radius: 2px;
			background-clip: padding-box;
			box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
			min-width: 64px;
			border-left: 0px none;
			outline: currentcolor none medium;
		}
		
		#searchInput {
			background-color: #fff;
			font-family: Roboto;
			font-size: 15px;
			font-weight: 300;
			margin-left: 12px;
			padding: 0 11px 0 13px;
			text-overflow: ellipsis;
			width: 50%;
		}

		#searchInput:focus {
			border-color: #4d90fe;
		}

		ul#geoData {
			text-align: left;
			font-weight: bold;
			margin-top: 10px;
		}

		ul#geoData span {
			font-weight: normal;
		}
		
		.pac-container {
			z-index: 99999999 !important;
		}
	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
.hrow-gap1{
margin: 20px 0px 0px 0px;
}
.hrow-gap2{
margin: -30px 0px 0px 0px;
}
.hrow-gap3{
margin: -30px 0px 0px 0px;
}

hanzmobview{
  display: inline;
}
@media  screen and (max-width: 1024px){
hanzmobview{
    display: none;
  }
.art-one{
  padding: 10px;
  }

}
</style>
<div class="row art-one">
<hanzmobview>
	<article class="btn-group col-sm-12">
		<div class="navbar navbar-default" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 5px 5px 0px 0px;">
			<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>dashboard_merchant_internal" class="btn btn-default btn-circle btn-sm zoomsmall">
			<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/blackbut.png" height="24" width="24" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Client Dashboard</small><br>
					<small style="color:white;font-size:12px;">Client Dashboard Monitoring</small>
				</p>
			</a>
			</div>
			<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>master_client" class="btn btn-default btn-circle btn-sm zoomsmall">
			<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/blackbook.png" height="24" width="24" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Client & Customer </small><br>
					<small style="color:white;font-size:12px;">Data Client & Customer </small>
				</p>
			</a>
			</div>
			<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>master_atm" class="btn btn-default btn-circle zoomsmall active">
			<img style="float: left; margin: -1px 10px 0px 4px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" height="24" width="24" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Mesin ATM</small><br>
					<small style="color:white;font-size:12px;">Data Mesin ATM</small>
				</p>
			</a>
			</div>
			<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>master_location" class="btn btn-default btn-circle btn-sm zoomsmall">
			<img style="float: left; margin: -2px 10px 0px 3px;" src="<?=base_url()?>seipkon/assets/img/whiteloc.png" height="28" width="28" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Area & Location</small><br>
					<small style="color:white;font-size:12px;">Area & Location Coverage</small>
				</p>
			</a>
			</div>			
		</div>
	</article>
</hanzmobview>
</div>
	<!-- widget grid -->
	<section id="widget-grid" class="">

	
		<div class="row">
			
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: -20px 0px 0px 0px;">

				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-togglebutton="false"										  data-widget-fullscreenbutton="false"
				data-widget-deletebutton="false"
				data-widget-sortable="false"
				data-widget-editbutton="false">
					
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Data Mesin ATM</b></h2>
						
						<span class="ribbon-button-alignment pull-right" style="margin: -22px 2px 0px 0px; "> 
						<section>
						<a onclick="createModal()" class="btn btn-default btn-xs pull-right zoomsmall" style="float:left; background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px; margin: 14px 0px 0px 0px;height:28px; width:230px">
						<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" />	
						<p class="small" style="margin: 6px 0px 0px 0px; ">
							<small style="color:black;font-size:12px; font-weight: bold;">Pilih Bank & Tambah Mesin ATM</small>
						</p>
						</a>
							<select id="select_location" class="form-control pull-right" style="margin: 14px 2px 0px 0px; width: 180px;height:28px">
								<option value="">Pilih Lokasi Kelolaan</option>
								<?php 
									foreach($kelolaan as $r) {
										echo '<option value="'.$r->id.'">'.$r->lokasi.'</option>';
									}
								?>
							</select>
						</section>
						</span>
					</header>
					
					<div>
						<div class="widget-body no-padding">
							<div id="w3docs-map" class="w3docs-map" style="width: 100%;height: 480px;"></div>
						</div>
					</div>
				</div>
			</article>
		</div>

	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAb7d-G5Ea9j3X_haj37bSPJkSN7PpAp7I&libraries=places"></script>
	<script type="text/javascript" src="<?=base_url()?>seipkon/assets/ContextMenu.js"></script>

	<script type="text/javascript">

		/* DO NOT REMOVE : GLOBAL FUNCTIONS!
		 *
		 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
		 *
		 * // activate tooltips
		 * $("[rel=tooltip]").tooltip();
		 *
		 * // activate popovers
		 * $("[rel=popover]").popover();
		 *
		 * // activate popovers with hover states
		 * $("[rel=popover-hover]").popover({ trigger: "hover" });
		 *
		 * // activate inline charts
		 * runAllCharts();
		 *
		 * // setup widgets
		 * setup_widgets_desktop();
		 *
		 * // run form elements
		 * runAllForms();
		 *
		 ********************************
		 *
		 * pageSetUp() is needed whenever you load a page.
		 * It initializes and checks for all basic elements of the page
		 * and makes rendering easier.
		 *
		 */

		pageSetUp();
		
		/*
		 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
		 * eg alert("my home function");
		 * 
		 * var pagefunction = function() {
		 *   ...
		 * }
		 * loadScript("<?=BASE_URL?>js/plugin/_PLUGIN_NAME_.js", pagefunction);
		 * 
		 */
		
		// PAGE RELATED SCRIPTS
		var map;
		var myVar;
		
		$("#select_location").change(function() {
			var id = $(this).val()
			var markers_3 = [];
			var sitess_3 = [];
			
			var base_url = "<?php echo base_url();?>";
			$.get(base_url + 'maps/get_latlng/'+id, function(data) {
				var data_lokasi = JSON.parse(data).id_lokasi;
				var data_latlng = JSON.parse(JSON.parse(data).latlng);
				
				// console.log(data_latlng.id_lokasi);
				console.log(data_latlng);
				console.log(data_lokasi);
				
				var prop = {
					center: new google.maps.LatLng(data_latlng.lat, data_latlng.lng),
					zoom: 10,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				map = new google.maps.Map($('#w3docs-map')[0], prop);
				$('#w3docs-map').show();
				google.maps.event.trigger(map, 'resize');
				
				$.get("<?=base_url()?>maps/get_marker_cse/"+data_lokasi, function(response){
					console.log("<?=base_url()?>maps/get_marker_cse/"+id);
					if(JSON.parse(response).length>0) {
						$.each(JSON.parse(response), function(key, data) {
							var latlng = JSON.parse(data.current_location);
							var datas = [data.nik, Number(latlng.lat), Number(latlng.lng), 1, data.nama];
							
							sitess_3.push(datas);
						});
						
						setZoom_3(map, sitess_3);
						setMarkers_3(map, sitess_3);
					}
				});
				
				clearInterval(myVar);
				myVar = setInterval(refreshMap_3, 2000);
						
				function refreshMap_3() {
					$.get("<?=base_url()?>maps/get_marker_cse/"+data_lokasi, function(response){
						if(JSON.parse(response)!==null) {
							$.each(JSON.parse(response), function(key, data) {
								if(markers_3[data.nik]!==undefined) {
									var latlng = JSON.parse(data.current_location);
									var uluru = {lat: Number(latlng.lat), lng: Number(latlng.lng)};
									
									moove_3(data.nik, uluru);
								}
							});
						}
					});
				}
				
			});
		});
		
		/*
		This functions sets the markers (array)
		*/
		function setMarkers_3(map, markers) {
			for (var i = 0; i < markers.length; i++) {
				var site = markers[i];
				var siteLatLng = new google.maps.LatLng(site[1], site[2]);
				
				var icon = { // car icon
					path: 'M29.395,0H17.636c-3.117,0-5.643,3.467-5.643,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759   c3.116,0,5.644-2.527,5.644-5.644V6.584C35.037,3.467,32.511,0,29.395,0z M34.05,14.188v11.665l-2.729,0.351v-4.806L34.05,14.188z    M32.618,10.773c-1.016,3.9-2.219,8.51-2.219,8.51H16.631l-2.222-8.51C14.41,10.773,23.293,7.755,32.618,10.773z M15.741,21.713   v4.492l-2.73-0.349V14.502L15.741,21.713z M13.011,37.938V27.579l2.73,0.343v8.196L13.011,37.938z M14.568,40.882l2.218-3.336 h13.771l2.219,3.336H14.568z M31.321,35.805v-7.872l2.729-0.355v10.048L31.321,35.805',
					scale: 0.4,
					fillColor: "#427af4", //<-- Car Color, you can change it 
					fillOpacity: 1,
					strokeWeight: 1,
					anchor: new google.maps.Point(0, 5),
					// rotation: data.val().angle //<-- Car angle
					rotation: 0 //<-- Car angle
				};

				var marker = new google.maps.Marker({
					icon: "<?=base_url()?>assets/icon/motorcycle1.png",
					position: siteLatLng,
					map: map,
					title: site[0],
					zIndex: site[3],
					html: site[4],
					// Markers drop on the map
					animation: google.maps.Animation.DROP
				});
				
				markers_3[site[0]] = marker;

				google.maps.event.addListener(marker, "click", function() {
					infowindow_3.setContent(this.html);
					infowindow_3.open(map, this);
				});
			}
		}

		/*
		Set the zoom to fit comfortably all the markers in the map
		*/
		function setZoom_3(map, markers) {
			var boundbox = new google.maps.LatLngBounds();
			for (var i = 0; i < markers.length; i++) {
				boundbox.extend(new google.maps.LatLng(markers[i][1], markers[i][2]));
			}
			map.setCenter(boundbox.getCenter());
			map.fitBounds(boundbox);
		}
		
		function moove_3(index, latlng) {
			// console.log(latlng);
			marker = markers_3[index];
			marker.setPosition(latlng);
		}
		
		// pagefunction	
		var table;
		var pagefunction = function() {
			//console.log("cleared");
			
			var prop = {
				center: new google.maps.LatLng(51.508742, -0.120850),
				zoom: 10,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			map = new google.maps.Map($('#w3docs-map')[0], prop);
			$('#w3docs-map').show();
			google.maps.event.trigger(map, 'resize');
			
			/* // DOM Position key index //
			
				l - Length changing (dropdown)
				f - Filtering input (search)
				t - The Table! (datatable)
				i - Information (records)
				p - Pagination (paging)
				r - pRocessing 
				< and > - div elements
				<"#id" and > - div with an id
				<"class" and > - div with a class
				<"#id.class" and > - div with an id and class
				
				Also see: http://legacy.datatables.net/usage/features
			*/	

			/* BASIC ;*/
				var responsiveHelper_dt_basic = undefined;
				var responsiveHelper_datatable_fixed_column = undefined;
				var responsiveHelper_datatable_col_reorder = undefined;
				var responsiveHelper_datatable_tabletools = undefined;
				
				var breakpointDefinition = {
					tablet : 1024,
					phone : 480
				};
				
				var base_url = "<?php echo base_url();?>";
				table = $('#dt_basic').DataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_dt_basic) {
							responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_dt_basic.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_dt_basic.respond();
					},
					"pageLength" : 10,
					"serverSide": true,
					"order": [[1, "asc" ]],
					"columnDefs": [{"orderable": false, "targets": 0}],
					"ajax":{
						url :  base_url + 'master_atm/get_data/0',
						type : 'POST',
						dataFilter: function(data) {
							console.log(data);
							var json = jQuery.parseJSON( data );
							json.recordsTotal = json.recordsTotal;
							json.recordsFiltered = json.recordsFiltered;
							json.data = json.data;

							return JSON.stringify( json );
						}
					},
				});
				
				$("#select_client").on("change", function() {
					that = $(this);
					if(that.val()!=="") {
						table.ajax.url(base_url + 'master_atm/get_data/'+that.val()).load();
					}
				});

			/* END BASIC */

		};
		// function initialize() {
			// var prop = {
				// center: new google.maps.LatLng(51.508742, -0.120850),
				// zoom: 10,
				// mapTypeId: google.maps.MapTypeId.ROADMAP
			// };
			// return new google.maps.Map(document.getElementById("w3docs-map"), prop);
		// }
			
		function openModalZ() {
			var content = $('.content_maps').clone().html();
			
			// console.log(document.getElementById("w3docs-map"));
			
			$.confirm({
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				columnClass: 'col-md-12',
				buttons: {
					cancel: function () {
						//close
					},
				},
				onContentReady: function () {
					jc = this;
					
					var prop = {
						center: new google.maps.LatLng(51.508742, -0.120850),
						zoom: 10,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					map = new google.maps.Map(jc.$content.find('#w3docs-map')[0], prop);
					jc.$content.find('#w3docs-map').show();
					google.maps.event.trigger(map, 'resize');
					
					var infoWindow = new google.maps.InfoWindow;
					if (navigator.geolocation) {
						navigator.geolocation.getCurrentPosition(function(position) {
							var pos = {
								lat: position.coords.latitude,
								lng: position.coords.longitude
							};

							infoWindow.setPosition(pos);
							// infoWindow.setContent('Location found.');
							// infoWindow.open(map);
							map.setCenter(pos);		
						}, function() {
							handleLocationError(true, infoWindow, map.getCenter());
						});
					} else {
						// Browser doesn't support Geolocation
						handleLocationError(false, infoWindow, map.getCenter());
					}			
					
					//	create the ContextMenuOptions object
					var contextMenuOptions = {};
					contextMenuOptions.classNames = {
						menu: 'context_menu',
						menuSeparator: 'context_menu_separator'
					};

					//	create an array of ContextMenuItem objects
					var menuItems = [];
					menuItems.push({
						className: 'context_menu_item',
						eventName: 'zoom_in_click',
						label: 'Zoom in'
					});
					menuItems.push({
						className: 'context_menu_item',
						eventName: 'zoom_out_click',
						label: 'Zoom out'
					});
					menuItems.push({
						className: 'context_menu_item',
						eventName: 'center_map_click',
						label: 'Center map here'
					});
					//	a menuItem with no properties will be rendered as a separator
					menuItems.push({});
					menuItems.push({
						className: 'context_menu_item',
						eventName: 'get_latlng_click',
						label: 'Get Latitude and Longitude'
					});
					menuItems.push({});
					contextMenuOptions.menuItems = menuItems;

					//	create the ContextMenu object
					var contextMenu = new ContextMenu(map, contextMenuOptions);
					var geocoder = new google.maps.Geocoder();

					//	display the ContextMenu on a Map right click
					google.maps.event.addListener(map, 'rightclick', function(mouseEvent) {
						contextMenu.show(mouseEvent.latLng);
					});
					
					var input = jc.$content.find('#searchInput')[0];
					map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

					var autocomplete = new google.maps.places.Autocomplete(input);
					autocomplete.bindTo('bounds', map);
					
					var infowindow = new google.maps.InfoWindow();
					var marker = new google.maps.Marker({
						map: map,
						anchorPoint: new google.maps.Point(0, -29)
					});
					
					jc.$content.find('#searchInput').on("focus", function() {
						$(this).val('');
					});
					
					autocomplete.addListener('place_changed', function() {
						infowindow.close();
						marker.setVisible(false);
						var place = autocomplete.getPlace();
						console.log(place);
						if (!place.geometry) {
							window.alert("Autocomplete's returned place contains no geometry");
							return;
						}
				  
						// If the place has a geometry, then present it on a map.
						if (place.geometry.viewport) {
							map.fitBounds(place.geometry.viewport);
						} else {
							map.setCenter(place.geometry.location);
							map.setZoom(17);
						}
						marker.setIcon(({
							// url: place.icon,
							size: new google.maps.Size(71, 71),
							origin: new google.maps.Point(0, 0),
							anchor: new google.maps.Point(17, 34),
							scaledSize: new google.maps.Size(35, 35)
						}));
						marker.setPosition(place.geometry.location);
						// marker.setVisible(true);
					
						var address = '';
						if (place.address_components) {
							address = [
							  (place.address_components[0] && place.address_components[0].short_name || ''),
							  (place.address_components[1] && place.address_components[1].short_name || ''),
							  (place.address_components[2] && place.address_components[2].short_name || '')
							].join(' ');
						}
					
						// infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
						// infowindow.open(map, marker);
					  
						//Location details
						// for (var i = 0; i < place.address_components.length; i++) {
							// if(place.address_components[i].types[0] == 'postal_code'){
								// document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
							// }
							// if(place.address_components[i].types[0] == 'country'){
								// document.getElementById('country').innerHTML = place.address_components[i].long_name;
							// }
						// }
						// document.getElementById('location').innerHTML = place.formatted_address;
						// document.getElementById('lat').innerHTML = place.geometry.location.lat();
						// document.getElementById('lon').innerHTML = place.geometry.location.lng();
					});
					
					//	listen for the ContextMenu 'menu_item_selected' event
					google.maps.event.addListener(contextMenu, 'menu_item_selected', function(latLng, eventName) {
						infowindow.close();
						marker.setVisible(false);
						//	latLng is the position of the ContextMenu
						//	eventName is the eventName defined for the clicked ContextMenuItem in the ContextMenuOptions
						switch (eventName) {
							case 'zoom_in_click':
								map.setZoom(map.getZoom() + 1);
								break;
							case 'zoom_out_click':
								map.setZoom(map.getZoom() - 1);
								break;
							case 'get_latlng_click':
								geocoder.geocode({
									'latLng': latLng
								}, function(results, status) {
									if (status == google.maps.GeocoderStatus.OK) {
										if (results[0]) {
											var place = results[0];
											
											marker.setIcon(({
												// url: results[0].icon,
												size: new google.maps.Size(71, 71),
												origin: new google.maps.Point(0, 0),
												anchor: new google.maps.Point(17, 34),
												scaledSize: new google.maps.Size(35, 35)
											}));
											marker.setPosition(latLng);
											marker.setVisible(true);
										
											var address = '';
											if (place.address_components) {
												address = [
												  (place.address_components[0] && place.address_components[0].short_name || ''),
												  (place.address_components[1] && place.address_components[1].short_name || ''),
												  (place.address_components[2] && place.address_components[2].short_name || '')
												].join(' ');
											}
											
											for (var i=0; i<results[0].address_components.length; i++) {
												for (var b=0; b<results[0].address_components[i].types.length;b++) {

												//there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
													if (results[0].address_components[i].types[b] == "postal_code") {
														//this is the object you are looking for
														// document.getElementById('postal_code').innerHTML = results[0].address_components[i].long_name;
														postal_code = results[0].address_components[i].long_name;
														break;
													}
													if (results[0].address_components[i].types[b] == "country") {
														//this is the object you are looking for
														// document.getElementById('country').innerHTML = results[0].address_components[i].long_name;
														country = results[0].address_components[i].long_name;
														break;
													}
													
													// console.log(results[0].address_components[i].types[b]);
													if (results[0].address_components[i].types[b] == "administrative_area_level_4") {
														//this is the object you are looking for
														city= results[0].address_components[i];
														break;
													}
												}
											}
											
											// array.push({
												// address: results[0].formatted_address,
												// postal_code: postal_code,
												// city: city.short_name,
												// country: country,
												// latlng: latLng
											// });			

											// console.log(latLng.lat());
											// console.log(latLng.lng());
											
											$(".latitude").val(latLng.lat());
											$(".longitude").val(latLng.lng());
											
											jc.close();
											
											infowindow.setContent('<div><strong>' + results[0].formatted_address + '</strong>');
											infowindow.open(map, marker);
											
											// document.getElementById('location').innerHTML = place.formatted_address;
											// document.getElementById('lat').innerHTML = latLng.lat();
											// document.getElementById('lon').innerHTML = latLng.lng();
										}
									}
								});
							
								
								break;
							case 'center_map_click':
								map.panTo(latLng);
								break;
						}
					});
				}
			});
		}
		
		function createModal() {
			var content = $('.content_form').clone().html();
		
			var id_bank = $("#select_client").val();
			if(id_bank=="") {
				$.alert('Pilih data client/bank terlebih dahulu !');
				return false;
			}
		
			$.confirm({
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				columnClass: 'col-md-8 col-md-offset-2',
				buttons: {
					formSubmit: {
						text: 'Submit',
						btnClass: 'btn-blue',
						action: function () {
							var self = this;
							
							var url = self.$content.find('form')[0].action;
							var form = self.$content.find('form')[0];
							var formData = new FormData(form);
							formData.append('id_bank', id_bank);
							
							
							// var url = self.$content.find('form')[0].action;
							
							// var idatm = this.$content.find('#idatm').val();
							// var cabang = this.$content.find('#cabang').val();
							// var lokasi = this.$content.find('#lokasi').val();
							// var sn_mesin = this.$content.find('#sn_mesin').val();
							// var foto = this.$content.find('#foto').val();
							// var status = this.$content.find('#status').val();
							// var latitude = this.$content.find('#latitude').val();
							// var longitude = this.$content.find('#longitude').val();
							// var alamat = this.$content.find('#alamat').val();
							// // if(!name){
								// // $.alert('provide a valid name');
								// return false;
							// // }
							
							// var data = {
								// id: null,
								// id_bank: id_bank,
								// idatm: idatm,
								// cabang: cabang,
								// lokasi: lokasi,
								// sn_mesin: sn_mesin,
								// foto: foto,
								// status: status,
								// latitude: latitude,
								// longitude: longitude,
								// alamat: alamat
							// };
							
							// console.log(data);
							
							self.showLoading();
							
							$.ajax({
								url: url,
								dataType: 'html',
								method: 'post',
								processData: false,
								contentType: false,
								cache: false,
								data: formData,
								timeout: 3000,
							}).done(function (response) {
								// self.buttons.formSubmit.hide();
								// self.buttons.cancel.hide();
								// self.close();
								
								console.log(response);
								if(response=="success") {
									self.close();
									$.confirm({
										title: false,
										content: 'SUCCESS',
										autoClose: 'ok|1000',
										buttons: {
											ok: function () {
												
											}
										}
									});
									
									table.ajax.reload( null, false );
								} else {
									self.hideLoading();
									$.alert('Something wrong!');
								}
							}).fail(function(){
								self.hideLoading();
								$.alert('Something went wrong.');
							});
							
							return false;
						}
					},
					cancel: function () {
						//close
					},
				},
				onContentReady: function () {
					// bind to events
					var jc = this;
					this.$content.find('.name').focus();
					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
					});
				}
			});
		}
		
		function updateModal(id, id_bank, idatm, cabang, lokasi, sn_mesin, status, latitude, longitude, alamat, merk_mesin, type_mesin, foto_atm) {
			// $.alert(id+' '+id_bank+' '+idatm+' '+cabang+' '+lokasi+' '+sn_mesin+' '+status+' '+alamat);
			var content = $('.content_form').clone().html();
		
			$.confirm({
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				columnClass: 'col-md-8 col-md-offset-2',
				buttons: {
					formSubmit: {
						text: 'Submit',
						btnClass: 'btn-blue',
						action: function () {
							var self = this;
							
							var url = self.$content.find('form')[0].action;
							var form = self.$content.find('form')[0];
							var formData = new FormData(form);
							formData.append('id', id);
							formData.append('id_bank', id_bank);
							formData.append("old_image", foto_atm);
							
							// var idatm = this.$content.find('#idatm').val();
							// var cabang = this.$content.find('#cabang').val();
							// var lokasi = this.$content.find('#lokasi').val();
							// var sn_mesin = this.$content.find('#sn_mesin').val();
							// var foto = this.$content.find('#foto').val();
							// var status = this.$content.find('#status').val();
							// var latitude = this.$content.find('#latitude').val();
							// var longitude = this.$content.find('#longitude').val();
							// var alamat = this.$content.find('#alamat').val();
							// // if(!name){
								// // $.alert('provide a valid name');
								// // return false;
							// // }
							
							// var data = {
								// id: id,
								// id_bank: id_bank,
								// idatm: idatm,
								// cabang: cabang,
								// lokasi: lokasi,
								// sn_mesin: sn_mesin,
								// foto: foto,
								// status: status,
								// latitude: latitude,
								// longitude: longitude,
								// alamat: alamat
							// };
							
							// console.log(data);
							
							self.showLoading();
							
							$.ajax({
								url: url,
								dataType: 'html',
								method: 'post',
								processData: false,
								contentType: false,
								cache: false,
								data: formData,
								timeout: 3000,
							}).done(function (response) {
								// self.buttons.formSubmit.hide();
								// self.buttons.cancel.hide();
								// self.close();
								
								console.log(response);
								if(response=="success") {
									self.close();
									$.confirm({
										title: false,
										content: 'SUCCESS',
										autoClose: 'ok|1000',
										buttons: {
											ok: function () {
												
											}
										}
									});
									
									table.ajax.reload( null, false );
								} else {
									self.hideLoading();
									$.alert('Something wrong!');
								}
							}).fail(function(){
								self.hideLoading();
								$.alert('Something went wrong.');
							});
							
							return false;
						}
					},
					cancel: function () {},
				},
				onContentReady: function () {
					// bind to events
					var jc = this;
					jc.$content.find('#idatm').val(idatm);
					jc.$content.find('#cabang').val(cabang);
					jc.$content.find('#lokasi').val(lokasi);
					jc.$content.find('#merk_mesin').val(merk_mesin);
					jc.$content.find('#type_mesin').val(type_mesin);
					jc.$content.find('#sn_mesin').val(sn_mesin);
					jc.$content.find('#status').val(status);
					jc.$content.find('#latitude').val(latitude);
					jc.$content.find('#longitude').val(longitude);
					jc.$content.find('#alamat').val(alamat);
					
					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
					});
				}
			});
		}
		
		function deleteAction(url) {
			$.confirm({
				title: 'Delete data?',
				content: 'This dialog will automatically trigger \'cancel\' in 6 seconds if you don\'t respond.',
				autoClose: 'cancel|8000',
				buttons: {
					delete: {
						text: 'delete',
						keys: ['enter'],
						action: function () {
							$.ajax({
								url: url,
								dataType: 'html',
								timeout: 3000,
							}).done(function (response) {
								
								if(response=="SUCCESS") {
									table.ajax.reload( null, false );
								}
							}).fail(function(){
								self.hideLoading();
								$.alert('Something went wrong.');
							});
						}
					},
					cancel: function () {
						
					}
				}
			});
		}
		
		function openPicture(idatm, val) {
			$.confirm({
				title: idatm,
				content: '<img src="'+val+'" width="100%">',
				animation: 'scale',
				animationClose: 'top',
				buttons: {
					close: function(){
						// lets the user close the modal.
					}
				},
			});
		}
		

		// load related plugins
		
		loadScript("<?=BASE_URL?>js/plugin/datatables/jquery.dataTables.min.js", function(){
			loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.colVis.min.js", function(){
				loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.tableTools.min.js", function(){
					loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.bootstrap.min.js", function(){
						loadScript("<?=base_url()?>seipkon/assets/jqueryconfirm/dist/jquery-confirm.min.js", function(){
							loadScript("<?=BASE_URL?>js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
						});
					});
				});
			});
		});


	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\atmserv-assindo\coresys\views/pages/maps/index.blade.php ENDPATH**/ ?>