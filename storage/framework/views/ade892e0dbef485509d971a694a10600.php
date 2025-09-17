
<?php $__env->startSection('title'); ?>
    Edit Role
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Role: <?php echo e($role->name); ?></h4>

                    <form action="<?php echo e(route('roles.update', $role->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role-name" class="form-label">Role Name</label>
                                    <input type="text" class="form-control" id="role-name" name="name"
                                        value="<?php echo e(old('name', $role->name)); ?>" required>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h5 class="mb-3">Assign Permissions</h5>
                        <div class="row">
                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox"
                                            id="permission-<?php echo e($permission->id); ?>" name="permissions[]"
                                            value="<?php echo e($permission->name); ?>" 
                                            <?php if(in_array($permission->name, $rolePermissions)): ?> checked <?php endif; ?>>
                                        <label class="form-check-label" for="permission-<?php echo e($permission->id); ?>">
                                            <?php echo e($permission->name); ?>

                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update Role</button>
                            <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\snbic-erp\snb\resources\views/roles/edit.blade.php ENDPATH**/ ?>