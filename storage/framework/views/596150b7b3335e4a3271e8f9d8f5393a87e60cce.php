 <script src="<?php echo e(asset('global/vendor/babel-external-helpers/babel-external-helpers.js')); ?>"></script>

 <script src="<?php echo e(asset('global/vendor/tether/tether.js')); ?>"></script>
 <script src="<?php echo e(asset('global/vendor/bootstrap/bootstrap.js')); ?>"></script>
 <script src="<?php echo e(asset('global/vendor/animsition/animsition.js')); ?>"></script>
 <script src="<?php echo e(asset('global/vendor/mousewheel/jquery.mousewheel.js')); ?>"></script>
 <script src="<?php echo e(asset('global/vendor/asscrollbar/jquery-asScrollbar.js')); ?>"></script>
 <script src="<?php echo e(asset('global/vendor/asscrollable/jquery-asScrollable.js')); ?>"></script>
 <script src="<?php echo e(asset('global/vendor/ashoverscroll/jquery-asHoverScroll.js')); ?>"></script>
 <script src="<?php echo e(asset('global/vendor/waves/waves.js')); ?>"></script>
 <!-- Plugins -->
 <script src="<?php echo e(asset('global/vendor/switchery/switchery.min.js')); ?>"></script>
 <script src="<?php echo e(asset('global/vendor/intro-js/intro.js')); ?>"></script>
 <script src="<?php echo e(asset('global/vendor/screenfull/screenfull.js')); ?>"></script>
 <script src="<?php echo e(asset('global/vendor/slidepanel/jquery-slidePanel.js')); ?>"></script>
 <script src="<?php echo e(asset('global/vendor/select2/select2.full.min.js')); ?>"></script>
 <script src="<?php echo e(asset('global/vendor/chart-js/Chart.js')); ?>"></script>
 <!-- Scripts -->
 
 <script src="<?php echo e(asset('global/js/State.js')); ?>"></script>
 <script src="<?php echo e(asset('global/js/Component.js')); ?>"></script>
 <script src="<?php echo e(asset('global/js/Plugin.js')); ?>"></script>
 <script src="<?php echo e(asset('global/js/Base.js')); ?>"></script>
 <script src="<?php echo e(asset('global/js/Config.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/js/Section/Menubar.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/js/Section/GridMenu.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/js/Section/Sidebar.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/js/Section/PageAside.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/js/Plugin/menu.js')); ?>"></script>
 <script src="<?php echo e(asset('global/js/config/colors.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/js/config/tour.js')); ?>"></script>

 <script>
  Config.set('assets', 'assets');
</script>
<!-- Page -->
<script src="<?php echo e(asset('assets/js/Site.js')); ?>"></script>
<script src="<?php echo e(asset('global/js/Plugin/asscrollable.js')); ?>"></script>
<script src="<?php echo e(asset('global/js/Plugin/slidepanel.js')); ?>"></script>
<script src="<?php echo e(asset('global/js/Plugin/switchery.js')); ?>"></script>
<script src="<?php echo e(asset('global/vendor/bootstrap-select/bootstrap-select.js')); ?>"></script>
<script src="<?php echo e(asset('global/js/Plugin/bootstrap-select.js')); ?>"></script>
<script src="<?php echo e(asset('global/vendor/footable/footable.all.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('global/vendor/flot/jquery.flot.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/jquery.flot.symbol.js')); ?>"></script>
<script src="<?php echo e(asset('global/js/Plugin/toastr.js')); ?>"></script>
<script src="<?php echo e(asset('global/vendor/toastr/toastr.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pace.min.js')); ?>"></script>
<?php if(active('cost/benchmarking')): ?>
<script src="<?php echo e(asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('global/js/Plugin/bootstrap-datepicker.js')); ?>"></script>
<script type="text/javascript">
	$(function() {
		$(".input-daterange").datepicker({
			format: "yyyy-mm",
			calendarWeeks: true,
			clearBtn: true,
			todayHighlight: true,
			viewMode: "months",
			minViewMode: "months"
		});
	});
</script>
<?php endif; ?>
<script>
  (function(document, window, $) {
    'use strict';
    var Site = window.Site;
    $(document).ready(function() {
      Site.run();
    });
  })(document, window, jQuery);
</script>
