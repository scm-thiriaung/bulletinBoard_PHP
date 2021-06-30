<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/common/common.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/welcome/welcome.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <title>Simple Laravel Form</title>
</head>

<body>
  <div class="header headerBorderLine">
    <?php if(isset(Auth::user()->email)): ?>
      <?php echo $__env->make('common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
      <a href="<?php echo e(route('register')); ?>" style="font-size:20px;margin-right:19px;" class="FloatRight">Register</a>
      <a href="<?php echo e(route('login')); ?>" style="font-size:20px;margin-right:19px;" class="FloatRight">Login</a>
    <?php endif; ?>
  </div>
  <div class="content">
    <div class="title m-b-md">
      Laravel
    </div>
    <div class="links">
      <a href="#">Documentation</a>
      <a href="#">Laracasts</a>
      <a href="#">News</a>
      <a href="#">Forge</a>
      <a href="#">GitHub</a>
    </div>
  </div>
</body>

</html>
<?php /**PATH C:\Apache24\htdocs\bulletinBoard_PHP\resources\views/welcome.blade.php ENDPATH**/ ?>