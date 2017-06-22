@extends('layouts.panellayout')

@section('content')
<script type="text/javascript">
  
$(function(){

  var ctx = document.getElementById("myChart").getContext('2d');

  $.get('{{url('cost/benchmarking')}}',function(data,status,xhr){


      var myRadarChart = new Chart(ctx, {
    type: 'radar',
    data: {
    labels: ['January', 'February', 'March', 'April','May','June','July','August','September','October','November','December'],
    datasets: [{
        data: data
    }]
  },
    options: options
  });




  });


})

</script>
<div class="page">
    <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Value Monitoring & Benchmarking</li>
      </ol>
      <h1 class="page-title">VMB Dashboard</h1>
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
    <div class="col-xxl-4 col-lg-6 col-xs-12">
          <!-- Example Panel With Toggle -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Benchmark Result For {{$request->projectid}}</h3>
              <div class="panel-actions panel-actions-keep">
              </div>
            </div>
            <div class="panel-body">
              <canvas id="myChart" width="400" height="400"></canvas>
            </div>
          </div>
          <!-- End Example Panel With Toggle -->
        </div>
    <!-- End Page Content -->
  </div>
@endsection
