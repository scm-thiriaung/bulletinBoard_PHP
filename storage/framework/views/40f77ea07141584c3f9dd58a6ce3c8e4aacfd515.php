<?php $__env->startComponent('mail::message'); ?>
# Introduction

<h1>Forget Password Email</h1>
   
You can reset password from bellow link:
<a href="<?php echo e(route('reset.password.get', $token)); ?>">Reset Password</a>

Thanks for using application from Simple laravel team.
<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Apache24\htdocs\bulletinBoard_PHP\resources\views/emails/forget-password.blade.php ENDPATH**/ ?>