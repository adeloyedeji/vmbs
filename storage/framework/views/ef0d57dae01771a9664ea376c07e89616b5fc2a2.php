
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <title>Login | Value Monitoring & Benchmarking </title>
  <?php echo $__env->make('partials.login.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </head>
<body class="animsition page-login layout-full page-dark">
	<?php echo $__env->yieldContent('content'); ?>
  <!-- End Page -->
 <?php echo $__env->make('partials.login.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>