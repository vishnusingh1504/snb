<div class="row">
    <div class="col-md-6 mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $teacher->user->name ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control"
               value="{{ old('email', $teacher->user->email ?? '') }}">
    </div>

    @if(!isset($teacher))
    <div class="col-md-6 mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    @endif

    <div class="col-md-6 mb-3">
        <label>Teacher ID</label>
        <input type="text" name="teacher_id" class="form-control"
               value="{{ old('teacher_id', $teacher->teacher_id ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Qualification</label>
        <input type="text" name="qualification" class="form-control"
               value="{{ old('qualification', $teacher->qualification ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Experience</label>
        <input type="text" name="experience" class="form-control"
               value="{{ old('experience', $teacher->experience ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Specialization</label>
        <input type="text" name="specialization" class="form-control"
               value="{{ old('specialization', $teacher->specialization ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Mobile No</label>
        <input type="text" name="mobile_no" class="form-control"
               value="{{ old('mobile_no', $teacher->mobile_no ?? '') }}">
    </div>

    <div class="col-md-12 mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control">{{ old('address', $teacher->address ?? '') }}</textarea>
    </div>

    <div class="col-md-6 mb-3">
        <label>Date Of Birth</label>
        <input type="date" name="dob" class="form-control"
               value="{{ old('dob', $teacher->dob ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label>Joining Date</label>
        <input type="date" name="joining_date" class="form-control"
               value="{{ old('joining_date', $teacher->joining_date ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="active" {{ old('status', $teacher->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status', $teacher->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label>Profile Image</label>
        <input type="file" name="image_location" class="form-control">
        @if(isset($teacher) && $teacher->image_location)
            <img src="{{ asset('storage/'.$teacher->image_location) }}" width="80" class="mt-2">
        @endif
    </div>
</div>
