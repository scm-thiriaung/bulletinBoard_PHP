<?php if(Auth::user()->status == 1): ?>
    <a href="<?php echo e(route('post.show',$post->id)); ?>" id="btnDetail" class="btnDesign btnDetail btn-Link">Details</a>
    <a href="<?php echo e(route('post.edit',$post->id)); ?>" class="not-active btnDesign btnEdit btn-Link">Edit Post</a>
    <form action="<?php echo e(route('post.destroy',$post->id)); ?>" method="post" class="FloatRight frmDelete">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('DELETE')); ?>

        <button type="submit" class="btnDelete btn-Link btnDesign" disabled="disabled">Delete</button>
    </form>
<?php else: ?>
    <?php if(Auth::user()->email != $post->email): ?>
        <a href="<?php echo e(route('post.show',$post->id)); ?>" id="btnDetail" class="btnDesign btnDetail btn-Link">Details</a>
        <a href="<?php echo e(route('post.edit',$post->id)); ?>" class="btnDesign btnEdit btn-Link">Edit Post</a>
        <form action="<?php echo e(route('post.destroy',$post->id)); ?>" method="post" class="FloatRight frmDelete">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('DELETE')); ?>

            <button type="submit" class="btnDelete btn-Link btnDesign">Delete</button>
        </form>
    <?php else: ?>
        <a href="<?php echo e(route('post.show',$post->id)); ?>" id="btnDetail" class="btnDesign btnDetail btn-Link">Details</a>
        <a href="<?php echo e(route('post.edit',$post->id)); ?>" class="not-active btnDesign btnEdit btn-Link">Edit Post</a>
        <form action="<?php echo e(route('post.destroy',$post->id)); ?>" method="post" class="FloatRight frmDelete">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('DELETE')); ?>

            <button type="submit" class="btnDelete btn-Link btnDesign" disabled="disabled">Delete</button>
        </form>
    <?php endif; ?>
<?php endif; ?>

<?php /**PATH C:\Apache24\htdocs\bulletinBoard_PHP\resources\views/common/buttonandlink.blade.php ENDPATH**/ ?>