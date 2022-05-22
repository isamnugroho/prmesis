<div id="data_content">
	<style>
		page[size="A4"] {
			background: white;
			width: 21cm;
			height: 29.7cm;
			display: block;
			margin: 0 auto;
			margin-bottom: 0.5cm;
			box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
			padding: 30px
		}
		@media  print {
			body, page[size="A4"] {
				margin: 0;
				box-shadow: 0;
			}
		}
		#h3 {
			font-size: 18px;
			font-weight: bold;
			margin-bottom: -2px;
		}
		.third {
			font-family: Calibri;       
			font-size: 8pt;
			border: 2px solid black;
			border-collapse: collapse;
			position: absolute;
			top: 30;
			right: 260;
			border-style: solid;
		}
		.sixth {
			font-family: Calibri;       
			border: none;
			border-collapse: collapse;
		}
		.sixth td {
			padding: 4px;
			border: 1px solid black;
			border-style: solid;
		}
		#noborder {
			border: none;
		}
		#noborderbottom {
			border-bottom: 0px solid white;
		}
		#nobordertop {
			border-top: 0px solid white;
		}
		.noborder {
			border: 0px solid white;
		}
		.noborderbottom {
			border-bottom: 0px solid white;
		}
		.nobordertop {
			border-top: 0px solid white;
		}
		.noborderright {
			border-right: 0px solid white;
		}
		.noborderleft {
			border-left: 0px solid white;
		}
		
		.alignleft {
			float: left;
		}
		.alignright {
			float: right;
		}
	</style>
	<page size="A4">
		<div class="wrapper">
			<table class="first" style="width: 100%;">
				<tr>
					<td width="50%">
						<p id="h3">PT. NAMA VENDOR</p>
						<p>REPORT REPLENISH - RETURN ATM</p>
						<hr style="border-style: solid;height:1px;border:none;color:#333;background-color:#333;margin-top: -5px" />
						
						<table class="second" style="width: 100%;margin-top: -15px;">
							<tr>
								<td style="width: 50%">
									<table class="second">
										<tr>
											<td style="width: 60px">LOCATION</td>
											<td style="width: 25px; text-align: center">:</td>
											<td style="position: absolute"><?=$data_run->lokasi?></td>
										</tr>
										<tr>
											<td style="width: 60px">ID</td>
											<td style="width: 25px; text-align: center">:</td>
											<td><?=$data_run->idatm?></td>
										</tr>
										<tr>
											<td style="width: 60px">BANK</td>
											<td style="width: 25px; text-align: center">:</td>
											<td><?=$data_run->nama_lengkap?></td>
										</tr>
										<tr>
											<td style="width: 60px">TYPE</td>
											<td style="width: 25px; text-align: center">:</td>
											<td><?=$data_run->type_mesin?></td>
										</tr>
									</table>
								</td>
								<td style="width: 50%">
									<table class="second" style="width: 100%; display: none">
										<tr>
											<td style="width: 60px"></td>
											<td style="width: 25px; text-align: center">&nbsp</td>
											<td></td>
										</tr>
										<tr>
											<td style="width: 60px"></td>
											<td style="width: 25px; text-align: center">&nbsp</td>
											<td></td>
										</tr>
										<tr>
											<td style="width: 60px">DENOM</td>
											<td style="width: 25px; text-align: center">:</td>
											<td> - </td>
										</tr>
										<tr>
											<td style="width: 60px">VALUE</td>
											<td style="width: 25px; text-align: center">:</td>
											<td> - </td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td width="15%">
						<center>
							
						</center>
					</td>
					<td width="35%">
						<table class="second">
							<tr>
								<td style="width: 150px">TANGGAL</td>
								<td style="width: 25px; text-align: center">:</td>
								<td><?=$data_run->action_date?></td>
							</tr>
							<tr>
								<td>TIME REPLENISH(CSO)</td>
								<td style="width: 25px; text-align: center">:</td>
								<td> - </td>
							</tr>
							<tr>
								<td>TIME PREPARE BAG(CPC)</td>
								<td style="width: 25px; text-align: center">:</td>
								<td> - </td>
							</tr>
						</table>
						<hr style="height:1px;border:none;color:#333;background-color:#333;width:100%; text-align: left; margin: 2px" />
						<table class="second">
							<tr>
								<td style="width: 150px">CASHIER</td>
								<td style="width: 25px; text-align: center">:</td>
								<td> - </td>
							</tr>
							<tr>
								<td>NO. MEJA</td>
								<td style="width: 25px; text-align: center">:</td>
								<td> - </td>
							</tr>
							<tr>
								<td>JAM PROSES</td>
								<td style="width: 25px; text-align: center">:</td>
								<td> - </td>
							</tr>
						</table>
						<table class="third" style="position: absolute; left: 560px; top: 85px">
							<tr>
								<td style="width: 45px; text-align: center; border: 2px solid black; border-style: solid;">RUN</td>
							</tr>
							<tr>
								<td style="width: 45px; text-align: center; font-size: 26px;">01</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<br>
			<table style="width: 100%;" border="1" class="sixth">
				<thead>
					<tr>
						<td rowspan="2" align="center">CASSETE</td>
						<td rowspan="2" align="center">DENOM</td>
						<td rowspan="2" align="center">TOTAL</td>
						<td colspan="2" align="center">STATUS</td>
						<td rowspan="2" align="center">VALUE</td>
						<td rowspan="2" align="center">TOTAL RETURN</td>
					</tr>
					<tr>
						<td width="80" align="center">PENGALIHAN</td>
						<td width="80" align="center">CANCEL</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Catridge 1</td>
						<td align="center">
							<span class="alignleft"><?=number_format($csst_1_denom, 0, ".", ".")?></span>
							<span class="alignright"><?=$csst_1_value?></span>
						</td>
						<td align="right"><?=number_format($csst_1_total, 0, ".", ".")?></td>
						<td></td>
						<td align="center"></td>
						<td align="left"><?=$value_1?></td>
						<td align="right"><?=number_format($value_1_total, 0, ".", ".")?></td>
					</tr>
					<tr>
						<td>Catridge 2</td>
						<td align="center">
							<span class="alignleft"><?=number_format($csst_2_denom, 0, ".", ".")?></span>
							<span class="alignright"><?=$csst_2_value?></span>
						</td>
						<td align="right"><?=number_format($csst_2_total, 0, ".", ".")?></td>
						<td></td>
						<td align="center"></td>
						<td align="left"><?=$value_2?></td>
						<td align="right"><?=number_format($value_2_total, 0, ".", ".")?></td>
					</tr>
					<tr>
						<td>Catridge 3</td>
						<td align="center">
							<span class="alignleft"><?=number_format($csst_3_denom, 0, ".", ".")?></span>
							<span class="alignright"><?=$csst_3_value?></span>
						</td>
						<td align="right"><?=number_format($csst_3_total, 0, ".", ".")?></td>
						<td></td>
						<td align="center"></td>
						<td align="left"><?=$value_3?></td>
						<td align="right"><?=number_format($value_3_total, 0, ".", ".")?></td>
					</tr>
					<tr>
						<td>Catridge 4</td>
						<td align="center">
							<span class="alignleft"><?=number_format($csst_4_denom, 0, ".", ".")?></span>
							<span class="alignright"><?=$csst_4_value?></span>
						</td>
						<td align="right"><?=number_format($csst_4_total, 0, ".", ".")?></td>
						<td></td>
						<td align="center"></td>
						<td align="left"><?=$value_4?></td>
						<td align="right"><?=number_format($value_4_total, 0, ".", ".")?></td>
					</tr>
					<tr>
						<td>Catridge 5</td>
						<td align="center"></td>
						<td></td>
						<td></td>
						<td align="center"></td>
						<td align="left"><?=$value_5?></td>
						<td align="right"><?=number_format($value_5_total, 0, ".", ".")?></td>
					</tr>
					<tr>
						<td>Divert</td>
						<td align="center"></td>
						<td></td>
						<td></td>
						<td align="center"></td>
						<td align="left"><?=$value_div?></td>
						<td align="right"><?=number_format($value_div_total, 0, ".", ".")?></td>
					</tr>
					<tr>
						<td colspan=5 id="noborder"></td>
						<td align="center"><?=number_format($value_total, 0, ".", ".")?></td>
						<td align="right"><?=number_format($total_sum, 0, ".", ".")?></td>
					</tr>
				</tbody>
			</table>
			
			<table style="width: 70%; margin-top: -14px;">
				<tr>
					<td style="width: 120px">TOTAL CATRIDGE</td>
					<td style="width: 25px">:</td>
					<td>5</td>
				</tr>
				<tr>
					<td style="width: 60px">TOTAL</td>
					<td style="width: 25px">:</td>
					<td><?=number_format($data_run->nominal, 0, ".", ".")?></td>
				</tr>
				<tr>
					<td style="width: 60px">TERBILANG</td>
					<td style="width: 25px">:</td>
					<td style="font-weight: bold"># <?=$terbilang?> #</td>
				</tr>
			</table>
		</div>
	</page>
</div><?php /**PATH D:\DEV_SERVER\htdocs\bridnins\coresys\views/pages/cro_daily_report/show.blade.php ENDPATH**/ ?>