@extends('layouts.panellayout')

@section('pg-title')
Operator Info
@endsection

@section('content')
<script type="text/javascript">
	$(function() {
		var largest = 0;
		var smallest = 100000000;
		var estimated = [];
		var actual = [];
		var companyActual = [];
		var companyEstimated = [];
		var formData = {terrain_id:{{ session('terrain_id') }}, level_id:{{ session('level_id') }}, template_id:{{ session('template_id') }}, lease_id:{{ session('lease_id') }}, year:{{ session('year') }}, month:{{ session('month') }}, esttotal:{{ session('esttotal') }}, actualtotal:{{ session('actualtotal') }}};

		$.get("{{ url('cost') }}/getBenchMarkData", formData, function(data, xhr, status) {
			console.log(data);
			$.each(data, function(index, item){
				if(!item.estimated || item.estimated == null)
				{
					estimated.push([index, 0]);
				}
				else
				{
					estimated.push([index, item.estimated]);
					if(smallest > item.estimated)
					{
						smallest = item.estimated;
					}
				}
				if(!item.actual || item.actual == null)
				{
					actual.push([index, 0]);
				}
				else
				{
					actual.push([index, item.actual]);
					if(item.actual < smallest)
					{
						smallest = item.actual;
					}
				}
				if(!item.currentest || item.currentest == null)
				{
					companyEstimated.push([index, 0]);
				}
				else
				{
					companyEstimated.push([index, item.currentest]);
					if(item.currentest < smallest)
					{
						smallest = item.currentest;
					}
				}
				if(!item.currentactual || item.currentactual == null)
				{
					companyActual.push([index, 0]);
				}
				else
				{
					companyActual.push([index, item.currentactual]);
					if(item.currentactual < smallest)
					{
						smallest = item.currentactual;
					}
				}
			});

			console.log("Initial Smallest: " + smallest);

			for(var i = 0; i < companyActual.length; i++)
			{
				if(Math.max.apply(Math, companyActual[i]) > largest)
				{
					largest = Math.max.apply(Math, companyActual[i]);
				}
			}
			console.log("Stage 1, Smallest: " + smallest);
			for(var i = 0; i < companyEstimated.length; i++)
			{
				if(Math.max.apply(Math, companyEstimated[i]) > largest)
				{
					largest = Math.max.apply(Math, companyEstimated[i]);
				}
			}
			console.log("Stage 2, Smallest: " + smallest);
			for(var i = 0; i < actual.length; i++)
			{
				if(Math.max.apply(Math, actual[i]) > largest)
				{
					largest = Math.max.apply(Math, actual[i]);
				}
			}
			console.log("Stage 3, Smallest: " + smallest);
			for(var i = 0; i < estimated.length; i++)
			{
				if(Math.max.apply(Math, estimated[i]) > largest)
				{
					largest = Math.max.apply(Math, estimated[i]);
				}
			}
			console.log("Stage 4, Smallest: " + smallest);

			$("<div id='tooltip'></div>").css({
				position: "absolute",
				display: "none",
				border: "1px solid #000",
				padding: "2px",
				color: "#fff",
				"background-color": "#000",
				opacity: 0.80
			}).appendTo("body");

			$("#exampleFlotCurve").bind("plothover", function (event, pos, item) {
				if (item) {
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);

					$("#tooltip").html(item.series.label + " of " + x + " = " + y)
					.css({top: item.pageY+5, left: item.pageX+5})
					.fadeIn(200);
				} else {
					$("#tooltip").hide();
				}
			});

			$("#exampleFlotCurve").bind("plotclick", function (event, pos, item) {
				if (item) {
					//$("#clickdata").text(" - click point " + item.dataIndex + " in " + item.series.label);
					chart.highlight(item.series, item.datapoint);
				}
			});

			var chart = $.plot("#exampleFlotCurve", [
				{ label: "Estimated Cost", data: estimated, points: { symbol: "triangle" } },
				{ label: "Actual Cost", data: actual, points: { symbol: "diamond" } },
				{ label: "Company Actual", data: companyActual, points: { symbol: "square" }},
				{ label: "Company Estimated", data: companyEstimated, points: { symbol: "circle" }}
				], {
					series: {
						shadowSize: { show: true },
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						ticks: [
						[0, "JAN"], [1, "FEB"], [2, "MAR"], [3, "APR"], 
						[4, "MAY"], [5, "JUN"], [6, "JUL"], [7, "AUG"], 
						[8, "SEP"], [9, "OCT"], [10, "NOV"], [11, "DEC"] 
						],
						min: 0,
						max: 11
					},
					yaxis: {
						ticks: 20,
						min: 600,
						max: largest,
						tickDecimals: 2
					},
					grid: {
						hoverable: true,
						clickable: true,
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: {
							top: 0,
							right: 0,
							bottom: 0,
							left: 0
						}
					},
					legend: {
						show: true
					}
				});
		});
		/*for (var i = 0; i < Math.PI * 2; i += 0.25) {
			estimated.push([i, Math.sin(i)]);
		}
		
		for (var i = 0; i < Math.PI * 2; i += 0.25) {
			actual.push([i, Math.cos(i)]);
		}
		
		for (var i = 0; i < Math.PI * 12; i += 1.95) {
			companyActual.push([i, Math.sin(i)]);
		}
		
		for (var i = 0; i < Math.PI * 15; i += 2.95) {
			companyEstimated.push([i, Math.cos(i)]);
		}*/

		var current = new Date();
		var currentMonth = current.getMonth();
		var monthData = [];
		
	});
</script>

<div class="page">
	<div class="page-header">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{url('companies')}}">Operators</a></li>
			<li class="breadcrumb-item active">Benchmarking</li>
		</ol>
		<h1 class="page-title">Data Benchmarking</h1>
		<div class="page-header-actions">
			<a class="nav-link waves-effect waves-light waves-round waves-effect waves-light waves-round btn btn-info" href="javascript:void(0)" title="" role="button" data-content="Click this button to filter the various charts listed below." data-toggle="popover" data-trigger="hover" data-original-title="Chart Map Directions" data-placement="left" style="background-color: #795548;" id="filter">
				<i class="icon md-filter-list" aria-hidden="true"></i>
			</a>
		</div>
	</div>
	<div class="" id="filterPanel" style="display: none;margin-bottom: 20px;">
		<div class="col-md-2 col-xs-12">
			<select class="form-control" data-plugin="select2" data-placeholder="Select Terrain">
				
			</select>
		</div>
		<div class="col-md-2 col-xs-12">
			
		</div>
		<div class="col-md-2 col-xs-12">
			
		</div>
		<div class="col-md-2 col-xs-12">
			
		</div>
		<div class="col-md-2 col-xs-12">
			
		</div>
		<div class="col-md-2 col-xs-12">
			
		</div>
	</div>
	<div class="page-content">
		<div class="panel">
			<div class="panel-body container-fluid">
				<div class="row row-lg">
					<div class="col-md-12 col-xs-12">
						
						<div id="exampleFlotCurve" style="height: 500px;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- BEGIN FILTER Modal -->
<div class="modal fade" id="sidebarFilter" aria-hidden="true" aria-labelledby="sidebarFilter" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-sidebar modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">Filter Panel</h4>
			</div>
			<div class="modal-body">
				<p>One fine body…</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-block">Save changes</button>
				<button type="button" class="btn btn-default btn-block btn-pure" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- END FILTER Modal -->


<script type="text/javascript">
	$(function() {
		$("#filter").click(function() {
			//$("#sidebarFilter").modal('show');
			$("#filterPanel").slideToggle("fast");
		});
	});
</script>
@endsection