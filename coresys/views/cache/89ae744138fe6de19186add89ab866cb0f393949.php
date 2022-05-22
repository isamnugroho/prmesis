<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title>PROTOTYPE</title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	</head>
	
	<body class="fixed-header fixed-navigation fixed-page-footer">
		<br>
		<br>
		<table>
			<tr>
				<td>TOKEN</td>
				<td> : </td>
				<td><div id="token"></div></td>
			</tr>
			<tr>
				<td>MSG</td>
				<td> : </td>
				<td><div id="msg"></div></td>
			</tr>
			<tr>
				<td>NOTIS</td>
				<td> : </td>
				<td><div id="notis"></div></td>
			</tr>
			<tr>
				<td>ERROR</td>
				<td> : </td>
				<td><div id="err"></div></td>
			</tr>
		</table>
		
		<?php echo $__env->yieldContent('content'); ?>

		
		<script src="<?=BASE_URL?>js/libs/jquery-2.1.1.min.js"></script>
		<script src="<?=BASE_URL?>js/libs/jquery-ui-1.10.3.min.js"></script>
		
		<?php echo $__env->yieldContent('javascript'); ?>
		
		
		
		
		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">
			$.sound_path = "<?=BASE_URL?>sound/";
			$.sound_on = true; 
		
			function notify() {
				$.smallBox({
					title : "James Simmons liked your comment",
					content : "<i class='fa fa-clock-o'></i> <i>2 seconds ago...</i>",
					color : "#296191",
					iconSmall : "fa fa-thumbs-up bounce animated",
					timeout : 4000
				});
			}
		
			function notify_with_value(title, body) {
				// $.smallBox({
					// title : title,
					// content : body,
					// color : "#296191",
					// iconSmall : "fa fa-thumbs-up bounce animated",
					// timeout : 5000
				// });
				$.bigBox({
					title : title,
					content : body,
					color : "#3276B1",
					// timeout: 3000,
					icon : "fa fa-bell swing animated",
					// number : "1"	
				});
			}
			
			function notify_sound() {
				$.bigBox({
					title : "Big Information box",
					content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
					color : "#3276B1",
					timeout: 3000,
					icon : "fa fa-bell swing animated",
					number : "2"
				});
			}
		</script>
		
		<script>
			$.get("<?=base_url()?>notification/get_count", function(data) {
				var data = JSON.parse(data);
				$("#my_notify").html(data.count_all);
				$("#my_notify_ticket").html(data.count_ticket);
				$("#my_notify_costing").html(data.count_costing);
				$("#last_update").html(data.last_update);
				
				$this = $("#activity > .badge");
				$this.addClass("bg-color-red bounceIn animated");
			});
			
			$("#reloading_notif").on("click", function() {
				$.get("<?=base_url()?>notification/get_count", function(data) {
					var data = JSON.parse(data);
					$("#my_notify").html(data.count_all);
					$("#my_notify_ticket").html(data.count_ticket);
					$("#my_notify_costing").html(data.count_costing);
					$("#last_update").html(data.last_update);
					
					$this = $("#activity > .badge");
					$this.addClass("bg-color-red bounceIn animated");
				});
				
				var tes = $(this).closest("div").prev().next(".ajax-dropdown").find(".btn-group > .active > input").attr("id");
				if(tes!==undefined) {
					container = $(".ajax-notifications"), loadURL(tes,container);
				}
			});
			
			function read_notif(url) {
				$.ajax({
					url: url,
					dataType: 'html',
					timeout: 3000,
				}).done(function (response) {
					data = JSON.parse(response);
					// alert(data.url);
					// window.location.href = response;
					$.redirect(data.url, {
						id: data.id,
					}, "POST");
				}).fail(function(){
					self.hideLoading();
					$.alert('Something went wrong.');
				});
			}
			
			// $("#activity").click(function(a){var b=$(this);b.find(".badge").hasClass("bg-color-red"),b.next(".ajax-dropdown").is(":visible")?(b.next(".ajax-dropdown").fadeOut(150),b.removeClass("active")):(b.next(".ajax-dropdown").fadeIn(150),b.addClass("active"));var c=b.next(".ajax-dropdown").find(".btn-group > .active > input").attr("id");b=null,c=null,a.preventDefault()}),$('input[name="activity"]').change(function(){var a=$(this);url=a.attr("id"),container=$(".ajax-notifications"),loadURL(url,container),a=null})
		</script>

		<script type="text/javascript">
			// var _gaq = _gaq || [];
			// _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
			// _gaq.push(['_trackPageview']);

			// (function() {
				// var ga = document.createElement('script');
				// ga.type = 'text/javascript';
				// ga.async = true;
				// ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				// var s = document.getElementsByTagName('script')[0];
				// s.parentNodeertBefore(ga, s);
			// })();

		</script>

	</body>

</html><?php /**PATH D:\DEV_SERVER\htdocs\atmserv\coresys\views/layouts/coba.blade.php ENDPATH**/ ?>