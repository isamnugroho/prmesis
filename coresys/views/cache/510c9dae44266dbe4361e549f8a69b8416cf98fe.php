<?php $__env->startSection('stylesheet'); ?>
<style>
.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 360px;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Widget ID (each widget will need unique ID)-->
<div class="jarviswidget" id="wid-id-5" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">

<header style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
<span class="widget-icon"><img style="float: left; margin: 8px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/userguide.png" height="18" width="18" /></span>
	<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>CRO Documentation - Cash Replanish</b></h2>
</header>
<!-- widget div-->
<div>

<!-- widget edit box -->
<div class="jarviswidget-editbox">
<!-- This area used as dropdown edit box -->

</div>
<!-- end widget edit box -->

<!-- widget content -->
<div class="widget-body no-padding">
	<iframe class="responsive-iframe" src="http://localhost/2021/JUL-W1/BRIDNINS/fdsinternal/" style="border:none; margin: 0px 0px 0px 0px;">
	</iframe>	
</div>
<!-- end widget content -->

</div>
<!-- end widget div -->

</div>
<!-- end widget -->
<?php $__env->stopSection(); ?>			

<?php $__env->startSection('javascript'); ?>			
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

	// PAGE RELATED SCRIPTS
	
	function tes(iframe, ip) {
		var iframe = $("#"+iframe)[0];
		
		// console.log("#"+iframe);
		console.log(iframe);
		// console.log(iframe.contentDocument());
		// console.log(iframe.contentWindow());
		
		try {
			console.log("AAA "+ip)
			if ( iframe.innerHTML() ) {
				console.log("BBB")
			}
		} catch {			
			// console.log("CCC "+ip)
		}
		// document.getElementById(iframe).src = "http://"+ip+"/fdsatm/";
		// console.log(iframe);
		// if ( iframe.innerHTML() ) {
			// // get and check the Title (and H tags if you want)
			// var ifTitle = iframe.contentDocument.title;
			// if ( ifTitle.indexOf("404")>=0 ) {
				// // we have a winner! probably a 404 page!
				// alert("AAA");
			// }
		// } else {
			// // didn't load
			// alert("BBB");
		// }
	}
	
	function load_iframe(ip) {
		alert(ip);
		// var iframe = $("#iframe")[0];
		// iframe.src = "http://"+ip+"/fdsatm/";
		// if ( iframe.innerHTML() ) {
			// // get and check the Title (and H tags if you want)
			// var ifTitle = iframe.contentDocument.title;
			// if ( ifTitle.indexOf("404")>=0 ) {
				// // we have a winner! probably a 404 page!
				// alert("AAA");
			// }
		// } else {
			// // didn't load
			// alert("BBB");
		// }
	}

	function noAnswer() {

		$.smallBox({
			title : "Sure, as you wish sir...",
			content : "",
			color : "#A65858",
			iconSmall : "fa fa-times",
			timeout : 5000
		});

	};
	
	function closedthis() {
		$.smallBox({
			title : "Great! You just closed that last alert!",
			content : "This message will be gone in 5 seconds!",
			color : "#739E73",
			iconSmall : "fa fa-cloud",
			timeout : 5000
		});
	};		

	// pagefunction
	
	var pagefunction = function() {

		/*
		 * Autostart Carousel
		 */
		$('.carousel.slide').carousel({
			interval : 3000,
			cycle : true
		});
		$('.carousel.fade').carousel({
			interval : 3000,
			cycle : true
		});
		
		// Fill all progress bars with animation
		$('.progress-bar').progressbar({
			display_text : 'fill'
		});

		/*
		 * Smart Notifications
		 */
		$('#eg1').click(function(e) {
	
			$.bigBox({
				title : "Big Information box",
				content : "This message will dissapear in 6 seconds!",
				color : "#C46A69",
				//timeout: 6000,
				icon : "fa fa-warning shake animated",
				number : "1",
				timeout : 6000
			});
	
			e.preventDefault();
	
		})
	
		$('#eg2').click(function(e) {
	
			$.bigBox({
				title : "Big Information box",
				content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
				color : "#3276B1",
				//timeout: 8000,
				icon : "fa fa-bell swing animated",
				number : "2"
			});
	
			e.preventDefault();
		})
	
		$('#eg3').click(function(e) {
	
			$.bigBox({
				title : "Shield is up and running!",
				content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
				color : "#C79121",
				//timeout: 8000,
				icon : "fa fa-shield fadeInLeft animated",
				number : "3"
			});
	
			e.preventDefault();
	
		})
	
		$('#eg4').click(function(e) {
	
			$.bigBox({
				title : "Success Message Example",
				content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
				color : "#739E73",
				//timeout: 8000,
				icon : "fa fa-check",
				number : "4"
			}, function() {
				closedthis();
			});
	
			e.preventDefault();
	
		})
	
		$('#eg5').click(function() {
	
			$.smallBox({
				title : "Ding Dong!",
				content : "Someone's at the door...shall one get it sir? <p class='text-align-right'><a href='javascript:void(0);' class='btn btn-primary btn-sm'>Yes</a> <a href='javascript:void(0);'  onclick='noAnswer();' class='btn btn-danger btn-sm'>No</a></p>",
				color : "#296191",
				//timeout: 8000,
				icon : "fa fa-bell swing animated"
			});
	
		});
	
		$('#eg6').click(function() {
	
			$.smallBox({
				title : "Big Information box",
				content : "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
				color : "#5384AF",
				//timeout: 8000,
				icon : "fa fa-bell"
			});
	
		})
	
		$('#eg7').click(function() {
	
			$.smallBox({
				title : "James Simmons liked your comment",
				content : "<i class='fa fa-clock-o'></i> <i>2 seconds ago...</i>",
				color : "#296191",
				iconSmall : "fa fa-thumbs-up bounce animated",
				timeout : 4000
			});
	
		})
	
		/*
		* SmartAlerts
		*/
		
		// With Callback
		
		$("#smart-mod-eg1").click(function(e) {
			$.SmartMessageBox({
				title : "Smart Alert!",
				content : "This is a confirmation box. Can be programmed for button callback",
				buttons : '[No][Yes]'
			}, function(ButtonPressed) {
				if (ButtonPressed === "Yes") {
	
					$.smallBox({
						title : "Callback function",
						content : "<i class='fa fa-clock-o'></i> <i>You pressed Yes...</i>",
						color : "#659265",
						iconSmall : "fa fa-check fa-2x fadeInRight animated",
						timeout : 4000
					});
				}
				if (ButtonPressed === "No") {
					$.smallBox({
						title : "Callback function",
						content : "<i class='fa fa-clock-o'></i> <i>You pressed No...</i>",
						color : "#C46A69",
						iconSmall : "fa fa-times fa-2x fadeInRight animated",
						timeout : 4000
					});
				}
	
			});
			e.preventDefault();
		})
		
		// With Input
		$("#smart-mod-eg2").click(function(e) {
	
			$.SmartMessageBox({
				title : "Smart Alert: Input",
				content : "Please enter your user name",
				buttons : "[Accept]",
				input : "text",
				placeholder : "Enter your user name"
			}, function(ButtonPress, Value) {
				alert(ButtonPress + " " + Value);
			});
	
			e.preventDefault();
		})
		
		// With Buttons
		$("#smart-mod-eg3").click(function(e) {
	
			$.SmartMessageBox({
				title : "Smart Notification: Buttons",
				content : "Lots of buttons to go...",
				buttons : '[Need?][You][Do][Buttons][Many][How]'
			});
	
			e.preventDefault();
		})
		
		// With Select
		$("#smart-mod-eg4").click(function(e) {
	
			$.SmartMessageBox({
				title : "Smart Alert: Select",
				content : "You can even create a group of options.",
				buttons : "[Done]",
				input : "select",
				options : "[Costa Rica][United States][Autralia][Spain]"
			}, function(ButtonPress, Value) {
				alert(ButtonPress + " " + Value);
			});
	
			e.preventDefault();
		});
	
		// With Login
		$("#smart-mod-eg5").click(function(e) {
	
			$.SmartMessageBox({
				title : "Login form",
				content : "Please enter your user name",
				buttons : "[Cancel][Accept]",
				input : "text",
				placeholder : "Enter your user name"
			}, function(ButtonPress, Value) {
				if (ButtonPress == "Cancel") {
					alert("Why did you cancel that? :(");
					return 0;
				}
	
				Value1 = Value.toUpperCase();
				ValueOriginal = Value;
				$.SmartMessageBox({
					title : "Hey! <strong>" + Value1 + ",</strong>",
					content : "And now please provide your password:",
					buttons : "[Login]",
					input : "password",
					placeholder : "Password"
				}, function(ButtonPress, Value) {
					alert("Username: " + ValueOriginal + " and your password is: " + Value);
				});
			});
	
			e.preventDefault();
		});
		
	};
	
	// end pagefunction
	
	// load bootstrap-progress bar script and run pagefunction
	loadScript("<?=BASE_URL?>js/plugin/bootstrap-progressbar/bootstrap-progressbar.min.js", pagefunction);

