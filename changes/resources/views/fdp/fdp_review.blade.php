@extends('layouts.panellayout')

@section('content')
<div class="page">
    <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Value Monitoring & Benchmarking</li>
      </ol>
      <h1 class="page-title">FDP Review Dashboard</h1>
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
          <!-- Example Panl With Toggle -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">All FDP(s)</h3>
              <div class="panel-actions panel-actions-keep">
              </div>
            </div>
            <div class="panel-body">
            <table  class="table table-striped" id="exampleFooAccordion">
                <thead>
                  <tr class="bg-blue-grey-900">
                    <th  style="color: #fff;"  >Company Name</th>
                    <th  style="color: #fff;"  >Title</th>
                    <th  style="color: #fff;">Status</th>
                    <th  style="color: #fff;">View FDP</th>
                    <th  style="color: #fff;"  >Submit Date</th>
                   
                  </tr>
                </thead>
                <tbody>
                @if(count($getfdp)>0)
                  @foreach($getfdp as $fdp)
                  <tr >
                    <td> {{ucwords(strtolower(Helper::compname($fdp->operator_id)))}}</td>
                    <td>{{ $fdp->title=="" ? 'N/a' : ucwords(strtolower($fdp->title))}}</td>
                    <td>{!! Helper::resolvestatus($fdp->status) !!}</td>
                    <td><a class="btn btn-success btn-pure" href="{{asset('$fdp->water_depth')}}" data-toggle="tooltip" data-original-title="View FDP" role="button"><i class="icon md-eye"></i></a></td>
                    <td >
                      {{$fdp->created_at->diffForHumans()}}
                    </td>
                     </tr>
                    @endforeach
                 
                @else
                  <tr>
                  <td><span style="font-size:25px"> No Data Available</span></td>
                  </tr>
                @endif
                   </tbody>
              </table>  
            {!! $getfdp->appends(Request::capture()->except('page'))->render() !!}
            
            </div>
          </div>
          <!-- End Example Panel With Toggle -->
        </div>
    <!-- End Page Content -->
  </div>
@endsection
