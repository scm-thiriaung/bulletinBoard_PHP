<?php if(Auth::user()->status == Config::get('constant.admin')): ?>
  <a href="<?php echo e(route('user.show', $user->id)); ?>" id="btnDetail" class="btnDesign btnDetail btn-Link">Details</a>
  <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="not-active btnDesign btnEdit btn-Link">Edit User</a>
  <form action="<?php echo e(route('user.destroy', $user->id)); ?>" method="post" class="FloatRight frmDelete">
    <?php echo e(csrf_field()); ?>

    <?php echo e(method_field('DELETE')); ?>

    <button type="submit" class="btnDelete btn-Link btnDesign" disabled="disabled">Delete</button>
  </form>
<?php else: ?>
  <a href="<?php echo e(route('user.show', $user->id)); ?>" id="btnDetail" class="btnDesign btnDetail btn-Link">Details</a>
  <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="btnDesign btnEdit btn-Link">Edit User</a>
<?php endif; ?>
<?php /**PATH C:\Apache24\htdocs\bulletinBoard_PHP\resources\views/common/user/buttonandlink.blade.php ENDPATH**/ ?>