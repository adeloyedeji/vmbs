<?php $__env->startSection('content'); ?>

   <script type="text/javascript">
   $(function(){ 
                $('#search').click(function (){
                  // body...

                  $biz_arrange=$('#biz_arrange').val();
                  $well_type=$('#well_type').val();
                  $well_class=$('#well_class').val();
                  $award_year=$('#award_year').val();
                  $terrain=$('#terrain').val();
                  $license_type=$('#license_type').val();

                  window.location="<?php echo e(url('asset/searchresult')); ?>?biz_arrange="+$biz_arrange+"&well_type="+$well_type+"&well_class="+$well_class+"&award_year="+$award_year+"&terrain="+$terrain+"&license_type="+$license_type;


                }); 
              });




    </script>
<div class="page">
    <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
        <li class="breadcrumb-item active">Value Monitoring & Benchmarking</li>
      </ol>
      <h1 class="page-title">All Assets</h1>
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
              <h3 class="panel-title"  >Assets 
              <?php if(isset($_GET['biz_arrange'])): ?>
                ( Showing result for assets grouped by 

                <?php echo !empty($_GET['biz_arrange']) ? "Business arrangement:<b> {$_GET['biz_arrange']} </b>" : ''; ?> , 

                <?php echo !empty($_GET['well_type']) ? "Well Type:<b> {$_GET['well_type']} </b>" : ''; ?> ,

                <?php echo !empty($_GET['award_year']) ? "Year Awarded:<b> {$_GET['award_year']} </b>" : ''; ?>  

                 <?php echo !empty($_GET['license_type']) ? "Licence Type:<b> {$_GET['license_type']} </b>" : ''; ?>  

                 <?php echo !empty($_GET['terrain']) ? "Terrain:<b> ".Helper::get_terrain($_GET['terrain'])."</b>" : ''; ?>  
                 )
              <?php endif; ?>

              </h3> 
              <div class="panel-actions panel-actions-keep">
              
              </div>
            </div>
            <div class="panel-body"> 
               <table  class="table table-striped" id="exampleFooAccordion">
                <thead>
                  <tr class="bg-blue-grey-900">
                    <th  style="color: #fff;"  >Block Name</th>
                    <th  style="color: #fff;">Area</th>
                    <th  style="color: #fff;">Water Depth</th>
                    <th  style="color: #fff;"  >Field</th>
                    <th  style="color: #fff;"  >Licensed to</th>
                    <th  style="color: #fff;"  >Location</th>
                  </tr>
                </thead>
                <tbody>
                <?php if(count($getblock)>0): ?>
                  <?php $__currentLoopData = $getblock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr style="font-size: 15px; font-weight: 10px;">
                    <td><?php echo e(substr($block->blockname, 3)); ?> </td>
                    <td><?php echo e($block->area=="" ? 'N/a' : ucwords(strtolower($block->area))); ?></td>
                    <td><?php echo e($block->water_depth=="" ? 'N/a' : ucwords(strtolower($block->water_depth))); ?></td>
                    <td><?php echo e($block->field_name=="" ? 'N/a' : ucwords(strtolower($block->field_name))); ?></td>
                    <td >
                      <?php echo e(ucwords(strtolower(Helper::compname($block->company_id)))); ?>

                    </td>
                    <td ><a class="btn btn-success btn-pure" href="<?php echo e(url('fdp/report')); ?>" data-toggle="tooltip" data-original-title="View Location" role="button"><i class="icon md-navigation"></i></a>
                    </td>
                     </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
                <?php else: ?>
                  <tr>
                  <td><span style="font-size:25px"> No Data Available</span></td>
                  </tr>
                <?php endif; ?>
                   </tbody>
              </table>  
            <?php echo $getblock->appends(Request::capture()->except('page'))->render(); ?>

            
            </div>
          </div>
          <!-- End Example Panel With Toggle -->
        </div>
    <!-- End Page Content -->
  </div>
  <?php echo $__env->make('partials.modals.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panellayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>