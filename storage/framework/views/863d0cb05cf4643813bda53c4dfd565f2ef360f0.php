<html>

<body>
  <div class="dropdowndemo FloatRight">
    <button name="dropdownbtn" class="dropdownbtn"><?php echo e(Auth::user()->email); ?></button>
    <div class="dropdownlist-content">
      <a href="<?php echo e(route('changePassword')); ?>">change Password</a>
      <a href="<?php echo e(route('logout')); ?>">Logout</a>
    </div>
  </div>
  <a href="<?php echo e(url('userList')); ?>" class="FloatRight" style="font-size:20px;margin-right:19px;">User</a>
  <a href="<?php echo e(route('post.index')); ?>" class="FloatRight" style="font-size:20px;margin-right:19px;">Post</a>
  <a href="<?php echo e(route('user.index')); ?>" class="FloatRight" style="font-size:20px;margin-right:19px;">Home</a>
</body>

</html>
<?php /**PATH C:\Apache24\htdocs\bulletinBoard_PHP\resources\views/common/header.blade.php ENDPATH**/ ?>