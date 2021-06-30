<?php if(Auth::user()->status == 1): ?>
    <form action="<?php echo e(route('findPost')); ?>" method="GET" class="FloatRight">
        <?php echo e(csrf_field()); ?>

        <input type="text" name="search" placeholder="Search Post" class="txtSearch" readonly="true">
        <button class="btnCommon btnLink btnDesign" type="submit" title="Search Projects" disabled="disabled">Search</button>
    </form>
    <form action="<?php echo e(route('postMethod')); ?>" method="post" class="FloatLeft">
        <?php echo e(csrf_field()); ?>

        <button class="btnCommon btnSubmit btnDesign" name="submit" value="create" disabled="disabled">Create Post</button>&nbsp;&nbsp;
        <button class="btnCommon btnSubmit btnDesign" name="submit" value="download" disabled="disabled">Download</button>&nbsp;&nbsp;
    </form>
    <form id="excel-csv-import-form" method="POST" action="<?php echo e(route('importExcel')); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <button class="btnCommon btnSubmit btnDesign" name="submit" value="import" disabled="disabled">Import</button>&nbsp;&nbsp;&nbsp;
        <input type="file" name="file" placeholder="Choose file" class="FloatRight" style="padding-top:5px;" disabled>
    </form>
<?php else: ?>
    <form action="<?php echo e(route('findPost')); ?>" method="GET" class="FloatRight">
        <?php echo e(csrf_field()); ?>

        <input type="text" name="search" placeholder="Search Post" class="txtSearch">
        <button class="btnCommon btnLink btnDesign" type="submit" title="Search Projects">Search</button>
    </form>
    <form action="<?php echo e(route('postMethod')); ?>" method="post" class="FloatLeft">
        <?php echo e(csrf_field()); ?>

        <button class="btnCommon btnSubmit btnDesign" name="submit" value="create">Create Post</button>&nbsp;&nbsp;
        <button class="btnCommon btnSubmit btnDesign" name="submit" value="download">Download</button>&nbsp;&nbsp;
    </form>
    <form id="excel-csv-import-form" method="POST" action="<?php echo e(route('importExcel')); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <button class="btnCommon btnSubmit btnDesign" name="submit" value="import">Import</button>&nbsp;&nbsp;&nbsp;
        <input type="file" name="file" placeholder="Choose file" class="FloatRight" style="padding-top:5px;">
    </form>
<?php endif; ?><?php /**PATH C:\Apache24\htdocs\bulletinBoard_PHP\resources\views/common/header_button.blade.php ENDPATH**/ ?>