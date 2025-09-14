<?php $__env->startSection('title'); ?>
    Students
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="card-title">Students</h4>
                <a href="<?php echo e(route('students.create')); ?>" class="btn btn-primary">+ Add Student</a>
            </div>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Student ID</th>
                        <th>Current Class</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($student->id); ?></td>
                            <td><?php echo e($student->name); ?></td>
                            <td><?php echo e($student->email); ?></td>
                            <td><?php echo e(optional($student->student)->student_id); ?></td>
                            <td><?php echo e(optional($student->student)->current_class); ?></td>
                            <td><?php echo e(optional($student->student)->mobile_no); ?></td>
                            <td><?php echo e(optional($student->student)->status); ?></td>
                            <td>
                                <a href="<?php echo e(route('students.edit', $student->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form action="<?php echo e(route('students.destroy', $student->id)); ?>" method="POST"
                                    style="display:inline;">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this student?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="mt-3">
                <?php echo e($students->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Admin\resources\views/students/index.blade.php ENDPATH**/ ?>