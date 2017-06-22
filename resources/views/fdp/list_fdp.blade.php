@extends('layouts.panellayout')

@section('content')

   <script type="text/javascript">

    </script>

<div class="page">
    <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('home')}}">FDP</a></li>
        <li class="breadcrumb-item active">Value Monitoring & Benchmarking</li>
      </ol>
      <h1 class="page-title">All FDPs</h1>
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
              <h3 class="panel-title">FDPs</h3> 
              <div class="panel-actions panel-actions-keep">
              
              </div>
            </div>
            <div class="panel-body"> 
               <table  class="table table-striped" id="exampleFooAccordion">
                <thead>
                  <tr class="bg-blue-grey-200">
                    <th style="color: #fff;" data-toggle="true">Name</th>
                    <th style="color: #fff;">Level</th>
                    <th style="color: #fff;">Type</th>
                    <th style="color: #fff;" data-hide="all">Terrain</th>
                    <th style="color: #fff;" data-hide="all">Status</th>
                    <th style="color: #fff;" data-hide="all">Review</th>
                    <th style="color: #fff;" data-hide="all">Created On</th>
                    <th style="color: #fff;" data-hide="all">Actions</th>
                  </tr>
                </thead>
                <tbody>
                @if($fdps)
                  @foreach($fdps as $fdp)
                  <tr>
                    <td>{{$fdp->name}}</td>
                    <td>{{$fdp->level}}</td>
                    <td>{{$fdp->type}}</td>
                    <td>{{$fdp->terrain}}</td>

                    <td>
                    @if( $fdp->status )

                    <small class="tag tag-round tag-success">Approved</small>

                    @else

                    <small class="tag tag-round tag-warning">Pending</small>

                    @endif
                    <td>
                    @if( $fdp->review )

                    <small class="tag tag-round tag-success">Yes</small>

                    @else

                    <small class="tag tag-round tag-danger">No</small>

                    @endif
                    </td>
                    <td>{{$fdp->created_at}}</td>
                  <td>

                    
                    <a href="{{url('fdp/review')}}/{{$fdp->id}}"><small class="tag tag-round tag-warning">add review</small></a>

                  </td>
                     </tr>
                    @endforeach
                 
                @else
                  <tr>
                  <td><span style="font-size:25px">No Data Available</span></td>
                  </tr>
                @endif
                   </tbody>
              </table>  

            {!! $fdps->appends(Request::capture()->except('page'))->render() !!}
            
            </div>
          </div>
          <!-- End Example Panel With Toggle -->
        </div>
    <!-- End Page Content -->
  </div>
@endsection
