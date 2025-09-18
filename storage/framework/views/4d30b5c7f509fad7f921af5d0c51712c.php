<?php $__env->startSection('title'); ?> Search <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Search <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Results <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\snbic-erp\snb\resources\views/master/search-results.blade.php ENDPATH**/ ?>