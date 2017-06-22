<?php $__env->startSection('content'); ?>
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <!-- Page -->
  <div class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle">
      <div class="brand">
        <img class="brand-img" src="../../assets/images/logo.png" alt="...">
        <h2 class="brand-text">VMB</h2>
      </div>
      <p>Sign into your account</p>
      <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

        
        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?> form-material floating" data-plugin="formMaterial">
          <input type="email" value="<?php echo e(old('email')); ?>" class="form-control empty" id="inputEmail" name="email">
          <label class="floating-label" for="inputEmail">Email</label>
           <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
           <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> form-material floating" data-plugin="formMaterial">
          <input type="password" class="form-control empty" id="inputPassword" name="password">
          <label class="floating-label" for="inputPassword">Password</label>
               <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
        </div>
        <div class="form-group clearfix">
          <div class="checkbox-custom checkbox-inline checkbox-primary pull-xs-left">
            <input type="checkbox" id="inputCheckbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
            <label for="inputCheckbox">Remember me</label>
          </div>
          <a class="pull-xs-right" href="<?php echo e(route('password.request')); ?>">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-success btn-block">Sign in</button>
      </form>
      <p>Still no account? Please go to <a href="<?php echo e(url('register')); ?>">Register</a></p>
      <?php echo $__env->make('partials.login.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
  </div>
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>