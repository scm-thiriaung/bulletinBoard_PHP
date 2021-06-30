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
  <h3 align="center" class="title">Post Create</h3><br />
  <?php if($message = Session::get('error')): ?>
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
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
    <div class="row" style="margin-top:11px;">
      <div class="col-md-8 offset-md-2">
        <form method="POST" action="<?php echo e(route('post.store')); ?>">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <h2 for="title">Title</h2>
            <input type="text" name="title" class="form-control" value="<?php echo e(old('title')); ?>" placeholder="Post title"
              style="font-size:14px;">
          </div>

          <div class="form-group">
            <h2 for="description">Description</h2>
            <textarea name="description" rows="8" cols="80" class="form-control"
              style="font-size:14px;"><?php echo e(old('description')); ?></textarea>
          </div>
          <button type="submit" class="btn btnEdit" style="height:28px;padding-bottom:28px;">Create
            Post</button>&nbsp;&nbsp;&nbsp;
          <a href="<?php echo e(route('post.index')); ?>" class="btn btnBack my-2 my-sm-0" style="padding-bottom:28px;">Back to
            List</a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
<?php /**PATH C:\Apache24\htdocs\bulletinBoard_PHP\resources\views/post/create.blade.php ENDPATH**/ ?>