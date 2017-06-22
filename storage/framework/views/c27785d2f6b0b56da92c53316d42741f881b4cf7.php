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
				 <?php if(count($getbizrrange)>0): ?>
				 <?php $__currentLoopData = $getbizrrange; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $biz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

				 <option value="<?php echo e($biz->lease_type); ?>" <?php echo e(isset($_GET['terrain'])&&$_GET['biz_arrange']==$biz->lease_type ? 'selected': ''); ?>><?php echo e($biz->lease_type); ?></option>
				 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				 <?php endif; ?>
			 </select>
			 </div>
			 	<div class="col-md-12" style="margin-bottom: 10px;">
			 <select data-plugin="selectpicker" id="well_type" data-live-search="true" data-style="btn">
				<option value='0'>-Well Type-</option>
				<?php if(count($welltype)>0): ?>
				<?php $__currentLoopData = $welltype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option <?php echo e(isset($_GET['terrain'])&&$_GET['well_type']==$type->type ? 'selected': ''); ?> value="<?php echo e($type->type); ?>"><?php echo e($type->type); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
			</select>
			</div>
				<div class="col-md-12" style="margin-bottom: 10px;">
			<select data-plugin="selectpicker" id="well_class" data-live-search="true" data-style="btn-success">

				<option value='0'>-Well Class-</option>
				<?php if(count($wellclass)>0): ?>
				<?php $__currentLoopData = $wellclass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option <?php echo e(isset($_GET['terrain'])&&$_GET['well_class']==$class->id ? 'selected': ''); ?> value="<?php echo e($class->id); ?>"><?php echo e($class->classname); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
			</select>
			</div>
				<div class="col-md-12" style="margin-bottom: 10px;">
			<select data-plugin="selectpicker" id="award_year" data-live-search="true" data-style="btn">
				<option value='0'>-Year Awarded-</option>

				<?php for($i=1950; $i<=date('Y'); $i++): ?>
				<option <?php echo e(isset($_GET['terrain'])&&$_GET['award_year']==$i ? 'selected': ''); ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
				<?php endfor; ?>
				
			</select>
			</div>
				<div class="col-md-12" style="margin-bottom: 10px;">
			<select data-plugin="selectpicker" id="license_type" data-live-search="true" data-style="btn">
				<option value='0'>-License Type-</option>
				<option value='OPL' <?php echo e(isset($_GET['license_type'])&&$_GET['license_type']=='OPL' ? 'selected': ''); ?>>OPL</option>
				<option value='OML' <?php echo e(isset($_GET['license_type'])&&$_GET['license_type']=='OML' ? 'selected': ''); ?>>OML</option>
			</select>
			</div>

				<div class="col-md-12" style="margin-bottom: 10px;">
			<select data-plugin="selectpicker" id="terrain" data-live-search="true" data-style="btn-success">
				<option value='0'>-Terrains-</option>
				<?php if(count($terrains)>0): ?>
				<?php $__currentLoopData = $terrains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $terrain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option <?php echo e(isset($_GET['terrain'])&&$_GET['terrain']==$terrain->id ? 'selected': ''); ?> value="<?php echo e($terrain->id); ?>"><?php echo e($terrain->name); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>

			</select>
			</div>
		</div>
		<div class="modal-footer">
			
			<button data-toggle="tooltip" id="search" data-original-title="Search" type="button" class="btn btn-success waves-effect"><i class="icon md-search" aria-hidden="true"></i>Search</button>
		 
		</div>
	</div>
</div>
</div>