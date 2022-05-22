<?php $__env->startSection('content'); ?>
	<?php 
		// print_r($post);
	?>
	
	<h1>IMPL</h1>
	<form method='post' action='<?=base_url()?>coba/index'>
		<select name='impl'>
			<option value='get_current_location' <?php if($post['impl']=="get_current_location") echo "selected"; ?>>GET CURRENT LOCATION</option>
			<option value='get_version' <?php if($post['impl']=="get_version") echo "selected"; ?>>GET CURRENT VERSION</option>
		</select>
		<select name='id'>
			<?php 
				foreach($result as $r) {
					if($r->token!=="mozilla/5.0 (windows nt 10.0; win64; x64; rv:71.0) gecko/20100101 firefox/71.0" || $r->token!=="") {
						if($post['id']==$r->id) {
							echo "<option value='$r->id' selected>$r->nama</option>";
						} else {
							echo "<option value='$r->id'>$r->nama</option>";
						}
					}
				}
			?>
		</select>
		<input type='submit' name="submit" value='SUBMIT'></input>
	</form>
	
	<div id="w3docs-map" class="w3docs-map" style="width: 100%;height: 480px;"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAb7d-G5Ea9j3X_haj37bSPJkSN7PpAp7I&libraries=places"></script>
	<script type="text/javascript" src="<?=base_url()?>seipkon/assets/ContextMenu.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-analytics.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js"></script>
	<script type="text/javascript">
		var map;
		var myVar;
		var marker;
		
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

				marker = new google.maps.Marker({
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
		};
	</script>
	
	<script>
		MsgElem = document.getElementById("msg");
		TokenElem = document.getElementById("token");
		NotisElem = document.getElementById("notis");
		ErrElem = document.getElementById("err");
		// Initialize Firebase
		// TODO: Replace with your project's customized code snippet
		var config = {
			'messagingSenderId': '48481771203',
			'apiKey': 'AIzaSyAq_MFpZ4cvYbAWMTeOpr6Ato4hbGLgd6I',
			'projectId': 'assindo-27686',
			'appId': '1:48481771203:web:8d820884e4a2b2bf3acc76',
		};
		firebase.initializeApp(config);

		const messaging = firebase.messaging();
		messaging
			.requestPermission()
			.then(function () {
				MsgElem.innerHTML = "Notification permission granted." 
				console.log("Notification permission granted.");
				
				// get the token in the form of promise
				return messaging.getToken()
			})
			.then(function(token) {
				TokenElem.innerHTML = token
			})
			.catch(function (err) {
				ErrElem.innerHTML =  ErrElem.innerHTML + "; " + err
				console.log("Unable to get permission to notify.", err);
			});

		let enableForegroundNotification = true;
		messaging.onMessage(function(payload) {
			console.log("Message received. ", JSON.parse(payload.data.notification).title);
			// alert(payload.data.notification)
			// NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload);
			NotisElem.innerHTML = JSON.parse(payload.data.notification).body;
			// notify_with_value(JSON.parse(payload.data.notification).title, JSON.parse(payload.data.notification).body);
		
			if(JSON.parse(payload.data.notification).title=="get_current_location") {
				pagefunction();
				var siteLatLng = new google.maps.LatLng(JSON.parse(JSON.parse(payload.data.notification).body).lat, JSON.parse(JSON.parse(payload.data.notification).body).lng);
					
				marker = new google.maps.Marker({
					icon: "<?=base_url()?>assets/icon/motorcycle1.png",
					position: siteLatLng,
					map: map,
					// Markers drop on the map
					animation: google.maps.Animation.DROP
				});
				marker.setPosition(siteLatLng);
				map.setZoom(13);
				map.setCenter(siteLatLng);
				map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
			}

			if(enableForegroundNotification) {
				const {title, ...options} = JSON.parse(payload.data.notification);
				navigator.serviceWorker.getRegistrations().then(registration => {
					registration[0].showNotification(title, options);
				});
			}
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.coba', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\bridnins\coresys\views/coba.blade.php ENDPATH**/ ?>