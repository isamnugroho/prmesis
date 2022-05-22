@extends('layouts.coba2')

@section('content')
	<table>
		<tr>
			<td><button class="small button green" id="button" onclick="execute()">Refresh Jurnal</button> </td>
			<td width="10px"></td>
			<td><span id="result"></span></td>
		</tr>
	</table>
@endsection

@section('javascript')
	<script type="text/javascript">
		function execute() {
			// setTimeout("delete_sync()",500);
			
			document.getElementById('button').setAttribute("disabled","disabled");
			document.getElementById("result").innerHTML = "Progress : "+percen+"%";
			setTimeout("proses_sync()",500);
			
			// var xhr = $.ajax({
				// type: "POST",
				// url: 'https://hackthestuff.com/',
				// data: '',
				// success: function(resp) {
				   // alert(resp);
				// }
			// });

			// // cancel request after 1 second
			// setTimeout(function() {
				// xhr.abort();
				// alert("Request canceled."); 
			// }, 1000);
		}
		
		// function check_sync() {
			// document.getElementById("result").innerHTML = "Initializing...";
			// $.ajax({
				// url: '<?=base_url()?>/coba/check_sync',
				// dataType: 'html',
				// type: 'GET',
				// data: {},
				// success: function(data) {
					// total = 0;
					// console.clear();
					// console.log("DONE");
					// document.getElementById("result").innerHTML = "Please wait...";
				// }
			// });
		// }
		

		
		var total = 0;
		var percen = 0;
		function proses_sync(page=0) {
			// tabless.draw();
			$.ajax({
				url: '<?=base_url()?>coba/proses_sync?page='+page,
				dataType: 'html',
				type: 'GET',
				data: {},
				success: function(data) {
					res = JSON.parse(data);
					console.log(res);
					
					if(total==0) {
						total = res.total;
					}
					if(res.total!==res.page && res.page!=="done") {
						page = res.page;
						setTimeout("proses_sync('"+page+"')",10);
					}

					percen = (res.page/res.total)*100;
					console.log(total+" "+(res.total*-1)+" "+((total*-1)+res.total))
					document.getElementById("result").innerHTML = percen.toFixed(2)+"%";
					percen = isNaN(percen) ? 100 : percen.toFixed(2);
					console.log(percen);
					document.getElementById("result").innerHTML = "Progress : "+percen+"%";
					
					if(percen==100) {
						document.getElementById('button').removeAttribute("disabled");
						// window.location.reload();
					}
				}
			});
		}
		
		function delete_sync() {
			document.getElementById("result").innerHTML = "Initializing...";
			$.ajax({
				url: '<?=rest_api()?>/table/delete_sync',
				dataType: 'html',
				type: 'GET',
				data: {},
				success: function(data) {
					total = 0;
					console.clear();
					console.log("DONE");
					document.getElementById("result").innerHTML = "Please wait...";
				}
			});
		}
	</script>
@endsection