@extends('layouts.panellayout')

@section('pg-title')
Companies
@endsection

@section('content')
	<div class="page">
		<div class="page-header">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
				<li class="breadcrumb-item active">Companies</li>
			</ol>
			<h1 class="page-title">Registered Companies</h1>
			<div class="page-header-actions">
				<button type="button" class="btn btn-sm btn-icon btn-primary btn-round waves-effect" data-toggle="tooltip" data-original-title="Edit">
					<i class="icon md-edit" aria-hidden="true"></i>
				</button>
				<button type="button" class="btn btn-sm btn-icon btn-primary btn-round waves-effect" data-toggle="tooltip" data-original-title="Refresh">
					<i class="icon md-refresh-alt" aria-hidden="true"></i>
				</button>
				<button type="button" class="btn btn-sm btn-icon btn-primary btn-round waves-effect" data-toggle="tooltip" data-original-title="Setting">
					<i class="icon md-settings" aria-hidden="true"></i>
				</button>
			</div>
		</div>
		<!-- Page Content -->

		<div class="page-content container-fluid">
			<div class="row">
				@if(count($companies) > 0)
				<?php $i = 4; ?>
				@foreach($companies as $company)
				<?php
				if ($i > 10) {$i = 0;}
				$country = app('App\Http\Controllers\UtilityController')->getCountry($company->country);
				?>
				<div class="col-xs-12 col-xl-3 col-lg-6">
					<div class="card card-inverse card-shadow bg-white">
						<div class="card-block p-30">
							<a class="avatar avatar-100 pull-xs-left m-r-20" href="{{ url('companies/directories/?lookup=') }}{{$company->id}}">
								<img src="{{ asset('') }}/{{$company->logo}}" alt="">
							</a>
							<div class="vertical-align text-xs-right h-100 text-truncate">
								<div class="vertical-align-middle">
									<div class="font-size-20 m-b-5 blue-600 text-truncate">
									{{$company->contact_lastname}} {{ $company->contact_firstname}}
									</div>
									<div class="font-size-14 text-truncate">{{$company->contact_email}}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@else
				<div class="col-md-12 col-xs-12">
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						No Registered Companies Yet, If you feel this is a bug, <a class="alert-link" href="javascript:void(0)">Click here to report this issue</a>.
					</div>
				</div>
				@endif
				{{ $companies->links() }}
			</div>
		</div>

		<!-- End Page Content -->
	</div>
	@endsection