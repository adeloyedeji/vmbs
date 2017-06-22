  <div class="modal fade modal-3d-sign" id="costsettings" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-success">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title">Cost Setting</h4>
        </div>
        <div class="modal-body">
          <b>Raise A flag when Submitted Cost Data Deviated By +/-</b>
          <div class="form-group form-material floating" data-plugin="formMaterial">
           <div class="input-group">
          <div class="form-control-wrap">
            <input type="number" id="percentagedeviation" value="<?php echo e(Helper::getdev()); ?>" class="form-control empty">

            <label class="floating-label"></label>
           
          </div>

         <span class="input-group-addon"><b>%</b></span>
          <span class="input-group-btn">
            <button class="btn btn-success waves-effect" onclick="savebtn($('#percentagedeviation').val())" type="button">Save</button>
          </span>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-pure waves-effect" data-dismiss="modal">Close</button>
     
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function savebtn(percentagedeviation){

        if(percentagedeviation==""){
          toastr.warning('Please Fill All Field');
          return;
        }
        $.get('<?php echo e(url('settings/create')); ?>?pdev='+percentagedeviation,function(data,status,xhr){

            if(data=="Success"){
              toastr.success('Cost Setting Saved');
              return;
            }
            toastr.error('Unable to Save Setting at the moment, Please Try again later');


        })
    }


</script>