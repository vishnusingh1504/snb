<div class="row">
    <div class="col-md-6 mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control"
               value="<?php echo e(old('name', $teacher->user->name ?? '')); ?>">
    </div>
    <div class="col-md-6 mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control"
               value="<?php echo e(old('email', $teacher->user->email ?? '')); ?>">
    </div>

    <?php if(!isset($teacher)): ?>
    <div class="col-md-6 mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <?php endif; ?>

    <div class="col-md-6 mb-3">
        <label>Teacher ID</label>
        <input type="text" name="teacher_id" class="form-control"
               value="<?php echo e(old('teacher_id', $teacher->teacher_id ?? '')); ?>">
    </div>

    <div class="col-md-6 mb-3">
        <label>Qualification</label>
        <input type="text" name="qualification" class="form-control"
               value="<?php echo e(old('qualification', $teacher->qualification ?? '')); ?>">
    </div>

    <div class="col-md-6 mb-3">
        <label>Experience</label>
        <input type="text" name="experience" class="form-control"
               value="<?php echo e(old('experience', $teacher->experience ?? '')); ?>">
    </div>

    <div class="col-md-6 mb-3">
        <label>Specialization</label>
        <input type="text" name="specialization" class="form-control"
               value="<?php echo e(old('specialization', $teacher->specialization ?? '')); ?>">
    </div>

    <div class="col-md-6 mb-3">
        <label>Mobile No</label>
        <input type="text" name="mobile_no" class="form-control"
               value="<?php echo e(old('mobile_no', $teacher->mobile_no ?? '')); ?>">
    </div>

    <div class="col-md-12 mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control"><?php echo e(old('address', $teacher->address ?? '')); ?></textarea>
    </div>

    <div class="col-md-6 mb-3">
        <label>Date Of Birth</label>
        <input type="date" name="dob" class="form-control"
               value="<?php echo e(old('dob', $teacher->dob ?? '')); ?>">
    </div>
    <div class="col-md-6 mb-3">
        <label>Joining Date</label>
        <input type="date" name="joining_date" class="form-control"
               value="<?php echo e(old('joining_date', $teacher->joining_date ?? '')); ?>">
    </div>

    <div class="col-md-6 mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="active" <?php echo e(old('status', $teacher->status ?? '') == 'active' ? 'selected' : ''); ?>>Active</option>
            <option value="inactive" <?php echo e(old('status', $teacher->status ?? '') == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label>Profile Image</label>
        <input type="file" name="image_location" class="form-control">
        <?php if(isset($teacher) && $teacher->image_location): ?>
            <img src="<?php echo e(asset('storage/'.$teacher->image_location)); ?>" width="80" class="mt-2">
        <?php endif; ?>
    </div>
</div>
<?php /**PATH D:\Admin\resources\views/teachers/partials/form.blade.php ENDPATH**/ ?>