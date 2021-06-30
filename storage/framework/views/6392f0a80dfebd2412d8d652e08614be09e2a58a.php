<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simple Laravel Form</title>
  <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/common/common.css')); ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="links header headerBorderLine">
    <a href="<?php echo e(route('user.index')); ?>" class="FloatRight" style="font-size:20px;margin-right:19px;">Home</a>
  </div>
  <div class="container box">
    <h3 align="center" class="title">Login Form</h3><br />
    <?php if($message = Session::get('error')): ?>
      <div class="alert alert-danger alert-block">
        <strong><?php echo e($message); ?></strong>
      </div>
    <?php endif; ?>
    <?php if(count($errors) > 0): ?>
      <div class="alert alert-danger">
        <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    <form method="post" action="<?php echo e(url('/user/checklogin')); ?>">
      <?php echo e(csrf_field()); ?>

      <div class="form-group">
        <h2>Enter Email</h2>
        <input type="email" name="email" class="form-control" style="font-size:14px;" />
      </div>
      <div class="form-group">
        <h2>Enter Password</h2>
        <input type="password" name="password" class="form-control" style="font-size:14px;" />
      </div>
      <div class="form-group">
        <a href="<?php echo e(route('forget.password.get')); ?>" class="FloatRight"
          style="font-size:20px;margin-right:19px;">Forget Password</a>
      </div>
      <div class="form-group">
        <input type="submit" name="login" class="btn btnEdit" value="Login"
          style="height:28px;width:70px;padding-bottom:28px;" />
      </div>
    </form>
  </div>
</body>

</html>
<?php /**PATH C:\Apache24\htdocs\bulletinBoard_PHP\resources\views/auth/login.blade.php ENDPATH**/ ?>