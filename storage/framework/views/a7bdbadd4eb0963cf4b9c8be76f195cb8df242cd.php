<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Laravel Form</title>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/common/common.css')); ?>">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
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
    <h3 align="center" style="font-size:28px;">User Update</h3><br />
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
      <div class="container py-3">
        <div class="row">
          <div class="card-body">
            <form method="POST" action="<?php echo e(route('user.update', $user->id)); ?>">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

              <div class="form-group">
                <h2 for="name">Name</h2>
                <input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>" style="font-size:14px;">
              </div>
              <div class="form-group">
                <h2 for="email">Email</h2>
                <input type="text" name="email" class="form-control" value="<?php echo e($user->email); ?>" readonly="true" style="font-size:14px;">
              </div>
              <div class="form-group">
                <h2 for="password">Email</h2>
                <input type="password" name="password" class="form-control" value="<?php echo e($user->password); ?>" readonly="true" style="font-size:14px;">
              </div>
              <div class="form-group">
                <h2 for="dob">Date of Birth</h2>
                <input type="text" name="dob" class="form-control date" value="<?php echo e($user->dob); ?>"
                        placeholder="Date of Birth" style="font-size:14px;">
              </div>
              <button type="submit" class="btn btnEdit" name="action" value="update" style="height:28px;padding-bottom:28px;">Update User</button>&nbsp;&nbsp;
              <a href="<?php echo e(route('userList')); ?>" class="btn btnBack my-2 my-sm-0" style="padding-bottom:28px;">Back to List</a>
            </form>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        $(function() {
        $('.date').datepicker();      
      });
    </script>
  </body>
</html><?php /**PATH C:\Apache24\htdocs\bulletinBoard_PHP\resources\views/user/edit.blade.php ENDPATH**/ ?>