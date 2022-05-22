<div id="data_content">
	<style>
		.tablex td, .tablex th {  
			border: 1px solid #ddd;
			text-align: left;
			padding: 15px;
		}

		.tablex  {
			border-collapse: collapse;
			width: 100%;
		}
	</style>
	<?php 
		foreach($data_run as $d) { 
	?>
			<div class="wrapper" style="width: 40%">
				<table class="table tablex">
					<thead>			                
						<tr>
							<th>ID RUN</th>
							<th>RUN NUMBER</th>
							<th>PLAN</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?=$d->id?></td>
							<td>RUN - <?=$d->run_number?></td>
							<td>H - <?=$d->h_min?></td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<div class="view" style="margin-bottom: 20px">
				<div class="wrapper" style="margin-top: -20px">
					<table class="table tablex" style="width: 100%">
						<thead>
							<tr>
								<th style="text-align: center" class="sticky-col first-col">No</th>
								<th style="text-align: center">ID ATM</th>
								<th style="text-align: center">Lokasi</th>
								<th style="text-align: center">Jumlah</th>
								<th style="text-align: center">Status</th>
								<th style="text-align: center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$no = 0;
								foreach($data_run_detail($d->id) as $r) {
									$no++;
							?>
									<tr>
										<td style="text-align: center" class="sticky-col first-col"><?=$no?></td>
										<td style="text-align: center"><?=$r->idatm?></td>
										<td style="text-align: center"><?=$r->lokasi?></td>
										<td style="text-align: center">Rp. <?=number_format($r->nominal, 0, ",", ".")?></td>
										<td style="text-align: center"><?php
											if($r->status=="on_progress") {
												echo "ON PROGRESS";
											} else if($r->status=="done_replenish") {
												echo "DONE REPLENISH";
											} else if($r->status=="done_collection") {
												echo "DONE COLLECTION";
											} else {
												echo "DONE";
											}
										?></td>
										<td style="text-align: center">Action</td>
									</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
	<?php
		}
	?>
</div><?php /**PATH D:\DEV_SERVER\htdocs\bridnins\coresys\views/pages/cro_all_runsheets/show.blade.php ENDPATH**/ ?>