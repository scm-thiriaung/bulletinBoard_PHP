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
    <div class="container box" style="margin-top:11px;">
    <h3 align="center" class="title">Please Confirm Email</h3><br />
    <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger alert-block">
        <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <?php if(!(is_null($message))): ?>
    <div class="alert alert-block">
        <?php echo e($message); ?>

    </div>
    <?php endif; ?>
    <form method="post" action="<?php echo e(route('forget.password.post')); ?>">
    <?php echo e(csrf_field()); ?>

        <div class="form-group">
            <h2>Enter Email</h2>
            <input type="email" name="email" placeholder="Enter Email" class="form-control" style="font-size:14px;"/>
        </div>
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btnEdit" style="height:28px;width:204px;padding-bottom:28px;">
            Send Password Reset Link
            </button>
        </div>
    </form>
  </div>
 </body>
</html>
<?php /**PATH C:\Apache24\htdocs\bulletinBoard_PHP\resources\views/auth/forgetPassword.blade.php ENDPATH**/ ?>