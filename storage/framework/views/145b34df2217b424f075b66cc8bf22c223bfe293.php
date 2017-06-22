<?php $__env->startSection('pg-title'); ?>
Operator Info
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/ring.css')); ?>">
<script type="text/javascript">
	$(function() {
		
		var terrain_id, level_id, template_id, lease_id, startDate, endDate, projectid;
		terrain_id 	= getParameterByName('terrain_id');
		level_id   	= getParameterByName('level_id');
		template_id	= getParameterByName('template_id');
		lease_id	= getParameterByName('lease_id');
		startDate	= getFieldValue('startFilter');
		endDate		= getFieldValue('endFilter');
		projectid	= getParameterByName('projectid');

		alert("Start Date: " + startDate + " and End Date: " + endDate);

		plotGraph(terrain_id, level_id, template_id, lease_id, startDate, endDate, projectid);
	});
</script>

<div class="page">
	<div class="page-header">
		<h1 class="page-title">Data Benchmarking</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="<?php echo e(url('companies')); ?>">Operators</a></li>
			<li class="breadcrumb-item active">Benchmarking</li>
		</ol>
		<div class="page-header-actions">
			<a class="nav-link waves-effect waves-light waves-round waves-effect waves-light waves-round btn btn-info" href="javascript:void(0)" title="" role="button" data-content="Click this button to filter the various charts listed below." data-toggle="popover" data-trigger="hover" data-original-title="Chart Map Directions" data-placement="left" style="background-color: #795548;" id="filter">
				<i class="icon md-filter-list" aria-hidden="true"></i>
			</a>
		</div>
	</div>
	<div class="page-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-body">
					<div class="row row-lg">
						<div class="col-md-12 col-xs-12">
							<div class="" id="filterPanel" style="display: none;margin-bottom: 100px;">
								<div class="col-md-2 col-xs-12">
									Select Terrain
									<select class="form-control" data-plugin="select2" data-placeholder="Select Terrain" id="terrain_select" style="width: 100%;">
										<option value="0">Select Terrain</option>
									</select>
								</div>
								<div class="col-md-3 col-xs-12">
									Select Production Stage
									<select class="form-control" data-plugin="select2" data-placeholder="Select Benchmarking Stage" id="stage_select" style="width: 100%;">
										<option value="0">Select Production Stage</option>
									</select>
								</div>
								<div class="col-md-3 col-xs-12">
									Select Business Arrangement
									<select class="form-control" data-plugin="select2" data-placeholder="Select Business Arrangement" 
									id="biz_arrangement_select" style="width: 100%;">
									<option value="0">Select Business Arrangement</option>
								</select>
							</div>
							<div class="col-md-4 col-xs-12">
								<!-- Example Date Range -->
								Select Period
								<div class="input-daterange" data-plugin="datepicker">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon md-calendar" aria-hidden="true"></i>
										</span>
										<?php
										$startDef = date("Y-01");
										$endDef = date("Y-m");
										?>
										<input type="text" class="form-control" name="startFilter" id="startFilter" value="<?php echo e($startDef); ?>">
									</div>
									<div class="input-group">
										<span class="input-group-addon">to</span>
										<input type="text" class="form-control" name="endFilter" id="endFilter" value="<?php echo e($endDef); ?>">
									</div>
								</div>
								<!-- End Example Date Range -->
							</div>
						</div>
					</div>
					<div class="col-md-12 col-xs-12">
						<div class="col-md-3 col-xs-12">
							<div class="card card-inverse card-shadow bg-white">
								<div class="card-block p-30">
									<?php 
									$imgSrc; $opName; $opMail; $fieldName;
									$operator;
									$projectData = app('App\Http\Controllers\UtilityController')->getProjectData($_GET['projectid']);
									if($projectData['operator_id' == "N/A"])
									{
										$imgSrc = "avatar.jpg";
										$opName = "No Record Found";
										$opMail = "N/A";

									}
									else
									{
										$operator = app('App\Http\Controllers\CompanyController')->getOperatorData($projectData['operator_id']);
										if($operator['id'] == 0)
										{
											$imgSrc = "avatar.jpg";
											$opName = "No Record Found.";
											$opMail = "N/A";
										}	
										else
										{
											$imgSrc = $operator['logo'];
											$opName = $operator['contact_lastname'] . " " . $operator['contact_firstname'];
											$opMail = $operator['contact_email'];
										}
									}
									$fieldID = app('App\Http\Controllers\UtilityController')->getFieldID($_GET['template_id']);
								//die($fieldID);
									if($fieldID['field_id'] == 0)
									{
										$fieldName = "Not Match Found!";
									}
									else
									{
										$fieldData = app('App\Http\Controllers\CompanyController')->getCompanyWellField($fieldID['field_id']);
										$fieldName = $fieldData['field_name'];
									}
									?>
									<a class="" href="javascript:void(0)">
										<img src="<?php echo e(asset('')); ?>/<?php echo e($imgSrc); ?>" alt="">
									</a>
									<div class="vertical-align h-100 text-truncate">
										<div class="vertical-align-middle">
											<div class="font-size-20 m-b-5 blue-600 text-truncate">
												<?php echo e($opName); ?>

											</div>
											<div class="font-size-14 text-truncate">
												<?php echo e($opMail); ?>

											</div>
										</div>
									</div>
									<p class="" style="color: #0D47A1;"><b>Project Name</b>: <?php echo e($projectData['name']); ?></p>
									<p class="" style="color: #006064"><b>Field Name: </b><?php echo e($fieldName); ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-9 col-xs-12">
							<div class="card card-inverse card-shadow bg-white" id="exampleFlotCurve" style="height: 400px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="panel">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<h4>Estimated Deviations Analysis</h4>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead style="background-color: #5c6bc0;">
									<tr>
										<th style="color: white;"></th>
										<th style="color: white;">Month</th>
										<th style="color: white;">Est. Deviation</th>
										<th style="color: white;">Flag</th>
										<th style="color: white;">Action</th>
									</tr>
								</thead>
								<tbody id="estimatedDeviationTable" style="font-family: 'Segoe UI'; font-size: 12px;">
									<tr class="odd">
										<td></td>
										<td>
											<h5>200% Estimated Deviation</h5>
											<small>For: April | Flag: Danger</small>
										</td>
										<td>
											<div class="time-from-now">in 32 minutes</div>
										</td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<h4>Actual Deviations Analysis</h4>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead class="" style="background-color: #3f51b5;">
									<tr>
										<th style="color: white;"></th>
										<th style="color: white;">Month</th>
										<th style="color: white;">Act. Deviation</th>
										<th style="color: white;">Flag</th>
										<th style="color: white;">Action</th>
									</tr>
								</thead>
								<tbody id="actualDeviationTable" style="font-family: 'Segoe UI'; font-size: 12px;">
									<tr class="odd">
										<td></td>
										<td>
											<h5>200% Estimated Deviation</h5>
											<small>For: April | Flag: Danger</small>
										</td>
										<td>
											<div class="time-from-now">in 32 minutes</div>
										</td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-8 col-md-offset-3">
						<div class="m-y-35">
							<h4>Analysis Tab</h4>
							<span class="vertical-align-middle" style="font-size: 12px;display: none;" id="analysisIndicator">Preparing analysis...</span>
							<div class='uil-ring-css' style='transform:scale(0.6);display: none;'><div></div></div>
						</div>
						<span id="summarySpan"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<script type="text/javascript">
	$(function() {
		analysisEstDev = [];
		analysisActDev = [];
		analysisBenchEstDev = [];
		analysisBenchActDev = [];
		$("#filter").click(function() {
			//$("#sidebarFilter").modal('show');
			$("#filterPanel").slideToggle("fast");
		});

		doAjax('all', "getTerrains");
		doAjax('all', "getStages");
		doAjax('all', "getBusinessArrangements");

		function doAjax(id, marker)
		{
			var parentAppend, options;
			$.get("<?php echo e(url('utilities')); ?>/" + marker + "?id=" + id, function(data, xhr, status) {
				$.each(data, function(index, item) {
					if(marker == 'getTerrains')
					{
						if(item.id == getParameterByName('terrain_id'))
						{
							options += "<option value='"+item.id+"' selected>"+item.name+"</option>";
						}
						else
						{
							options += "<option value='"+item.id+"'>"+item.name+"</option>";
						}
						parentAppend = "terrain_select";
					}
					else if(marker == 'getStages')
					{
						if(item.id == getParameterByName('level_id'))
						{
							options += "<option value='"+item.id+"' selected>"+item.level+"</option>";
						}
						else
						{
							options += "<option value='"+item.id+"'>"+item.level+"</option>";
						}
						parentAppend = "stage_select";
					}
					else if(marker == 'getBusinessArrangements')
					{
						if(item.id == getParameterByName('lease_id'))
						{
							options += "<option value='"+item.id+"' selected>"+item.description+"</option>";
						}
						else
						{
							options += "<option value='"+item.id+"'>"+item.description+"</option>";
						}
						parentAppend = "biz_arrangement_select";
					}
				});
				$("#"+parentAppend).append(options);
			});
		}

		$("#terrain_select").change(function() {
			var terrain_id = $(this).val();
			if(!terrain_id || terrain_id == 0)
			{
				toastr.options = {
					"closeButton":true,
					"debug":false,
					"newestOnTop":true,
					"progressBar":true,
					"positionClass":"toast-bottom-right",
					"preventDuplicates":false,
					"onclick":null,
					"showDuration":"300",
					"hideDuration":"1000",
					"timeOut":"5000",
					"extendedTimeOut":"1000",
					"showEasing":"swing", 
					"hideEasing":"linear",
					"showMethod":"fadeIn",
					"hideMethod":"fadeOut"
				};
				toastr["warning"]("Invalid Option! Please select a valid option", "Warning", toastr.options);
				return false;
			}
			else
			{
				var terrain_id, level_id, template_id, lease_id, year, month, projectid;
				terrain_id 	= terrain_id;
				level_id   	= getFieldValue('stage_select');
				template_id	= getParameterByName('template_id');
				lease_id	= getFieldValue('biz_arrangement_select');
				startDate	= getFieldValue('startFilter');
				endDate		= getFieldValue('endFilter');
				projectid	= getParameterByName('projectid');

				plotGraph(terrain_id, level_id, template_id, lease_id, startDate, endDate, projectid);
			}
		});

		$("#stage_select").change(function() {
			var production_stage = $(this).val();
			if(!production_stage || production_stage == 0)
			{
				toastr.options = {
					"closeButton":true,
					"debug":false,
					"newestOnTop":true,
					"progressBar":true,
					"positionClass":"toast-bottom-right",
					"preventDuplicates":false,
					"onclick":null,
					"showDuration":"300",
					"hideDuration":"1000",
					"timeOut":"5000",
					"extendedTimeOut":"1000",
					"showEasing":"swing", 
					"hideEasing":"linear",
					"showMethod":"fadeIn",
					"hideMethod":"fadeOut"
				};
				toastr["warning"]("Invalid Option! Please select a valid option", "Warning", toastr.options);
				return false;
			}
			else
			{
				var terrain_id, level_id, template_id, lease_id, year, month, projectid;
				terrain_id 	= getFieldValue('terrain_select');
				level_id   	= production_stage;
				template_id	= getParameterByName('template_id');
				lease_id	= getFieldValue('biz_arrangement_select');
				startDate	= getFieldValue('startFilter');
				endDate		= getFieldValue('endFilter');
				projectid	= getParameterByName('projectid');

				plotGraph(terrain_id, level_id, template_id, lease_id, startDate, endDate, projectid);
			}
		});

		$("#biz_arrangement_select").change(function() {
			var biz_arrangement = $(this).val();
			if(!biz_arrangement || biz_arrangement == 0)
			{
				toastr.options = {
					"closeButton":true,
					"debug":false,
					"newestOnTop":true,
					"progressBar":true,
					"positionClass":"toast-bottom-right",
					"preventDuplicates":false,
					"onclick":null,
					"showDuration":"300",
					"hideDuration":"1000",
					"timeOut":"5000",
					"extendedTimeOut":"1000",
					"showEasing":"swing", 
					"hideEasing":"linear",
					"showMethod":"fadeIn",
					"hideMethod":"fadeOut"
				};
				toastr["warning"]("Invalid Option! Please select a valid option", "Warning", toastr.options);
				return false;
			}
			else
			{
				var terrain_id, level_id, template_id, lease_id, year, month, projectid;
				terrain_id 	= getFieldValue('terrain_select');
				level_id   	= getFieldValue('stage_select');
				template_id	= getParameterByName('template_id');
				lease_id	= biz_arrangement;
				startDate	= getFieldValue('startFilter');
				endDate		= getFieldValue('endFilter');
				projectid	= getParameterByName('projectid');

				plotGraph(terrain_id, level_id, template_id, lease_id, startDate, endDate, projectid);	
			}
		});

		$("#startFilter").change(function() {
			var yearSelect = $(this).val();
			if(!yearSelect || yearSelect == 0)
			{
				toastr.options = {
					"closeButton":true,
					"debug":false,
					"newestOnTop":true,
					"progressBar":true,
					"positionClass":"toast-bottom-right",
					"preventDuplicates":false,
					"onclick":null,
					"showDuration":"300",
					"hideDuration":"1000",
					"timeOut":"5000",
					"extendedTimeOut":"1000",
					"showEasing":"swing", 
					"hideEasing":"linear",
					"showMethod":"fadeIn",
					"hideMethod":"fadeOut"
				};
				toastr["warning"]("Invalid Option! Please select a valid option", "Warning", toastr.options);
				return false;
			}
			else
			{
				var terrain_id, level_id, template_id, lease_id, year, month, projectid;
				terrain_id 	= getFieldValue('terrain_select');
				level_id   	= getFieldValue('stage_select');
				template_id	= getParameterByName('template_id');
				lease_id	= getFieldValue('biz_arrangement_select');
				startDate	= yearSelect;
				endDate		= getFieldValue('endFilter');
				projectid	= getParameterByName('projectid');

				plotGraph(terrain_id, level_id, template_id, lease_id, startDate, endDate, projectid);
			}
		});

		$("#endFilter").change(function() {
			var monthSelect = $(this).val();
			if(!monthSelect)
			{
				toastr.options = {
					"closeButton":true,
					"debug":false,
					"newestOnTop":true,
					"progressBar":true,
					"positionClass":"toast-bottom-right",
					"preventDuplicates":false,
					"onclick":null,
					"showDuration":"300",
					"hideDuration":"1000",
					"timeOut":"5000",
					"extendedTimeOut":"1000",
					"showEasing":"swing", 
					"hideEasing":"linear",
					"showMethod":"fadeIn",
					"hideMethod":"fadeOut"
				};
				toastr["warning"]("Invalid Option! Please select a valid option", "Warning", toastr.options);
				return false;
			}
			else
			{
				var terrain_id, level_id, template_id, lease_id, year, month, projectid;
				terrain_id 	= getFieldValue('terrain_select');
				level_id   	= getFieldValue('stage_select');
				template_id	= getParameterByName('template_id');
				lease_id	= getFieldValue('biz_arrangement_select');
				startDate	= getFieldValue('startFilter');
				endDate		= monthSelect;
				projectid	= getParameterByName('projectid');

				plotGraph(terrain_id, level_id, template_id, lease_id, startDate, endDate, projectid);
			}
		});
	});

