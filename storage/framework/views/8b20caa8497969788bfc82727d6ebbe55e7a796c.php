<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simple Laravel Form</title>
  <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/common/common.css')); ?>">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
    rel="stylesheet">
</head>

<body>
  <div class="links header headerBorderLine">
    <?php if(isset(Auth::user()->email)): ?>
      <?php echo $__env->make('common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
  </div>
  <br>
  <br>
  <h3 align="center" class="title">User Create</h3><br />
  <?php if($errors->any()): ?>
    <div class="alert alert-danger alert-block">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>)
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><?php echo e($error); ?></strong><br>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  <?php endif; ?>
  <div class="container py-3">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <form method="POST" action="<?php echo e(route('user.store')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <h2 for="name">Name</h2>
            <input type="text" name="name" class="form-control" value="<?php echo e(Auth::user()->name); ?>"
              placeholder="User Name" style="font-size:14px;">
          </div>
          <div class="form-group">
            <h2 for="email">Email</h2>
            <input type="text" name="email" class="form-control" value="<?php echo e(Auth::user()->email); ?>" placeholder="Email"
              style="font-size:14px;" readonly="true">
          </div>
          <div class="form-group">
            <h2 for="password">Password</h2>
            <input type="password" name="password" class="form-control" placeholder="Password" style="font-size:14px;"
              value="<?php echo e(Auth::user()->password); ?>" readonly="true">
          </div>
          <div class="form-group">
            <?php if(Auth::user()->status == 1): ?>
              <input type="radio" name="status" value="1" checked>&nbsp;
              <label for="status" style="font-size:14px;">Admin</label>&nbsp;&nbsp;
              <input type="radio" name="status" value="0">&nbsp;
              <label for="status" style="font-size:14px;">User</label>
            <?php else: ?>
              <input type="radio" name="status" value="1">&nbsp;
              <label for="status" style="font-size:14px;">Admin</label>&nbsp;&nbsp;
              <input type="radio" name="status" value="0" checked>&nbsp;
              <label for="status" style="font-size:14px;">User</label>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <h2 for="dob">Date of Birth</h2>
            <input type="text" name="dob" class="form-control date" value="<?php echo e(Auth::user()->dob); ?>"
              placeholder="Date of Birth" style="font-size:14px;">
          </div>
          <button type="submit" class="btn btnEdit" name="action" value="new"
            style="height:28px;padding-bottom:28px;">Update User Info</button>&nbsp;&nbsp;&nbsp;
          <a href="<?php echo e(route('userList')); ?>" class="btn btnBack my-2 my-sm-0" style="padding-bottom:28px;">Back to
            List</a>
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

</html>
<?php /**PATH C:\Apache24\htdocs\bulletinBoard_PHP\resources\views/user/create.blade.php ENDPATH**/ ?>