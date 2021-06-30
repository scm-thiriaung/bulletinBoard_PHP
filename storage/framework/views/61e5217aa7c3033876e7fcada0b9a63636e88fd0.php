<?php if(Auth::user()->status == Config::get('constant.admin')): ?>
  <form action="<?php echo e(route('userSearch')); ?>" method="GET" class="FloatRight">
    <?php echo e(csrf_field()); ?>

    <input type="text" name="nameSearch" placeholder="Search UserName" class="txtSearch">
    <input type="text" name="emailSearch" placeholder="Search User Email" class="txtSearch">
    <button class="btnCommon btnLink btnDesign" type="submit" title="Search projects">Search</button>
  </form>
  <form action="<?php echo e(route('user.create')); ?> " method="get" class="FloatLeft">
    <?php echo e(csrf_field()); ?>

    <button class="btnCommon btnSubmit btnDesign" name="submit" value="create" disabled="disabled"
      style="width:123px;">Update User Info</button>
  </form>
<?php else: ?>
  <form action="<?php echo e(route('userSearch')); ?>" method="GET" class="FloatRight">
    <?php echo e(csrf_field()); ?>

    <input type="text" name="nameSearch" placeholder="Search UserName" class="txtSearch">
    <input type="text" name="emailSearch" placeholder="Search User Email" class="txtSearch">
    <button class="btnCommon btnLink btnDesign" type="submit" title="Search projects">Search</button>
  </form>
  <form action="<?php echo e(route('user.create')); ?> " method="get" class="FloatLeft">
    <?php echo e(csrf_field()); ?>

    <button class="btnCommon btnSubmit btnDesign" name="submit" value="create" style="width:123px;">Update User
      Info</button>
  </form>
<?php endif; ?>
<?php /**PATH C:\Apache24\htdocs\bulletinBoard_PHP\resources\views/common/user/header_button.blade.php ENDPATH**/ ?>