</script>
<script type="text/javascript">
$ = jq341;
var ON_TIMEOUT   = 0;   // time until next 'all on', calculated
var LED_TIMEOUT  = 90;  // timeout for each led to turn off
var OFF_DELAY    = 390; // timeout for leds turning off

$(function() {
  var leds = [];
  
  ON_TIMEOUT = OFF_DELAY;
  $("div.led").each(function() {
    ON_TIMEOUT += LED_TIMEOUT * 2;
    leds.push(this);
  });
 
  $.each(leds, function() {
    $(this).addClass("off");

    // Instead of setInterval, this timer starts immediately.
    (function() {
      var startTimeout = LED_TIMEOUT;
      for(var index = (leds.length - 1); index >= 0; index--) {
        var $led = $(leds[index]);
        $led.removeClass("off");
        
        (function() {
          // grabbing the upvalue... 
          var $led2 = $led;
          setTimeout(function() {
            $led2.addClass("off");
          }, startTimeout + OFF_DELAY);
        }());
        
        startTimeout += LED_TIMEOUT;
      }
      
      setTimeout(arguments.callee, ON_TIMEOUT);
    }());
  });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\2021\JUL-W1\BRIDNINS\coresys\views/pages/doccro_cc/index.blade.php ENDPATH**/ ?>