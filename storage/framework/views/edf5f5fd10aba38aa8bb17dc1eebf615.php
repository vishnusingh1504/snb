<?php $__env->startSection('title'); ?>
    Edit User
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('users.update', $user->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo e(old('name', $user->name)); ?>"
                                required>
                        </div>
                        <div class="mb-3">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="dob" value="<?php echo e(old('dob', $user->dob)); ?>"
                                required>
                        </div>
                        <div class="mb-3">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email"
                                value="<?php echo e(old('email', $user->email)); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Avatar</label>
                            <input type="file" class="form-control" name="avatar" accept="image/*">
                            <?php if($user->avatar): ?>
                                <img src="<?php echo e(asset('storage/' . $user->avatar)); ?>" alt="Avatar" width="60">
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label>Assign Roles</label>
                            <select name="roles" class="form-select">
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->name); ?>">
                                        <?php echo e($role->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Admin\resources\views/users/edit.blade.php ENDPATH**/ ?>