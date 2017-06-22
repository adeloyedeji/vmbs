<script type="text/javascript">


	function loadcost(id,terrain,$terrain_id, $level_id, $template_id, $lease_id, $year, $month,$projectid){

    benchmark($terrain_id, $level_id, $template_id, $lease_id, $year, $month,$projectid,0);
        
    sessionStorage.setItem('templateid',id);
    sessionStorage.setItem('terrain',terrain);
    if(id==0){

    }
    else{
			$.get('<?php echo e(url('companies/costtemplate?id=')); ?>'+id ,function(data){

			$('#loadhtml').html(data);

			});
    }
	}


  function benchmark($terrain_id, $level_id, $template_id, $lease_id, $year, $month,$projectid,$type=0){
    if($type==1){

         window.open('<?php echo e(url('cost/benchmarking')); ?>?terrain_id='+$terrain_id+'&level_id='+$level_id+'&template_id='+$template_id+'&lease_id='+$lease_id+'&year='+$year+'&month='+$month+'&projectid='+$projectid,'_blank');

    }
    else{
          sessionStorage.setItem('terrainid',$terrain_id);
          sessionStorage.setItem('levelid',$level_id);
          sessionStorage.setItem('templateid',$template_id);
          sessionStorage.setItem('lease_id',$lease_id);
          sessionStorage.setItem('year',$year);
          sessionStorage.setItem('month',$month);
          sessionStorage.setItem('projectid',$projectid); 
     
  }

}

  function benchmark2(){

    $terrain_id=sessionStorage.getItem('terrainid');
    $level_id=sessionStorage.getItem('levelid');
    $template_id=sessionStorage.getItem('templateid');
    $lease_id=sessionStorage.getItem('lease_id');
    $year=sessionStorage.getItem('year');
    $month=sessionStorage.getItem('month');
    $projectid=sessionStorage.getItem('projectid'); 

     window.open('<?php echo e(url('cost/benchmarking')); ?>?terrain_id='+$terrain_id+'&level_id='+$level_id+'&template_id='+$template_id+'&lease_id='+$lease_id+'&year='+$year+'&month='+$month+'&projectid='+$projectid,'_blank');


  }

	$(function(){

     terrain=sessionStorage.getItem('terrain');
     templateid=sessionStorage.getItem('templateid');

       $('#allfield').select2({
           ajax: {
               delay: 250,
               processResults: function (data) {
                 
                    return {
                      
              results: data
                };
              },
               

              url: function (params) {
              return '<?php echo e(url('companies')); ?>/terrain?tid='+terrain;
              }
            
          }
        });


  }) 

</script>
<!-- VIEW COST TEMPLATE -->
<div class="modal fade modal-3d-flip-vertical modal-success" id="viewtemplate" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title">Cost Data</h4>
                        </div>
                        <div class="modal-body">
                         <div id="loadhtml"> </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary waves-effect"  onclick="benchmark2()" >Benchmark</button>
                          <!-- <button type="button" class="btn btn-primary waves-effect">Save changes</button> -->
                        </div>
                      </div>
                    </div>
                  </div>


      <!--BENCHMARK WITH -->
      <div class="modal fade modal-3d-flip-horizontal modal-success" id="benchmark_with" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title">Please Select Fields To bechmark Cost Template With</h4>
                        </div>
                        <div class="modal-body">
                        <div class="col-md-12">
                           <div class="form-group select2-info">
                  <div class="input-group input-group-lg ">
                    <span class="input-group-btn">
                      <button type="button"  class="btn btn-primary waves-effect">Field(s)</button>
                    </span>
                    <select style="width:100%; "  id="allfield" class="form-control" multiple="">
                    <option value="0" selected=""> -Type to Search- </option>
                    </select>
                  </div>
                </div>
                </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default btn-pure waves-effect" data-dismiss="modal">Close</button>
                          <button type="button" onclick="benchmark2()"  class="btn btn-primary waves-effect" >Run Benchmark</button>
                        </div>
                      </div>
                    </div>
                  </div>