function getParameterByName(name, url) 
{
	if (!url) url = window.location.href;
	name = name.replace(/[\[\]]/g, "\\$&");
	var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	results = regex.exec(url);
	if (!results) return null;
	if (!results[2]) return '';
	return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function getFieldValue(id)
{
	var value = $("#"+id).val();
	console.log("From getFieldValue: " + value);
	if(value == 0)
	{
		toastr.options = {
			"closeButton":true,
			"debug":false,
			"newestOnTop":true,
			"progressBar":true,
			"positionClass":"toast-bottom-right",
			"preventDuplicates":false,
			"onclick":null,
			"showDuration":"300",
			"hideDuration":"1000",
			"timeOut":"5000",
			"extendedTimeOut":"1000",
			"showEasing":"swing", 
			"hideEasing":"linear",
			"showMethod":"fadeIn",
			"hideMethod":"fadeOut"
		};
		toastr["warning"]("Invalid Option! Please select a valid option", "Warning", toastr.options);
		return false;
	}
	else
	{
		return value;
	}
}

function getMonthNumber(month)
{
	monthNumber = 0;
	switch(month)
	{
		case 'Jan':
		monthNumber = 0;
		break;
		case 'Feb':
		monthNumber = 1;
		break;
		case 'Mar':
		monthNumber = 2;
		break;
		case 'Apr':
		monthNumber = 3;
		break;
		case 'May':
		monthNumber = 4;
		break;
		case 'Jun':
		monthNumber = 5;
		break;
		case 'Jul':
		monthNumber = 6;
		break;
		case 'Aug':
		monthNumber = 7;
		break;
		case 'Sep':
		monthNumber = 8;
		break;
		case 'Oct':
		monthNumber = 9;
		break;
		case 'Nov':
		monthNumber = 10;
		break;
		case 'Dec':
		monthNumber = 11;
		break;
	}
	return monthNumber;
}

function showAnalysis(month)
{
	var summary = '';
	$("#summarySpan").html("");
	$("#analysisIndicator").html("Preparing Analysis");
	$(".uil-ring-css, #analysisIndicator").fadeIn("slow");

	console.log("Estimated Deviation For month = " + analysisEstDev[month]);
	console.log("Actual Deviation For month = " + analysisActDev[month]);
	console.log("Benchmark Estimated Deviation For month = " + analysisBenchEstDev[month]);
	console.log("Benchmark Actual Deviation For month = " + analysisBenchActDev[month]);
	console.log("--------------------------------------------------------------");
	var estValue = analysisEstDev[month].substr(0, analysisEstDev[month].indexOf('%'));
	console.log("Estimated in numbers: " + estValue);
	console.log("Estimated Benchmarked: " + analysisBenchEstDev[month]);
	console.log("--------------------------------------------------------------");
	if(isNaN(estValue) || isNaN(analysisBenchEstDev[month]))
	{
		summary = "Unfortunately! the system could not come up with a summary due to insufficient data.";
	}
	else
	{
		if(estValue > analysisBenchEstDev[month])
		{
			summary = "<p>Operator Estimated Cost budget is greater than the Benchmarked budget cost for this project. This is a high risk project that requires more capital than normal. <p>RECOMMENDATION: It is recommended that other projects meeting this same criteria with minimum budget should be considered first before this and detailed attention be given to every detail of this project.</p></p></p>";
		}
		else if(typeof estValue == "string" || !estValue || estValue == '')
		{
			summary = "Unfortunately! the system could not come up with a summary due to insufficient data.";		
		}
		else if(estValue < analysisBenchEstDev[month])
		{
			console.log(typeof estValue + " and value = " + estValue);
			summary = "<p>This project cost aligns with Benchmarked data for other projects matching the same criteria. This project can thus be recommended for approval.</p>";
		}
		else
		{
			summary = "Unfortunately! the system could not come up with a summary due to insufficient data.";
		}
	}
	/*if(analysisEstDev[month].endsWith("%") || analysisActDev[month].endsWith("%"))
	{
		if(analysisEstDev[month] > analysisBenchEstDev[month])
		{
			/*if(analysisActDev[month] > analysisBenchActDev[month])
			{
				summary = "<p><b class='text-warning'>WARNING:</b> Operator estimated budget is higher than already Benchmarked estimated budget. This shows a high risk requiring more capital than previous projects.</p><p><b class='text-warning'>WARNING:</b> Operator Actual budget is larger than Benchmarked actual cost required for this project. Make sure all parameters are properly scrutinzed before this project is approved beyond this phase.</p>";
			}
			else
			{
				summary = "<p><b class='text-warning'>WARNING:</b> Operator estimated budget is higher than already Benchmarked estimated budget. This shows a high risk requiring more capital than previous projects.</p><p><b class='text-success'>Acutal Cost:</b> Operator Actual budget is within range and this.</p>";
			}
			summary = "<p>Operator Estimated Cost budget is greater than the Benchmarked budget cost for this project. This is a high risk project that requires more capital than normal. <p>RECOMMENDATION: It is recommended that other projects meeting this same criteria with minimum budget should be considered first before this and detailed attention be given to every detail of this project.</p></p></p>";
		}
		else
		{
			summary = "<p>This project cost aligns with Benchmarked data for other projects matching the same criteria. This project can thus be recommended for approval.</p>";
		}
	}
	else
	{
		summary = "Unfortunately! the system could not come up with a summary due to insufficient data.";
	}*/
	$(".uil-ring-css").fadeOut("fast");
	$("#analysisIndicator").html("Analysis Complete");
	$("#summarySpan").css("margin-top", "-10px").html(summary);
}

function plotGraph(terrain_id, level_id, template_id, lease_id, startDate, endDate, projectid)
{
	var monthsTotal;
	var largest = 0;
	var estimated = [];
	var actual = [];
	var companyActual = [];
	var companyEstimated = [];
	var estimatedDeviation = '';
	var actualDeviation = '';
	var formData = {terrain_id:terrain_id, level_id:level_id, template_id:template_id, lease_id:lease_id, startDate:startDate, endDate:endDate, projectid:projectid};
	console.log("Form Data: ");
	console.log(formData);
	console.log("----------------------");
	$.get("<?php echo e(url('cost')); ?>/benchmarking", formData, function(data, xhr, status) {
		console.log("From Plot Graph");
		console.log(data);
		console.log("---------------");
		$.each(data[0], function(index, item){
			estimated.push([index, item.estimated]);
			actual.push([index, item.actual]);
			companyEstimated.push([index, item.currentest]);
			companyActual.push([index, item.currentactual]);
			monthsTotal = estimated.length;
			analysisBenchEstDev.push(item.estimated);
			analysisBenchActDev.push(item.actual);
			for(var i = 0; i < estimated.length; i++)
			{
				if(Math.max.apply(Math, estimated[i]) > largest)
				{
					largest = Math.max.apply(Math, estimated[i]);
				}
			}
			for(var i = 0; i < actual.length; i++)
			{
				if(Math.max.apply(Math, actual[i]) > largest)
				{
					largest = Math.max.apply(Math, actual[i]);
				}
			}
			for(var i = 0; i < companyEstimated.length; i++)
			{
				if(Math.max.apply(Math, companyEstimated[i]) > largest)
				{
					largest = Math.max.apply(Math, companyEstimated[i]);
				}
			}
			for(var i = 0; i < companyActual.length; i++)
			{
				if(Math.max.apply(Math, companyActual[i]) > largest)
				{
					largest = Math.max.apply(Math, companyActual[i]);
				}
			}
		});

		$.each(data[1].estimateddev, function(index, item) {
			//console.log(item[1].estimateddev);
			var flag = '';
			var deviation = '';
			if(item.flag == "red")
			{
				flag = "<b class='text-danger'>Danger</b>";
			}
			else if(item.flag == "No Data")
			{
				flag = "<b>No Data</b>";
			}
			else if(item.flag == "green")
			{
				flag = "<b>In-range</b>";
			}

			if(item.deviation == 'Insufficient Data')
			{
				deviation = "N/A";
			}
			else
			{
				deviation = item.deviation;
			}

			month = getMonthNumber('' + item.month);

			analysisEstDev.push(item.deviation);
			estimatedDeviation += '<tr class="odd"><td></td><td>'+item.month+'</td><td><b>'+deviation+'</b></td><td>'+flag+'</td><td><a href="javascript:void(0)" onclick="showAnalysis('+month+')">view analysis</a></td></tr>';
		});
		$("#estimatedDeviationTable").html(estimatedDeviation);

		$.each(data[1].actualdev, function(index, item) {
			var flag = '';
			var deviation = '';
			if(item.flag == "red")
			{
				flag = "<b class='text-danger'>Danger</b>";
			}
			else if(item.flag == "No Data")
			{
				flag = "<b>No Data</b>";
			}
			else if(item.flag == "green")
			{
				flag = "<b>In-range</b>";
			}

			if(item.deviation == 'Insufficient Data')
			{
				deviation = "N/A";
			}
			else
			{
				deviation = item.deviation;
			}

			month = getMonthNumber('' + item.month);

			analysisActDev.push(item.deviation);
			actualDeviation += '<tr class="odd"><td></td><td>'+item.month+'</td><td><b>'+deviation+'</b></td><td>'+flag+'</td><td><a href="javascript:void(0)" onclick="showAnalysis('+month+')">view analysis</a></td></tr>';
		});
		$("#actualDeviationTable").html(actualDeviation);



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
			{ label: "Benchmarked Estimated Cost", data: estimated, points: { symbol: "triangle" } },
			{ label: "Benchmark Actual Cost", data: actual, points: { symbol: "diamond" } },
			{ label: "Operator Actual Cost", data: companyActual, points: { symbol: "square" }},
			{ label: "Operator Estimated Cost", data: companyEstimated, points: { symbol: "circle" }}
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
					max: monthsTotal
				},
				yaxis: {
					ticks: 15,
					min: 0,
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
					show: true,
					position: "se"
				}
			});
	});	
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panellayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>