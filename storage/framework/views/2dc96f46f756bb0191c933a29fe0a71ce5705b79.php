<!DOCTYPE html>
<html>

<head>
  <title>Simple Laravel Form</title>
  <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/common/common.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/user/user.css')); ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="links header headerBorderLine">
    <?php if(isset(Auth::user()->email)): ?>
      <?php echo $__env->make('common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
  </div>
  <br>
  <br>
  <h3 align="center" class="title">UserList</h3><br />
  <?php if(session('status')): ?>
    <div class="alert alert-success">
      <?php echo e(session('status')); ?>

    </div>
  <?php endif; ?>
  <div class="container py-3" id="navbarSupportedContent">
    <?php echo $__env->make('common.user.header_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <br>
    <br>
    <?php if(isset(Auth::user()->email)): ?>
      <div class="container py-3">
        <div class="row" style="margin-top:11px;">
          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h4><?php echo e($user->name); ?></h4>
                </div>
                <div class="card-body">
                  <?php echo $__env->make('common.user.buttonandlink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="FloatRight">
          <?php echo e($users->links()); ?>

        </div>
      </div>
    <?php else: ?>
      <script>
        window.location = "/user";
      </script>
    <?php endif; ?>
</body>

</html>
<?php /**PATH C:\Apache24\htdocs\bulletinBoard_PHP\resources\views/user/userList.blade.php ENDPATH**/ ?>