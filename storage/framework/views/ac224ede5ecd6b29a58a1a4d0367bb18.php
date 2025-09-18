<?php $__env->startSection('title'); ?> Student Create Wizard <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
    <?php $__env->slot('li_1'); ?> Students <?php $__env->endSlot(); ?>
    <?php $__env->slot('title'); ?> Create Student <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title mb-4">Student Registration</h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <h4 class="card-title mb-4">Student ID: <span class="badge bg-primary">New</span></h4>
                    </div>
                </div>

                <!-- 👇 Only ONE form wrapper -->
                <form id="student-form" method="POST" action="<?php echo e(route('students.store')); ?>">
                    <?php echo csrf_field(); ?>

                    <div id="vertical-example" class="vertical-wizard">
                        <!-- Step 1 : Personal Details -->
                        <h3>Personal Details</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="student-firstname">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="student-firstname" value="<?php echo e(old('first_name')); ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="student-lastname">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="student-lastname" value="<?php echo e(old('last_name')); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="student-email">Email</label>
                                        <input type="email" class="form-control" name="email" id="student-email" value="<?php echo e(old('email')); ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="student-dob">Date of Birth</label>
                                        <input type="date" class="form-control" name="dob" id="student-dob" value="<?php echo e(old('dob')); ?>">
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Step 2 : Academic Details -->
                        <h3>Academic Details</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="admission-session">Admission Session</label>
                                        <select class="form-select" name="admission_session" id="admission-session">
                                            <option value="" disabled selected>Select Session</option>
                                            <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($session->id); ?>" <?php echo e(old('admission_session') == $session->id ? 'selected' : ''); ?>><?php echo e($session->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="admission-class">Admission Class</label>
                                        <select class="form-select" name="admission_class" id="admission-class">
                                            <option value="" disabled selected>Select Class</option>
                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($class->id); ?>" <?php echo e(old('admission_class') == $class->id ? 'selected' : ''); ?>><?php echo e($class->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="admission-date">Admission Date</label>
                                        <input type="date" class="form-control" name="admission_date" id="admission-date" value="<?php echo e(old('admission_date')); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="current-class">Current Class</label>
                                        <select class="form-select" name="current_class" id="current-class">
                                            <option value="" disabled selected>Select Class</option>
                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($class->id); ?>" <?php echo e(old('current_class') == $class->id ? 'selected' : ''); ?>><?php echo e($class->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Step 3 : Parent Details -->
                        <h3>Parent Details</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="father-name">Father Name</label>
                                        <input type="text" class="form-control" name="father_name" id="father-name" value="<?php echo e(old('father_name')); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="mother-name">Mother Name</label>
                                        <input type="text" class="form-control" name="mother_name" id="mother-name" value="<?php echo e(old('mother_name')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="father-mobile">Father Mobile</label>
                                        <input type="text" class="form-control" name="father_mobile" id="father-mobile" value="<?php echo e(old('father_mobile')); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="mother-mobile">Mother Mobile</label>
                                        <input type="text" class="form-control" name="mother_mobile" id="mother-mobile" value="<?php echo e(old('mother_mobile')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="father-mobile">Father Adhaar</label>
                                        <input type="text" class="form-control" name="father_adhar" id="father-adhar" value="<?php echo e(old('father_adhar')); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="mother-mobile">Mother Adhaar</label>
                                        <input type="text" class="form-control" name="mother_adhar" id="mother-adhar" value="<?php echo e(old('mother_adhar')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="father-mobile">Father Profession</label>
                                        <input type="text" class="form-control" name="father_occu" id="father-occu" value="<?php echo e(old('father_occu')); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="mother-mobile">Mother Profession</label>
                                        <input type="text" class="form-control" name="mother_occu" id="mother-occu" value="<?php echo e(old('mother_occu')); ?>">
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Step 4 : Confirm -->
                        <h3>Confirm Details</h3>
                        <section>
                            <div class="text-center">
                                <div class="mb-4">
                                    <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                </div>
                                <h5>Confirm & Submit</h5>
                                <p class="text-muted">Review all details and click Finish to save the student record.</p>
                            </div>
                        </section>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<!-- jquery step -->
<script src="<?php echo e(URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js')); ?>"></script>
<script>
    $("#vertical-example").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slide",
        autoFocus: true,
        onFinished: function (event, currentIndex) {
            document.getElementById("student-form").submit();
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\snbic-erp\snb\resources\views/students/create.blade.php ENDPATH**/ ?>