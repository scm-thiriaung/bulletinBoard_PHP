<?php $__env->startComponent('mail::message'); ?>
# Introduction

<h3><?php echo e($details['title']); ?></h3>
<h3><?php echo e($details['body']); ?></h3>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Apache24\htdocs\bulletinBoard_PHP\resources\views/emails/ChangePassword-mail.blade.php ENDPATH**/ ?>