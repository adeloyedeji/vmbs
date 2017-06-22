@extends('layouts.panellayout')

@section('content')
<div class="page">
    <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Value Monitoring & Benchmarking</li>
      </ol>
      <h1 class="page-title">Report Dashboard</h1>
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
    <div class="col-xxl-12 col-lg-12 col-xs-12">
          <!-- Example Panel With Toggle -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Asset Location</h3>
              <div class="panel-actions panel-actions-keep">
              </div>
            </div>
            <div class="panel-body">
              
            <div class="col-md-12">
              <iframe width="1000" height="600" src="https://app.powerbi.com/view?r=eyJrIjoiMmQ4ZGVmYWItNzNhNi00MzVjLWFjNGYtOGNhY2QyNTMxNzM3IiwidCI6ImJhMTMwZWNhLTMwMzAtNDhlMS05MDg5LWM5NzkyOTNhZWI3MCIsImMiOjh9" frameborder="0" allowFullScreen="true"></iframe>
              </div>
            </div>
          </div>
          <!-- End Example Panel With Toggle -->
        </div>
    <!-- End Page Content -->
  </div>
@endsection
