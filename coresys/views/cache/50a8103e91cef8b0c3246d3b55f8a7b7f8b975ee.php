<div id="data_content">
	<style>
		* {
			box-sizing: border-box;
		}

		html {
			font-family: helvetica;
		}

		html,
		body {
			max-width: 100vw;
		}

		.table_recon {
			margin: auto;
			border-collapse: collapse;
			overflow-x: auto;
			display: block;
			width: fit-content;
			max-width: 100%;
			box-shadow: 0 0 1px 1px rgba(0, 0, 0, .1);
			
		}

		.table_recon td,
		.table_recon th {
			border: solid rgb(200, 200, 200) 1px;
			padding: .5rem;
			font-size: 12px;
			
		}

		.table_recon th {
			text-align: left;
			background-color: rgb(190, 220, 250);
			text-transform: uppercase;
			border: rgb(50, 50, 100) solid 1px;
			border-top: none;
			text-align: center;
		}

		.table_recon td {
			white-space: nowrap;
			border-bottom: none;
			color: rgb(20, 20, 20);
			border: rgb(50, 50, 100) solid 1px;
		}

		.table_recon td:first-of-type,
		.table_recon th:first-of-type {
			border-left: none;
		}

		.table_recon td:last-of-type,
		.table_recon th:last-of-type {
			border-right: none;
		}
		
		.table_recon tfoot td {
			border: rgb(50, 50, 100) solid 2px;
		}
	</style>
	<page size="A4">
		<div class="wrapper">
			<table class="table_recon">
				<thead>
					<tr>
						<th style="vertical-align: middle" rowspan="4">NO</th>
						<th style="vertical-align: middle" rowspan="4">ATM ID</th>
						<th style="vertical-align: middle" rowspan="4">Lokasi</th>
						<th style="vertical-align: middle" colspan="29">REKONSILIASI</th>
						<th style="vertical-align: middle" rowspan="4">Counter<br>(khusus CRM)<br>(x1000)</th>
						<th style="vertical-align: middle" rowspan="2">Selisih</th>
						<th style="vertical-align: middle" rowspan="4">Time</th>
						<th style="vertical-align: middle" colspan="4">PENGISIAN BERIKUTNYA</th>
						<th style="vertical-align: middle" rowspan="4" width="10%">KET <br>NAIK/TURUN LIMIT</th>
					</tr>
					<tr>
						<th style="vertical-align: middle" colspan="5">PENGISIAN SEBELUMNYA</th>
						<th style="vertical-align: middle" colspan="13">PERHITUNGAN FISIK UANG</th>
						<th style="vertical-align: middle" colspan="11">PERHITUNGAN DISPENSED COUNTER</th>
						<th style="vertical-align: middle" rowspan="3">Jml Csst</th>
						<th style="vertical-align: middle" rowspan="2" colspan="2">Jml Isi</th>
						<th style="vertical-align: middle" rowspan="4">Total</th>
					</tr>
					<tr>
						<th style="vertical-align: middle"rowspan="2">TANGGAL</th>
						<th style="vertical-align: middle"width="200px" colspan="4">JML ISI</th>
						<th style="vertical-align: middle"colspan="2">CSST 1</th>
						<th style="vertical-align: middle"colspan="2">CSST 2</th>
						<th style="vertical-align: middle"colspan="2">CSST 3</th>
						<th style="vertical-align: middle"colspan="2">CSST 4</th>
						<th style="vertical-align: middle"colspan="2">CSST 5</th>
						<th style="vertical-align: middle"colspan="2">RJT.</th>
						<th style="vertical-align: middle">TOTAL RP</th>
						<th style="vertical-align: middle"colspan="2">CSST 1</th>
						<th style="vertical-align: middle"colspan="2">CSST 2</th>
						<th style="vertical-align: middle"colspan="2">CSST 3</th>
						<th style="vertical-align: middle"colspan="2">CSST 4</th>
						<th style="vertical-align: middle"colspan="2">RJT.</th>
						<th style="vertical-align: middle">TOTAL RP</th>
						<th style="vertical-align: middle">TOTAL RP</th>
					</tr>
					<tr>
						<th style="vertical-align: middle"  colspan="2">50</th>
						<th style="vertical-align: middle" colspan="2">100</th>
						<th style="vertical-align: middle">50</th>
						<th style="vertical-align: middle">100</th>
						<th style="vertical-align: middle">50</th>
						<th style="vertical-align: middle">100</th>
						<th style="vertical-align: middle">50</th>
						<th style="vertical-align: middle">100</th>
						<th style="vertical-align: middle">50</th>
						<th style="vertical-align: middle">100</th>
						<th style="vertical-align: middle">50</th>
						<th style="vertical-align: middle">100</th>
						<th style="vertical-align: middle">50</th>
						<th style="vertical-align: middle">100</th>
						<th style="vertical-align: middle">(x1,000)</th>
						<th style="vertical-align: middle">50</th>
						<th style="vertical-align: middle">100</th>
						<th style="vertical-align: middle">50</th>
						<th style="vertical-align: middle">100</th>
						<th style="vertical-align: middle">50</th>
						<th style="vertical-align: middle">100</th>
						<th style="vertical-align: middle">50</th>
						<th style="vertical-align: middle">100</th>
						<th style="vertical-align: middle">50</th>
						<th style="vertical-align: middle">100</th>
						<th style="vertical-align: middle">(x1,000)</th>
						<th style="vertical-align: middle">(x1,000)</th>
						<th style="vertical-align: middle">50</th>
						<th style="vertical-align: middle">100</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 0;
						foreach($data_run as $r) {
							$no++;
							
							$csst_1 = explode(";", $r->cassette_1);
							$csst_2 = explode(";", $r->cassette_2);
							$csst_3 = explode(";", $r->cassette_3);
							$csst_4 = explode(";", $r->cassette_4);
							$csst_5 = explode(";", $r->cassette_5);
							
							$isi_50 = ($csst_1[0]==50 ? $csst_1[1] : 0) +
									  ($csst_2[0]==50 ? $csst_2[1] : 0) +
									  ($csst_3[0]==50 ? $csst_3[1] : 0) +
									  ($csst_4[0]==50 ? $csst_4[1] : 0) +
									  ($csst_5[0]==50 ? $csst_5[1] : 0);
							$isi_100 = ($csst_1[0]==100 ? $csst_1[1] : 0) +
									   ($csst_2[0]==100 ? $csst_2[1] : 0) +
									   ($csst_3[0]==100 ? $csst_3[1] : 0) +
									   ($csst_4[0]==100 ? $csst_4[1] : 0) +
									   ($csst_5[0]==100 ? $csst_5[1] : 0);
									   
							$cpc_process = json_decode($r->cpc_process, true);
							
							$value_total = intval($cpc_process['cassette_1'][50]) * 50 +
										   intval($cpc_process['cassette_2'][50]) * 50 +
										   intval($cpc_process['cassette_3'][50]) * 50 +
										   intval($cpc_process['cassette_4'][50]) * 50 +
										   intval($cpc_process['cassette_5'][50]) * 50 +
										   intval($cpc_process['divert'][50]) * 50 +
										   intval($cpc_process['cassette_1'][100]) * 100 +
										   intval($cpc_process['cassette_2'][100]) * 100 +
										   intval($cpc_process['cassette_3'][100]) * 100 +
										   intval($cpc_process['cassette_4'][100]) * 100 +
										   intval($cpc_process['cassette_5'][100]) * 100 +
										   intval($cpc_process['divert'][100]) * 100;
					?>
							<tr>
								<td><?=$no?></td>
								<td><?=$r->idatm?></td>
								<td><?=$r->lokasi?></td>
								<td><?=$r->date?></td>
								<td><?=$isi_50?></td>
								<td><?=($isi_50*50)?></td>
								<td><?=$isi_100?></td>
								<td><?=($isi_100*100)?></td>
								<td><?=intval($cpc_process['cassette_1'][50])?></td>
								<td><?=intval($cpc_process['cassette_1'][100])?></td>
								<td><?=intval($cpc_process['cassette_2'][50])?></td>
								<td><?=intval($cpc_process['cassette_2'][100])?></td>
								<td><?=intval($cpc_process['cassette_3'][50])?></td>
								<td><?=intval($cpc_process['cassette_3'][100])?></td>
								<td><?=intval($cpc_process['cassette_4'][50])?></td>
								<td><?=intval($cpc_process['cassette_4'][100])?></td>
								<td><?=intval($cpc_process['cassette_5'][50])?></td>
								<td><?=intval($cpc_process['cassette_5'][100])?></td>
								<td><?=intval($cpc_process['divert'][50])?></td>
								<td><?=intval($cpc_process['divert'][100])?></td>
								<td><?=$value_total?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
					<?php 
						}
					?>
				</tbody>
				<tfoot>
				</tfoot>
			</table>
		</div>
	</page>
</div><?php /**PATH D:\DEV_SERVER\htdocs\bridnins\coresys\views/pages/cro_reconcile_report/show.blade.php ENDPATH**/ ?>