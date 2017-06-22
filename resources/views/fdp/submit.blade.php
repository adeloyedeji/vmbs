@extends('layouts.panellayout')

@section('content')

   <script type="text/javascript">


    </script>
<div class="page">
    <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('home')}}">Submit FDP</a></li>
        <li class="breadcrumb-item active">Value Monitoring & Benchmarking</li>
      </ol>
      <h1 class="page-title">FDP</h1>
      <div class="page-header-actions">
        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round waves-effect" data-toggle="tooltip" data-original-title="Edit">
          <i class="icon md-edit" aria-hidden="true"></i>
        </button>
        <button onclick="window.location.reload()" type="button" class="btn btn-sm btn-icon btn-primary btn-round waves-effect" data-toggle="tooltip" data-original-title="Refresh">
          <i class="icon md-refresh-alt" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-sm btn-icon btn-primary btn-round waves-effect" data-toggle="modal" data-toggle="tooltip" data-target="#searchbox" data-original-title="Setting">
          <i class="icon md-search" aria-hidden="true"></i>
        </button>
      </div>
    </div>


    <!-- Page Content -->
    <div class="col-xxl-12 col-lg-12 col-xs-12">
          <!-- Example Panel With Toggle -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Add New FDP</h3> 
              <div class="panel-actions panel-actions-keep">
              
              </div>
            </div>
            <div class="panel-body">

              @include('fdp.form')
            
            </div>
          </div>
          <!-- End Example Panel With Toggle -->
        </div>
    <!-- End Page Content -->
  </div>
@endsection
