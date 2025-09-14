@extends('layouts.master')

@section('title')
    Add Student
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-3">Add Student</h4>
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Basic User Info -->
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" class="form-control">
                    </div>

                    <!-- Student Details -->
                    <div class="col-md-6 mb-3">
                        <label>Student ID</label>
                        <input type="text" name="student_id" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>PEN Number</label>
                        <input type="text" name="pen_number" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Aadhar No</label>
                        <input type="text" name="adhar_no" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Caste</label>
                        <input type="text" name="caste" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Religion</label>
                        <input type="text" name="religion" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Admission Class</label>
                        <input type="text" name="admission_class" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Admission Date</label>
                        <input type="date" name="admission_date" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Stream</label>
                        <input type="text" name="stream" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Current Class</label>
                        <input type="text" name="current_class" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Previous School</label>
                        <input type="text" name="prev_school" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mobile No</label>
                        <input type="text" name="mobile_no" class="form-control">
                    </div>

                    <!-- Parents -->
                    <div class="col-md-6 mb-3">
                        <label>Father Name</label>
                        <input type="text" name="father_name" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Father Aadhar</label>
                        <input type="text" name="father_adhar" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Father Occupation</label>
                        <input type="text" name="father_occu" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Father Mobile</label>
                        <input type="text" name="father_mobile" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mother Name</label>
                        <input type="text" name="mother_name" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mother Aadhar</label>
                        <input type="text" name="mother_adhar" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mother Occupation</label>
                        <input type="text" name="mother_occu" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mother Mobile</label>
                        <input type="text" name="mother_mobile" class="form-control">
                    </div>

                    <!-- Address & Sessions -->
                    <div class="col-md-12 mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Admission Session</label>
                        <input type="text" name="admission_session" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Current Session</label>
                        <input type="text" name="current_session" class="form-control">
                    </div>

                    <!-- File Upload -->
                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image_location" class="form-control">
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
