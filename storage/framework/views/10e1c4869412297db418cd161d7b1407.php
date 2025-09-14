<?php $__env->startSection('title'); ?> Add Teacher <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Add Teacher</h4>
    <form action="<?php echo e(route('teachers.store')); ?>" method="POST" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <?php echo $__env->make('teachers.partials.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Admin\resources\views/teachers/create.blade.php ENDPATH**/ ?>