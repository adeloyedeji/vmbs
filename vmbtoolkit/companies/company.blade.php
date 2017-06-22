@extends('layouts.panellayout')

@section('pg-title')
Operator Info
@endsection

@section('content') 
<div class="page">
	<div class="page-header">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{url('companies')}}">Companies</a></li>
			<li class="breadcrumb-item active">Company</li>
		</ol>
		<h1 class="page-title">{{$company->company}}</h1>
		<div class="page-header-actions">
			<!--<button type="button" class="btn btn-sm btn-icon btn-primary btn-round waves-effect" data-toggle="tooltip" data-original-title="Edit">
				<i class="icon md-edit" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn btn-sm btn-icon btn-primary btn-round waves-effect" data-toggle="tooltip" data-original-title="Refresh">
				<i class="icon md-refresh-alt" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn btn-sm btn-icon btn-primary btn-round waves-effect" data-toggle="tooltip" data-original-title="Setting">
				<i class="icon md-settings" aria-hidden="true"></i>
			</button>-->
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
	<!-- Page Content -->
	<div class="page-content container-fluid">
		<div class="row" data-plugin="matchHeight" data-by-row="true">
			<div class="col-xs-12 col-md-4">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Blocks</h3>
					</div>
					<div class="panel-body">
						<!-- Widget Linearea One-->
						<div class="card card-shadow">
							<div class="card-block bg-white p-20">
								<button type="button" class="btn btn-floating btn-sm btn-danger" id="blocks">
									<i class="icon md-landscape" aria-hidden="true"></i>
								</button>
								<span class="m-l-15 font-weight-400">Blocks</span>
								<div class="content-text text-xs-center m-b-0">
									<i class="text-success icon wb-triangle-up font-size-20"></i>
									<span class="font-size-40 font-weight-100">{{ count($blocks) }} </span>
									<p class="blue-grey-400 font-weight-100 m-0">Total blocks owned by {{ $company->company }}</p>
								</div>
							</div>
						</div>
						<!-- End Widget Linearea One -->
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Fields</h3>
					</div>
					<div class="panel-body">
						<!-- Widget Linearea One-->
						<div class="card card-shadow">
							<div class="card-block bg-white p-20">
								<button type="button" class="btn btn-floating btn-sm btn-info" id="fields">
									<i class="icon md-layers" aria-hidden="true"></i>
								</button>
								<span class="m-l-15 font-weight-400">Fields</span>
								<div class="content-text text-xs-center m-b-0">
									<i class="text-success icon wb-triangle-up font-size-20"></i>
									<span class="font-size-40 font-weight-100">{{ count($fields) }} </span>
									<p class="blue-grey-400 font-weight-100 m-0">Total fields registered to {{ $company->company }}</p>
								</div>
							</div>
						</div>
						<!-- End Widget Linearea One -->
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Wells</h3>
					</div>
					<div class="panel-body">
						<!-- Widget Linearea One-->
						<div class="card card-shadow">
							<div class="card-block bg-white p-20">
								<button type="button" class="btn btn-floating btn-sm btn-warning" id="wells">
									<i class="md-invert-colors" aria-hidden="true"></i>
								</button>
								<span class="m-l-15 font-weight-400">Wells</span>
								<div class="content-text text-xs-center m-b-0">
									<i class="text-success icon wb-triangle-up font-size-20"></i>
									<span class="font-size-40 font-weight-100">{{count($wells)}} </span>
									<p class="blue-grey-400 font-weight-100 m-0">Total  wells registered to {{ $company->company}}</p>
								</div>
							</div>
						</div>
						<!-- End Widget Linearea One -->
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Recent Activities (you can view cost template submitted by <b>{{strtoupper($company->company)}}(s)</b>)</h3>
					</div>
					<div class="panel-body" style="height: 400px;">
					@if(count($cost_templates)>0)

					<div class="example table-responsive">
                  <table class="table table-striped">
                    <thead class="bg-blue-grey-900" >
                      <tr > 
                        <th style="color:white">Name</th>
                        <th style="color:white">Field Name</th>
                        <th style="color:white" >Level</th>
                        <th style="color:white">Status</th>
                        <th style="color:white">License</th>
                        <th style="color:white">Submitted</th>
                        <th style="color:white">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      
                      @foreach($cost_templates as $template)
                      <tr>
                         
                        <td>{{$template->name}} </td>
                        <td>{{Helper::resolve_name($template->field_id,1)}} </td>
                        <td>{{$template->level}} </td>
                        <td>{!! Helper::resolve_status($template->status,1) !!} </td>
                      
                        <td>{{$template->license}} </td>
                        <td>{{Helper::resolve_date($template->created_at)}} </td> 
                        <td>
                   <div class="btn-group" role="group">
                    <button type="button" class="btn btn-info dropdown-toggle waves-effect" id="exampleIconDropdown1" data-toggle="dropdown" aria-expanded="true">
                      <i class="icon md-apps" aria-hidden="true"></i>
                    </button> 
                    <div class="dropdown-menu" aria-labelledby="exampleIconDropdown1" role="menu">
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem"  onclick="loadcost({{$template->id}},{{Helper::resolve_name($template->field_id,2)}},{{Helper::resolve_terrain($template->field_id,1)}}, {{$template->level_id}}, {{$template->id}}, {{Helper::resolve_terrain($template->field_id,3)}}, '{{date('Y',strtotime($template->created_at))}}', '{{date('m',strtotime($template->created_at))}}',{{Helper::get_Total($template->id,1)}},{{Helper::get_Total($template->id,2)}})"  id="viewtemplatebtn" data-toggle="modal" data-target="#viewtemplate"><i class="icon md-eye"></i>View Template</a>
 	
                   <a onclick="benchmark({{Helper::resolve_terrain($template->field_id,1)}}, {{$template->level_id}}, {{$template->id}}, {{Helper::resolve_terrain($template->field_id,3)}}, '{{date('Y',strtotime($template->created_at))}}', '{{date('m',strtotime($template->created_at))}}',{{Helper::get_Total($template->id,1)}},{{Helper::get_Total($template->id,2)}},1)"  class="dropdown-item" href="javascript:void(0)" role="menuitem"><i  class="icon md-eye" ></i>Benchmark</a>
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i  class="icon md-eye" ></i>Trend Analysis</a>
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i  class="icon md-eye" ></i>Approve/Reject</a>

                   </div>
                  </div> </td> 
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

					@else
						<h3>No recent activities yet.</h3>
					@endif

					 {!! $cost_templates->appends(Request::capture()->except('page'))->render() !!}
                </div>

					</div>
				</div>
			</div>
		</div>
	</div>
	
	@include('partials.modals.costtemplate')
	<!-- End Page Content -->
</div>
<script src="{{asset('global/vendor/jquery/jquery.js')}}"></script>
<script type="text/javascript">
	$(function() {
		$("#blocks").click(function() {
			window.location.href = "{{url('companies/raw?object=blocks')}}";
		});
		$("#fields").click(function() {
			window.location.href = "{{url('companies/raw?object=fields')}}";
		});
		$("#wells").click(function() {
			window.location.href = "{{url('companies/raw?object=wells')}}";
		});
	});
	function lookup(id)
	{
		window.location.href = "{{url('companies/directories?lookup=')}}" + id;
	}
</script>
@endsection