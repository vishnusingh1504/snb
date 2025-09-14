<?php $__env->startSection('title'); ?>
    Edit Student
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-3">Edit Student</h4>
            <form action="<?php echo e(route('students.update', $student->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

                <div class="row">
                    <!-- User info -->
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo e($student->user->name); ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo e($student->user->email); ?>"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" class="form-control" value="<?php echo e($student->dob); ?>">
                    </div>

                    <!-- Student fields -->
                    <div class="col-md-6 mb-3">
                        <label>Student ID</label>
                        <input type="text" name="student_id" class="form-control" value="<?php echo e($student->student_id); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>PEN Number</label>
                        <input type="text" name="pen_number" class="form-control" value="<?php echo e($student->pen_number); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Aadhar No</label>
                        <input type="text" name="adhar_no" class="form-control" value="<?php echo e($student->adhar_no); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Caste</label>
                        <input type="text" name="caste" class="form-control" value="<?php echo e($student->caste); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Religion</label>
                        <input type="text" name="religion" class="form-control" value="<?php echo e($student->religion); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Admission Class</label>
                        <input type="text" name="admission_class" class="form-control"
                            value="<?php echo e($student->admission_class); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Admission Date</label>
                        <input type="date" name="admission_date" class="form-control"
                            value="<?php echo e($student->admission_date); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Stream</label>
                        <input type="text" name="stream" class="form-control" value="<?php echo e($student->stream); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Current Class</label>
                        <input type="text" name="current_class" class="form-control"
                            value="<?php echo e($student->current_class); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Previous School</label>
                        <input type="text" name="prev_school" class="form-control" value="<?php echo e($student->prev_school); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mobile No</label>
                        <input type="text" name="mobile_no" class="form-control" value="<?php echo e($student->mobile_no); ?>">
                    </div>

                    <!-- Parents -->
                    <div class="col-md-6 mb-3">
                        <label>Father Name</label>
                        <input type="text" name="father_name" class="form-control" value="<?php echo e($student->father_name); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Father Aadhar</label>
                        <input type="text" name="father_adhar" class="form-control"
                            value="<?php echo e($student->father_adhar); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Father Occupation</label>
                        <input type="text" name="father_occu" class="form-control" value="<?php echo e($student->father_occu); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Father Mobile</label>
                        <input type="text" name="father_mobile" class="form-control"
                            value="<?php echo e($student->father_mobile); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mother Name</label>
                        <input type="text" name="mother_name" class="form-control"
                            value="<?php echo e($student->mother_name); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mother Aadhar</label>
                        <input type="text" name="mother_adhar" class="form-control"
                            value="<?php echo e($student->mother_adhar); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mother Occupation</label>
                        <input type="text" name="mother_occu" class="form-control"
                            value="<?php echo e($student->mother_occu); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mother Mobile</label>
                        <input type="text" name="mother_mobile" class="form-control"
                            value="<?php echo e($student->mother_mobile); ?>">
                    </div>

                    <!-- Address & Sessions -->
                    <div class="col-md-12 mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control"><?php echo e($student->address); ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Admission Session</label>
                        <input type="text" name="admission_session" class="form-control"
                            value="<?php echo e($student->admission_session); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Current Session</label>
                        <input type="text" name="current_session" class="form-control"
                            value="<?php echo e($student->current_session); ?>">
                    </div>

                    <!-- File Upload -->
                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image_location" class="form-control">
                        <?php if($student->image_location): ?>
                            <img src="<?php echo e(asset('storage/' . $student->image_location)); ?>" width="80" class="mt-2">
                        <?php endif; ?>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="Active" <?php echo e($student->status == 'Active' ? 'selected' : ''); ?>>Active</option>
                            <option value="Inactive" <?php echo e($student->status == 'Inactive' ? 'selected' : ''); ?>>Inactive
                            </option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="<?php echo e(route('students.index')); ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Admin\resources\views/students/edit.blade.php ENDPATH**/ ?>