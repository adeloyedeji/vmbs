<?php $__env->startSection('pg-title'); ?>
Operator Info
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
<div class="page">
	<div class="page-header">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="<?php echo e(url('companies')); ?>">Companies</a></li>
			<li class="breadcrumb-item active">Company</li>
		</ol>
		<h1 class="page-title"><?php echo e($company->company); ?></h1>
		<div class="page-header-actions">
			<!--<button type="button" class="btn btn-sm btn-icon btn-primary btn-round waves-effect" data-toggle="tooltip" data-original-title="Edit">
				<i class="icon md-edit" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn btn-sm btn-icon btn-primary btn-round waves-effect" data-toggle="tooltip" data-original-title="Refresh">
				<i class="icon md-refresh-alt" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn btn-sm btn-icon btn-primary btn-round waves-effect" data-toggle="tooltip" data-original-title="Setting">
				<i class="icon md-settings" aria-hidden="true"></i>
			</button>-->
			<select class="form-control" data-plugin="select2" onchange="lookup($(this).val())">
				<?php if(count($companies) > 0): ?>
				<?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companySelect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($company->id == $companySelect->id): ?>
				<option selected="selected" value="<?php echo e($companySelect->id); ?>"><?php echo e($companySelect->company); ?></option>
				<?php else: ?>
				<option value="<?php echo e($companySelect->id); ?>"><?php echo e($companySelect->company); ?></option>
				<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
				<option value="0">No Companies Defined Yet.</option>
				<?php endif; ?>
			</select>
		</div>
	</div>
	<!-- Page Content -->
	<div class="page-content container-fluid">
		<div class="row" data-plugin="matchHeight" data-by-row="true">
			<div class="col-xs-12 col-md-4">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Blocks</h3>
					</div>
					<div class="panel-body">
						<!-- Widget Linearea One-->
						<div class="card card-shadow">
							<div class="card-block bg-white p-20">
								<button type="button" class="btn btn-floating btn-sm btn-danger" id="blocks">
									<i class="icon md-landscape" aria-hidden="true"></i>
								</button>
								<span class="m-l-15 font-weight-400">Blocks</span>
								<div class="content-text text-xs-center m-b-0">
									<i class="text-success icon wb-triangle-up font-size-20"></i>
									<span class="font-size-40 font-weight-100"><?php echo e(count($blocks)); ?> </span>
									<p class="blue-grey-400 font-weight-100 m-0">Total blocks owned by <?php echo e($company->company); ?></p>
								</div>
							</div>
						</div>
						<!-- End Widget Linearea One -->
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Fields</h3>
					</div>
					<div class="panel-body">
						<!-- Widget Linearea One-->
						<div class="card card-shadow">
							<div class="card-block bg-white p-20">
								<button type="button" class="btn btn-floating btn-sm btn-info" id="fields">
									<i class="icon md-layers" aria-hidden="true"></i>
								</button>
								<span class="m-l-15 font-weight-400">Fields</span>
								<div class="content-text text-xs-center m-b-0">
									<i class="text-success icon wb-triangle-up font-size-20"></i>
									<span class="font-size-40 font-weight-100"><?php echo e(count($fields)); ?> </span>
									<p class="blue-grey-400 font-weight-100 m-0">Total fields registered to <?php echo e($company->company); ?></p>
								</div>
							</div>
						</div>
						<!-- End Widget Linearea One -->
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Wells</h3>
					</div>
					<div class="panel-body">
						<!-- Widget Linearea One-->
						<div class="card card-shadow">
							<div class="card-block bg-white p-20">
								<button type="button" class="btn btn-floating btn-sm btn-warning" id="wells">
									<i class="md-invert-colors" aria-hidden="true"></i>
								</button>
								<span class="m-l-15 font-weight-400">Wells</span>
								<div class="content-text text-xs-center m-b-0">
									<i class="text-success icon wb-triangle-up font-size-20"></i>
									<span class="font-size-40 font-weight-100"><?php echo e(count($wells)); ?> </span>
									<p class="blue-grey-400 font-weight-100 m-0">Total  wells registered to <?php echo e($company->company); ?></p>
								</div>
							</div>
						</div>
						<!-- End Widget Linearea One -->
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Recent Activities (you can view cost template submitted by <b><?php echo e(strtoupper($company->company)); ?>(s)</b>)</h3>
					</div>
					<div class="panel-body" style="height: 400px;">
						<?php if(count($cost_templates)>0): ?>

						<div class="">
							<table class="table table-striped">
								<thead class="bg-blue-grey-900" >
									<tr > 
										<th style="color:white">Name</th>
										<th style="color:white">Field Name</th>
										<th style="color:white" >Level</th>
											<th style="color:white">Action</th>
										<th style="color:white">Status</th>
										<th style="color:white">License</th>
										<th style="color:white">Reason</th>
										<th style="color:white">Submitted</th>
									
									</tr>
								</thead>
								<tbody>


									<?php $__currentLoopData = $cost_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>

										<td><?php echo e(Helper::resolve_Projectname($template->project_id)); ?> </td>
										<td><?php echo e(Helper::resolve_name($template->field_id,1)); ?> </td>
										<td><?php echo e($template->level); ?> </td>
											<td>
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-info dropdown-toggle waves-effect" id="exampleIconDropdown1" data-toggle="dropdown" aria-expanded="true">
													<i class="icon md-apps" aria-hidden="true"></i>
												</button> 
												<div class="dropdown-menu" aria-labelledby="exampleIconDropdown1" role="menu">
													<a class="dropdown-item" href="javascript:void(0)" role="menuitem"  onclick="loadcost(<?php echo e($template->id); ?>,<?php echo e(Helper::resolve_name($template->field_id,2)); ?>,<?php echo e(Helper::resolve_terrain($template->field_id,1)); ?>, <?php echo e($template->level_id); ?>, <?php echo e($template->id); ?>, <?php echo e(Helper::resolve_terrain($template->field_id,3)); ?>, '<?php echo e(date('Y',strtotime($template->created_at))); ?>', '<?php echo e(date('m',strtotime($template->created_at))); ?>',<?php echo e($template->project_id); ?>)"  id="viewtemplatebtn" data-toggle="modal" data-target="#viewtemplate"><i class="icon md-eye"></i>View Template</a>

													<a onclick="benchmark(<?php echo e(Helper::resolve_terrain($template->field_id,1)); ?>, <?php echo e($template->level_id); ?>, <?php echo e($template->id); ?>, <?php echo e(Helper::resolve_terrain($template->field_id,3)); ?>, '<?php echo e(date('Y',strtotime($template->created_at))); ?>', '<?php echo e(date('m',strtotime($template->created_at))); ?>',<?php echo e($template->project_id); ?>,1)"  class="dropdown-item" href="javascript:void(0)" role="menuitem"><i  class="icon md-eye" ></i>Benchmark</a>
													<a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i  class="icon md-eye" ></i>Trend Analysis</a>
													<a href="javascript:void(0)" class="dropdown-item" onclick="makeAction(<?php echo e($template->id); ?>,<?php echo e($template->status); ?>)" role="menuitem"><i  class="icon md-eye" ></i>Approve/Reject</a>

												</div>
											</div> </td> 
										<td id="stat<?php echo e($template->id); ?>"><?php echo Helper::resolve_status($template->status,1); ?> </td>

										<td><?php echo e($template->license); ?> </td>
										<td> 
											 <button class="btn btn-icon btn-pure btn-md" data-toggle="modal" data-target="#reasonmodal"><i data-toggle="tooltip" data-original-title="View Reason For Action " class="icon md-eye"></i></button>
											  <?php echo $__env->make('partials.modals.reason', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									    </td>
										<td><?php echo e(Helper::resolve_date($template->created_at)); ?> </td> 
									
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
								</table>

								<?php else: ?>
								<h3>No recent activities yet.</h3>
								<?php endif; ?>

								<?php echo $cost_templates->appends(Request::capture()->except('page'))->render(); ?>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<?php echo $__env->make('partials.modals.costtemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('partials.modals.approvetemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- End Page Content -->
	</div> 
	<script type="text/javascript">

		function lookup(id)
		{
			window.location.href = "<?php echo e(url('companies/directories?lookup=')); ?>" + id;
		}

		function makeAction($templateid,$decision){

					
					$('#approvemodal').modal({ backdrop:'static', keyboard:false });

					sessionStorage.setItem('templateid',$templateid);
					sessionStorage.setItem('decision',$decision);	
			

		}

		function alertaction($decision){
			$templateid=sessionStorage.getItem('templateid');
			sessionStorage.setItem('decision',$decision);
			$('#approvemodal').modal('hide');
			$('#Reason').modal({backdrop:'static',keyboard:false});
		
		}
		function finalize($reason){
				
				if($reason==""){
						toastr.warning('Please Enter reason for decision');
						return;
				}
				$templateid=sessionStorage.getItem('templateid');
				$decision=sessionStorage.getItem('decision');

				decide($templateid,$decision,$reason);
		}

		function decide($templateid,$decision,$reason){


			$.post('<?php echo e(url('companies')); ?>',{

				_token:'<?php echo e(csrf_token()); ?>',
				tempid:$templateid,
				decision:$decision,
				reason:$reason
			},function(data,status,xhr){
				if(xhr.status==200){

					if(data!='Success'){
						toastr.error(data);
					}
					else{
					if($decision==1){

						$('#stat'+$templateid).html('<span class="tag tag-danger">Rejected</span>');
						toastr.success('Cost Data Rejected');

					}
					else if($decision==2){
						$('#stat'+$templateid).html('<span class="tag tag-success">Approved</span>');
						toastr.success('Cost Data Approved');
 
					}

					}
					$('#Reason').modal('hide');
					return;
				}

					$('#Reason').modal('hide');
				return toastr.error('Some Error Occurred,Please Try again later');

			});


		}
	</script>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panellayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>