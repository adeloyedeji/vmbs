<div class="modal fade" id="searchbox" aria-labelledby="examplePositionSidebar" role="dialog" tabindex="-1" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sidebar modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title"><legend>Sort Criteria</legend></h4>
			</div>
			<div class="modal-body">
			<div class="col-md-12" style="margin-bottom: 10px;">
				<select  data-plugin="selectpicker" id="biz_arrange" data-live-search="true" data-style="btn-success">
				 <option value="0">-Business Arrangement-</option>
				 @if(count($getbizrrange)>0)
				 @foreach($getbizrrange as $biz) 

				 <option value="{{$biz->lease_type}}" {{isset($_GET['terrain'])&&$_GET['biz_arrange']==$biz->lease_type ? 'selected': ''}}>{{$biz->lease_type}}</option>
				 @endforeach
				 @endif
			 </select>
			 </div>
			 	<div class="col-md-12" style="margin-bottom: 10px;">
			 <select data-plugin="selectpicker" id="well_type" data-live-search="true" data-style="btn">
				<option value='0'>-Well Type-</option>
				@if(count($welltype)>0)
				@foreach($welltype as $type)
				<option {{isset($_GET['terrain'])&&$_GET['well_type']==$type->type ? 'selected': ''}} value="{{$type->type}}">{{$type->type}}</option>
				@endforeach
				@endif
			</select>
			</div>
				<div class="col-md-12" style="margin-bottom: 10px;">
			<select data-plugin="selectpicker" id="well_class" data-live-search="true" data-style="btn-success">

				<option value='0'>-Well Class-</option>
				@if(count($wellclass)>0)
				@foreach($wellclass as $class)
				<option {{isset($_GET['terrain'])&&$_GET['well_class']==$class->id ? 'selected': ''}} value="{{$class->id}}">{{$class->classname}}</option>
				@endforeach
				@endif
			</select>
			</div>
				<div class="col-md-12" style="margin-bottom: 10px;">
			<select data-plugin="selectpicker" id="award_year" data-live-search="true" data-style="btn">
				<option value='0'>-Year Awarded-</option>

				@for($i=1950; $i<=date('Y'); $i++)
				<option {{isset($_GET['terrain'])&&$_GET['award_year']==$i ? 'selected': ''}} value="{{$i}}">{{$i}}</option>
				@endfor
				
			</select>
			</div>
				<div class="col-md-12" style="margin-bottom: 10px;">
			<select data-plugin="selectpicker" id="license_type" data-live-search="true" data-style="btn">
				<option value='0'>-License Type-</option>
				<option value='OPL' {{isset($_GET['license_type'])&&$_GET['license_type']=='OPL' ? 'selected': ''}}>OPL</option>
				<option value='OML' {{isset($_GET['license_type'])&&$_GET['license_type']=='OML' ? 'selected': ''}}>OML</option>
			</select>
			</div>

				<div class="col-md-12" style="margin-bottom: 10px;">
			<select data-plugin="selectpicker" id="terrain" data-live-search="true" data-style="btn-success">
				<option value='0'>-Terrains-</option>
				@if(count($terrains)>0)
				@foreach($terrains as $terrain)
				<option {{isset($_GET['terrain'])&&$_GET['terrain']==$terrain->id ? 'selected': ''}} value="{{$terrain->id}}">{{$terrain->name}}</option>
				@endforeach
				@endif

			</select>
			</div>
		</div>
		<div class="modal-footer">
			
			<button data-toggle="tooltip" id="search" data-original-title="Search" type="button" class="btn btn-success waves-effect"><i class="icon md-search" aria-hidden="true"></i>Search</button>
		 
		</div>
	</div>
</div>
</div>