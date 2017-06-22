@extends('layouts.panellayout')

@section('pg-title')
Operator Info
@endsection

@section('content')
<?php
function getBlockMeaning($abbr)
{
	$payload = substr($abbr, 0, 2);
	if($payload == 'OML')
	{
		return 'Oil Minning License';
	}
	else
	{
		return 'Oil Prospecting License';
	}
}
?>
<div class="page">
	<div class="page-header">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{url('companies')}}">Companies</a></li>
			<li class="breadcrumb-item active">Company</li>
		</ol>
		<h1 class="page-title">{{$company->company}}<small>@if(session()->has('company_asset')) @if(session('company_asset') == 'blocks') - Blocks @elseif(session('company_asset') == 'fields') - Fields @else - Wells @endif @endif</small></h1>
		<div class="page-header-actions">
			<select class="form-control" data-plugin="select2" onchange="lookup($(this).val())">
				@if(count($companies) > 0)
				@foreach($companies as $companySelect)
				@if($company->id == $companySelect->id)
				<option selected="selected" value="{{$companySelect->id}}">{{$companySelect->company}}</option>
				@else
				<option value="{{$companySelect->id}}">{{$companySelect->company}}</option>
				@endif
				@endforeach
				@else
				<option value="0">No Companies Defined Yet.</option>
				@endif
			</select>
		</div>
	</div>
	<div class="page-content container-fluid">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="col-md-12 col-xs-12">
					<div class="btn-group hidden-sm-down" id="exampleToolbar" role="group">
						<button type="button" class="btn btn-info btn-icon" id="blocksFilter">
							<i class="icon md-landscape" aria-hidden="true"></i> Blocks 
						</button>
						<button type="button" class="btn btn-info btn-icon" id="fieldsFilter">
							<i class="icon md-layers" aria-hidden="true"></i> Fields
						</button>
						<button type="button" class="btn btn-info btn-icon" id="wellsFilter">
							<i class="icon md-invert-colors" aria-hidden="true"></i> Wells
						</button>
					</div>
				</div>
				<div class="table-responsive">
					@if(session()->has('company_asset'))
					@if(session('company_asset') == 'blocks')
					@if(count($data) > 0)
					<table class="table table-striped" data-plugin="floatThead">
						<thead>
							<tr>
								<th></th>
								<th>Block Name </th>
								<th>Water Depth</th>
								<th>Area of Coverage</th>
								<th>Lease Type</th>
								<th>Date Awarded</th>
								<th>Record saved on</th>
							</tr>
						</thead>
						<tbody aria-relevant="all" aria-live="polite">
							@foreach($data as $datum)
							<tr class="odd">
								<td>
									@if($datum->open == 0) 
									<i class="icon md-lock" aria-hidden="true"></i> 
									@else 
									<i class="icon md-lock-open" aria-hidden="true"></i> 
									@endif
								</td>
								<td>
									<h5>{{$datum->blockname}}</h5>
									<small>{{ getBlockMeaning($datum->blockname) }}</small>
								</td>
								<td>
									<div class="time-from-now">{{$datum->water_depth}}</div>
								</td>
								<td>
									{{$datum->area}}
								</td>
								<td>
									<?php
									$leaseType = app('App\Http\Controllers\UtilityController')->getLeaseType($datum->lease_id);
									?>
									<h5>{{$leaseType['lease']}}</h5>
									<small>{{$leaseType['description']}}</small>
								</td>
								<td>
									{{ $datum->date_award}}
								</td>
								<td>
									{{ $datum->created_at}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{!! $data->appends(request()->input())->links() !!}
					@else
					<div class="col-md-12 col-xs-12">
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
							No record found. If you feel this is an error, <a class="alert-link" href="javascript:void(0)">Click here to report this issue</a>.
						</div>
					</div>
					@endif


					@elseif(session('company_asset') == 'fields')
					@if(count($data) > 0)
					@else
					<div class="col-md-12 col-xs-12">
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
							No record found. If you feel this is an error, <a class="alert-link" href="javascript:void(0)">Click here to report this issue</a>.
						</div>
					</div>
					@endif
					<table class="table table-striped" data-plugin="floatThead">
						<thead>
							<tr>
								<th>Field Name </th>
								<th>Block</th>
								<th>Number of wells</th>
								<th>Zone</th>
								<th>Terrain</th>
								<th>Date Discovered</th>
								<th>Production Start Date</th>
								<th>Record saved on</th>
							</tr>
						</thead>
						<tbody aria-relevant="all" aria-live="polite">
							@if(count($data)>0)
							@foreach($data as $datum)
							<tr class="odd">
								<td>{{$datum->field_name}}</td>
								<td>
									<?php 
									$blockData = app('App\Http\Controllers\CompanyController')->getCompanyFieldBlock($datum->block_id);
									$leaseType = app('App\Http\Controllers\UtilityController')->getLeaseType($blockData['lease_id']);
									?>
									<h5>{{$blockData['blockname']}}</h5>
									<small>Date Awarded: {{$blockData['date_award']}} | {{$leaseType['lease']}}</small>
								</td>
								<td>
									<div class="time-from-now">{{$datum->number_wells}}</div>
								</td>
								<td>{{$datum->zone_name}}</td>
								<td>
									<h5>{{$datum->terrain}}</h5>
								</td>
								<td>
									<h5>{{$datum->discovery}}</h5>
								</td>
								<td>
									<h5>{{$datum->production_start}}</h5>
								</td>
								<td>
									<h5>{{Helper::resolve_date($datum->created_at)}}</h5>
									<small>Pepsi Co</small>
								</td>
							</tr>
							@endforeach
							@else
							<tr><span style="font-size:20px;"> No Data Found.</span> </tr>
							@endif
						</tbody>
					</table>
					{!! $data->appends(request()->input())->links() !!}

					<!--Else if selected filter button is well -->
					@else
					@if(count($data) > 0)
					<table class="table table-striped" data-plugin="floatThead">
						<thead>
							<tr>
								<th>Well Name </th>
								<th>Type</th>
								<th>Area</th>
								<th>Status</th>
								<th>Field</th>
								<th>Capacity</th>
								<th>Date Discovered</th>
							</tr>
						</thead>
						<tbody aria-relevant="all" aria-live="polite">
							@foreach($data as $datum)
							<tr class="odd">
								<td>
									<h5>{{$datum->well_name}}</h5>
									<small>Created at: {{$datum->created_at}} | Last modified on: {{$datum->updated_at}}</small>
								</td>
								<td>
									<div class="time-from-now">{{$datum->type}}</div>
								</td>
								<td>{{$datum->area}}</td>
								<td>
									<h5>{{$datum->status}}</h5>
								</td>
								<td>
									<?php
									$fieldData = app('App\Http\Controllers\CompanyController')->getCompanyWellField($datum->field_id);
									$blockData = app('App\Http\Controllers\CompanyController')->getCompanyFieldBlock($fieldData['block_id']);
									$leaseType = app('App\Http\Controllers\UtilityController')->getLeaseType($blockData['lease_id']);
									?>
									<h5>{{$fieldData['field_name']}}</h5>
									<small>Block: {{$blockData['blockname']}} | {{$leaseType['lease']}}</small>
								</td>
								<td>
									<h5>{{$datum->capacity}}</h5>
								</td>
								<td>
									<h5>{{$datum->date_discovered}}</h5>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

					@else
					<div class="col-md-12 col-xs-12">
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
							No record found. If you feel this is an error, <a class="alert-link" href="javascript:void(0)">Click here to report this issue</a>.
						</div>
					</div>
					@endif

					<!--Endif for filter buttong group for blocks, fields and wells -->
					@endif
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{asset('global/vendor/jquery/jquery.js')}}"></script>
<script type="text/javascript">
	$(function() {
		$("#blocksFilter").click(function() {
			window.location.href = "{{url('companies/raw?object=blocks')}}";
		});
		$("#fieldsFilter").click(function() {
			window.location.href = "{{url('companies/raw?object=fields')}}";
		});
		$("#wellsFilter").click(function() {
			window.location.href = "{{url('companies/raw?object=wells')}}";
		});
	});
	function lookup(id)
	{
		window.location.href = "{{url('companies/directories?lookup=')}}" + id;
	}
</script>
@endsection