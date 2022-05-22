@extends('layouts.master')

@section('stylesheet')
@endsection


@section('content')
<style>
    .hrow-gap1 {
        margin: 20px 0px 0px 0px;
    }

    .hrow-gap2 {
        margin: -30px 0px 0px 0px;
    }

    .hrow-gap3 {
        margin: -30px 0px 0px 0px;
    }

    hanzmobview {
        display: inline;
    }

    @media screen and (max-width: 1024px) {
        hanzmobview {
            display: none;
        }

        .art-one {
            padding: 10px;
        }

    }
</style>
<style>
    hanzmobview {
        margin: 0 auto;
    }

    hanzmobview {
        display: inline;
    }

    @media screen and (max-width: 1024px) {
        hanzmobview {
            display: none;
        }

        article {
            padding: 20px;
        }
    }
</style>

<section id="widget-grid">
    <div class="row hrow-gap">

	<article class="col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px 0px 0px;">
	 <div class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false" data-widget-colorbutton="false" data-widget-deletebutton="false" style="margin: 10px 0px 0px 0px;">
		<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);height:5px;"></header>
		<div>
			<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12" style="margin: -20px 0px -30px 0px;">
					<div class="row">
					<article class="col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px 0px 0px;">
						<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
							<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
								<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/cal.png" height="18" width="18" /> </span>
								<h2 style="color:white; margin: -1px 0px 0px 10px; font-weight: bold;">Summary Monitoring Data
								</h2>
							</header>
							<div>
								<div class="widget-body no-padding">
									<div class="custom-scroll table-responsive" style="height:580px; width:100%; overflow-y: scroll; overflow-x: scroll;">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:20px;">No.</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:140px;">ID TICKET</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:140px;">TANGGAL</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:180px;">KANWIL</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:140px;">ID ATM</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:140px;">LOCATION</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:280px;">SERIAL NUMBER</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:180px;">JAM OPS</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:140px;">DENOM 50</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:180px;">DENOM 100</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:240px;">STATUS CRM</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:180px;">ACTIVITY</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:180px;">START DATE TIME</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:180px;">END DATE TIME</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;width:180px;">DURASI</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td style="background: #ffffff"><span id=""><?=$r['']?></span></td>
													<td style="background: #ffffff"><span id=""><?=$r['']?></span></td>
													<td style="background: #ffffff"><span id=""><?=$r['']?></span></td>
													<td style="background: #ffffff"><span id=""><?=$r['']?></span></td>
													<td style="background: #ffffff"><span id=""><?=$r['']?></span></td>
													<td style="background: #ffffff"><span id=""><?=$r['']?></span></td>
													<td style="background: #ffffff"><span id=""><?=$r['']?></span></td>
													<td style="background: #ffffff"><span id=""><?=$r['']?></span></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</article>
					</div>
				</div>
				
			</div>

			</div>
		</div>
	
	</div>


  </article>

    </div>

</section>
@endsection


@section('javascript')
<script src="<?=BASE_URL?>js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?=BASE_URL?>js/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="<?=BASE_URL?>js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="<?=BASE_URL?>js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?=BASE_URL?>js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

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

    var flot_updating_chart, flot_statsChart, flot_multigraph, calendar;

    pageSetUp();

    /*
     * PAGE RELATED SCRIPTS
     */

    // pagefunction

    var pagefunction = function() {

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

        /*
         * RUN PAGE GRAPHS
         */

        // load all flot plugins
        loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.cust.min.js", function() {
            loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.resize.min.js", function() {
                loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.time.min.js", function() {
                    loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.tooltip.min.js", generatePageGraphs);
                });
            });
        });

    };

    // end pagefunction

    // destroy generated instances 
    // pagedestroy is called automatically before loading a new page
    // only usable in AJAX version!

    var pagedestroy = function() {

        // destroy calendar
        calendar.fullCalendar('destroy');
        calendar = null;

        //destroy flots
        flot_updating_chart.shutdown();
        flot_updating_chart = null;
        flot_statsChart.shutdown();
        flot_statsChart = null;

        flot_multigraph.shutdown();
        flot_multigraph = null;

        // destroy vector map objects
        $('#vector-map').find('*').addBack().off().remove();

        // destroy todo
        $("#sortable1, #sortable2").sortable("destroy");
        $('.todo .checkbox > input[type="checkbox"]').off();

        // destroy misc events
        $("#rev-toggles").find(':checkbox').off();
        $('#chat-container').find('*').addBack().off().remove();

        // debug msg
        if (debugState) {
            root.console.log("✔ Calendar, Flot Charts, Vector map, misc events destroyed");
        }

    }

    // end destroy

    // run pagefunction on load
    pagefunction();
</script>
<script type="text/javascript">
    $(document).ready(function() {

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
         * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
         * 
         * TO LOAD A SCRIPT:
         * var pagefunction = function (){ 
         *  loadScript(".../plugin.js", run_after_loaded);	
         * }
         * 
         * OR
         * 
         * loadScript(".../plugin.js", run_after_loaded);
         */

        /* Formatting function for row details - modify as you need */
        function format(d) {
            // `d` is the original data object for the row
            return '<table cellpadding="5" cellspacing="0" border="0" class="table table-hover table-condensed">' +
                '<tr>' +
                '<td style="width:100px">Project Title:</td>' +
                '<td>' + d.name + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Deadline:</td>' +
                '<td>' + d.ends + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Extra info:</td>' +
                '<td>And any further details here (images etc)...</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Comments:</td>' +
                '<td>' + d.comments + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Action:</td>' +
                '<td>' + d.action + '</td>' +
                '</tr>' +
                '</table>';
        }

        // clears the variable if left blank
        var table = $('#example').DataTable({
            "ajax": "<?=base_url()?>assets/data/dataList.json",
            "bDestroy": true,
            "iDisplayLength": 15,
            "columns": [{
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {
                    "data": "name"
                },
                // { "data": "est" },
                // { "data": "contacts" },
                // { "data": "status" },
                // { "data": "target-actual" },
                {
                    "data": "starts"
                },
                {
                    "data": "ends"
                },
                {
                    "data": "tracker"
                },
            ],
            "order": [
                [1, 'asc']
            ],
            "fnDrawCallback": function(oSettings) {
                runAllCharts()
            }
        });



        // Add event listener for opening and closing details
        $('#example tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });

    })
</script>

@endsection