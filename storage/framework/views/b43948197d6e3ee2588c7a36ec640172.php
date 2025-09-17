

<?php $__env->startSection('title'); ?> Teachers <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between mb-3">
        <h4 class="card-title">Teachers</h4>
        <a href="<?php echo e(route('teachers.create')); ?>" class="btn btn-primary">Add Teacher</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Teacher ID</th>
                <th>Qualification</th>
                <th>Experience</th>
                <th>Status</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($teacher->id); ?></td>
                <td><?php echo e($teacher->name); ?></td>
                <td><?php echo e($teacher->email); ?></td>
                <td><?php echo e($teacher->teacher->teacher_id); ?></td>
                <td><?php echo e($teacher->teacher->qualification); ?></td>
                <td><?php echo e($teacher->teacher->experience); ?></td>
                <td><?php echo e(ucfirst($teacher->teacher->status)); ?></td>
                <td>
                    <?php if($teacher->teacher->image_location): ?>
                        <img src="<?php echo e(asset('storage/'.$teacher->teacher->image_location)); ?>" width="50">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo e(route('teachers.edit',$teacher->teacher->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form action="<?php echo e(route('teachers.destroy',$teacher->teacher->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this teacher?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($teachers->links()); ?>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\snbic-erp\snb\resources\views/teachers/index.blade.php ENDPATH**/ ?>