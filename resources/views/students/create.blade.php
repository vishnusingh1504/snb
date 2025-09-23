@extends('layouts.master')

@section('styles')
<style>
    .suggestion-item {
        cursor: pointer;
    }
    .suggestion-item:hover {
        background-color: #818a93 !important;
    }
    .image-preview-container {
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px dashed #ccc;
        border-radius: 5px;
        height: 150px;
        overflow: hidden;
    }

    .image-preview-container img {
        max-height: 100%;
        max-width: 100%;
    }
</style>
@endsection

@section('title') Student Create Wizard @endsection

@section('content')

@component('components.breadcrumb')
    @slot('li_1') Students @endslot
    @slot('title') Create Student @endslot
@endcomponent

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
                <form id="student-form" method="POST" action="{{ route('students.store') }}">
                    @csrf

                    <div id="vertical-example" class="vertical-wizard">
                        <!-- Step 1 : Personal Details -->
                        <h3>Personal Details</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="student-name">Student Full Name</label>
                                        <input type="text" class="form-control english-input" name="name" data-target-for="#name-hindi" id="student-name" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <!--Student Name in Hindi -->
                                    <div class="mb-3 position-relative">
                                        <label for="name-hindi" class="block text-sm font-medium text-gray-700 mb-1">विद्यार्थी का नाम (हिन्दी में)</label>
                                        <input
                                            type="text" id="name-hindi" name="name_hindi"
                                            class="form-control hindi-input" autocomplete="off" value="{{ old('name_hindi') }}"
                                            style="font-family: 'Noto Sans', sans-serif !important; font-size:120%;" >

                                            <!-- Suggestions will be shown here -->
                                        <div class="suggestions-container list-group position-absolute w-100 mt-1 d-none" style="z-index: 1000;font-family: 'Noto Sans', sans-serif !important;font-size:120%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="aadhaar-number">Aadhaar Number</label>
                                        <input type="text" class="form-control" name="adhar_no" id="aadhaar-number"
                                        value="{{ old('adhar_no') }}"
                                        inputmode="numeric" maxlength="12"
                                        style="letter-spacing: 3px; font-size: 14px;"
                                        placeholder="XXXX XXXX XXXX" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="pen-number">Permanent Enrollment Number (PEN)</label>
                                        <input type="text" class="form-control" name="pen_number" id="pen-number"
                                        value="{{ old('pen_number') }}"
                                        inputmode="numeric" maxlength="10"
                                        style="letter-spacing: 4px; font-size: 14px;"
                                        placeholder="XXXXXXXXXX" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-1">
                                        <label for="student-gender">Gender</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender-male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender-female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-others" value="others" {{ old('gender') == 'others' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender-others">Others</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="student-dob">Date of Birth</label>
                                        <input type="date" class="form-control" name="dob" id="student-dob" value="{{ old('dob') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="student-email">Email</label>
                                        <input type="email" class="form-control" name="email" id="student-email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="transport-route">Transport Route</label>
                                        <select class="form-select" name="transport_route" id="transport-route">
                                            <option value="" disabled selected>Select Route</option>
                                            {{-- @foreach ($routes as $route)
                                                <option value="{{ $route->id }}" {{ old('transport_route') == $route->id ? 'selected' : '' }}>{{ $route->name }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Step 2 : Parent Details -->
                        <h3>Parent Details</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="father-name">Father Name</label>
                                        <input type="text" class="form-control english-input" name="father_name" data-target-for="#father-name-hindi" id="father-name" value="{{ old('father_name') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 position-relative">
                                        <label for="father-name-hindi" class="block text-sm font-medium text-gray-700 mb-1">पिता का नाम (हिन्दी में)</label>
                                        <input
                                            type="text" id="father-name-hindi" name="father_name_hindi"
                                            class="form-control hindi-input" autocomplete="off" value="{{ old('father_name_hindi') }}"
                                            style="font-family: 'Noto Sans', sans-serif !important; font-size:120%;" >

                                            <!-- Suggestions will be shown here -->
                                        <div class="suggestions-container list-group position-absolute w-100 mt-1 d-none" style="z-index: 1000;font-family: 'Noto Sans', sans-serif !important;font-size:120%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="mother-name">Mother Name</label>
                                        <input type="text" class="form-control english-input" data-target-for="#mother-name-hindi" name="mother_name" id="mother-name" value="{{ old('mother_name') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 position-relative">
                                        <label for="father-name-hindi" class="block text-sm font-medium text-gray-700 mb-1">माता का नाम (हिन्दी में)</label>
                                        <input
                                            type="text" id="mother-name-hindi" name="mother_name_hindi"
                                            class="form-control hindi-input" autocomplete="off" value="{{ old('mother_name_hindi') }}"
                                            style="font-family: 'Noto Sans', sans-serif !important; font-size:120%;" >

                                            <!-- Suggestions will be shown here -->
                                        <div class="suggestions-container list-group position-absolute w-100 mt-1 d-none" style="z-index: 1000;font-family: 'Noto Sans', sans-serif !important;font-size:120%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="father-mobile">Father Aadhaar</label>
                                        <input type="text" class="form-control" name="father_adhar" id="father-adhar"
                                        inputmode="numeric" maxlength="12"
                                        style="letter-spacing: 3px; font-size: 14px;"
                                        placeholder="XXXX XXXX XXXX"
                                        value="{{ old('father_adhar') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="mother-mobile">Mother Aadhaar</label>
                                        <input type="text" class="form-control" name="mother_adhar" id="mother-adhar"
                                        inputmode="numeric" maxlength="12"
                                        style="letter-spacing: 3px; font-size: 14px;"
                                        placeholder="XXXX XXXX XXXX"
                                        value="{{ old('mother_adhar') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="father-mobile">Father Mobile</label>
                                        <input type="text" class="form-control" name="father_mobile" id="father-mobile"
                                        inputmode="numeric" maxlength="10"
                                        style="letter-spacing: 3px; font-size: 14px;"
                                        placeholder="9999999999"
                                        value="{{ old('father_mobile') }}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="mother-mobile">Mother Mobile</label>
                                        <input type="text" class="form-control"
                                        inputmode="numeric" maxlength="10"
                                        style="letter-spacing: 3px; font-size: 14px;"
                                        placeholder="9999999999"
                                        name="mother_mobile" id="mother-mobile" value="{{ old('mother_mobile') }}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="father-mobile">Father Profession</label>
                                        <select name="father_occupation" id="father-occupation" class="form-select">
                                            <option disabled selected>-- Select Profession --</option>
                                            <option value="farmer" {{ old('father_occupation') == 'farmer' ? 'selected' : '' }}>Farmer</option>
                                            <option value="teacher" {{ old('father_occupation') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                            <option value="doctor" {{ old('father_occupation') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                                            <option value="bank_employee" {{ old('father_occupation') == 'bank_employee' ? 'selected' : '' }}>Bank Employee</option>
                                            <option value="lawyer" {{ old('father_occupation') == 'lawyer' ? 'selected' : '' }}>Lawyer</option>
                                            <option value="engineer" {{ old('father_occupation') == 'engineer' ? 'selected' : '' }}>Engineer</option>
                                            <option value="technician" {{ old('father_occupation') == 'technician' ? 'selected' : '' }}>Technician</option>
                                            <option value="accountant" {{ old('father_occupation') == 'accountant' ? 'selected' : '' }}>Accountant</option>
                                            <option value="government_employee" {{ old('father_occupation') == 'government_employee' ? 'selected' : '' }}>Government Employee</option>
                                            <option value="private_employee" {{ old('father_occupation') == 'private_employee' ? 'selected' : '' }}>Private Employee</option>
                                            <option value="businessman" {{ old('father_occupation') == 'businessman' ? 'selected' : '' }}>Businessman</option>
                                            <option value="retired" {{ old('father_occupation') == 'retired' ? 'selected' : '' }}>Retired</option>
                                            <option value="laborer" {{ old('father_occupation') == 'laborer' ? 'selected' : '' }}>Laborer</option>
                                            <option value="driver" {{ old('father_occupation') == 'driver' ? 'selected' : '' }}>Driver</option>
                                            <option value="other" {{ old('father_occupation') == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="mother-mobile">Mother Profession</label>
                                        <select name="mother_occupation" id="mother_occupation" class="form-control" required>
                                            <option disabled selected>-- Select Occupation --</option>
                                            <option value="homemaker" {{ old('mother_occupation') == 'homemaker' ? 'selected' : '' }}>Homemaker</option>
                                            <option value="teacher" {{ old('mother_occupation') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                            <option value="nurse" {{ old('mother_occupation') == 'nurse' ? 'selected' : '' }}>Nurse</option>
                                            <option value="doctor" {{ old('mother_occupation') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                                            <option value="bank_employee" {{ old('mother_occupation') == 'bank_employee' ? 'selected' : '' }}>Bank Employee</option>
                                            <option value="government_employee" {{ old('mother_occupation') == 'government_employee' ? 'selected' : '' }}>Government Employee</option>
                                            <option value="private_employee" {{ old('mother_occupation') == 'private_employee' ? 'selected' : '' }}>Private Employee</option>
                                            <option value="businesswoman" {{ old('mother_occupation') == 'businesswoman' ? 'selected' : '' }}>Businesswoman</option>
                                            <option value="retired" {{ old('mother_occupation') == 'retired' ? 'selected' : '' }}>Retired</option>
                                            <option value="laborer" {{ old('mother_occupation') == 'laborer' ? 'selected' : '' }}>Laborer</option>
                                            <option value="driver" {{ old('mother_occupation') == 'driver' ? 'selected' : '' }}>Driver</option>
                                            <option value="other" {{ old('mother_occupation') == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>


                        <!-- Step 3 : Academic Details -->
                        <h3>Academic Details</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="admission-session">Admission Session</label>
                                        <select class="form-select" name="admission_session" id="admission-session">
                                            <option value="" disabled selected>Select Session</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->id }}" {{ old('admission_session') == $session->id ? 'selected' : '' }}>{{ $session->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="admission-class">Admission Class</label>
                                        <select class="form-select" name="admission_class" id="admission-class">
                                            <option value="" disabled selected>Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ old('admission_class') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="admission-date">Admission Date</label>
                                        <input type="date" class="form-control" name="admission_date" id="admission-date" value="{{ old('admission_date') }}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="current-class">Previous Class</label>
                                        <select class="form-select" name="previous_class" id="previous-class">
                                            <option value="" disabled selected>Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ old('previous_class') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="previous-school-udise-code">Previous School Udise Number</label>
                                        <input type="text" class="form-control" name="previous_school_udise" id="previous-school-udise-code"
                                        value="{{ old('previous_school_udise') }}"
                                        inputmode="numeric" maxlength="11"
                                        style="letter-spacing: 4px; font-size: 14px;"
                                        placeholder="XXXXXXXXXXX" required>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <label for="previous-school">Previous School Name & Address</label>
                                        <input type="text" class="form-control" id="previous-school" name="previous_school" value="{{ old('previous_school') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="board-registration-number">9th/11th Registration Number</label>
                                        <input type="text" class="form-control" name="board_registration_number" id="board-registration-number"
                                        value="{{ old('board_registration_number') }}"
                                        inputmode="numeric" maxlength="16"
                                        style="letter-spacing: 4px; font-size: 14px;"
                                        placeholder="XXXXXXXXXXX" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="board-registration-number">10th/12th Roll Number</label>
                                        <input type="text" class="form-control" name="board_roll_number" id="board-roll-number"
                                        value="{{ old('board_roll_number') }}"
                                        inputmode="numeric" maxlength="16"
                                        style="letter-spacing: 4px; font-size: 14px;"
                                        placeholder="XXXXXXXXXXX" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="board-name">Board Name</label>
                                        <select class="form-select" name="board_name" id="board-name">
                                            {{-- Loop through each group (e.g., "National Boards", "State Boards") --}}
                                            @foreach($school_boards as $groupName => $boards)
                                                @if ($loop->first)
                                                    @foreach($boards as $board)
                                                        <option value="{{ $board['value'] }}" {{ old('board_name') == $board['value'] ? 'selected' : ''  }}>{{ $board['text'] }}</option>
                                                    @endforeach
                                                @else
                                                    <optgroup label="{{ $groupName }}">
                                                        @foreach($boards as $board)
                                                            <option value="{{ $board['value'] }}" {{ old('board_name') == $board['value'] ? 'selected' : ''  }}>{{ $board['text'] }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endif

                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="stream">Stream (For 9th & Above)</label>
                                        <select class="form-select" name="stream" id="stream">
                                            <option value="" disabled selected>Select Stream</option>
                                            <option value="Mathematics" {{ old('stream') == 'Mathematics' ? 'selected' : '' }}>Mathematics</option>
                                            <option value="Biology" {{ old('stream') == 'Biology' ? 'selected' : '' }}>Biology</option>
                                            <option value="Homescience" {{ old('stream') == 'Homescience' ? 'selected' : '' }}>Home Science</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="religion">Religion</label>
                                        <select class="form-select" name="religion" id="religion">
                                            <option value="" disabled selected>Select Religion</option>
                                            @foreach ($castees['religions'] as $religion)
                                                <option value="{{ $religion }}" {{ old('religion') == $religion ? 'selected' : '' }}> {{ $religion }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="category">Category</label>
                                        <select class="form-select" name="category" id="category">
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach ($castees['categorys'] as $category)
                                                <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}> {{ $category }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="Caste">Caste</label>
                                        <select class="form-select" name="caste" id="caste">
                                            <option value="" disabled selected>Select Caste</option>
                                            @foreach ($castees['castes'] as $caste)
                                                <option value="{{ $caste }}" {{ old('caste') == $caste ? 'selected' : '' }}> {{ $caste }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="blood_group">Blood Group</label>
                                        <select name="blood_group" id="blood_group" class="form-control" required>
                                            <option value="" disabled selected>--Select Blood Group--</option>
                                            <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                                            <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                                            <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                                            <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                                            <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                            <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                            <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                                            <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </section>


                        <!-- Step 5 : Address Details -->
                        <h3>Address Details</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="address-line1">Address Line 1/House No.</label>
                                        <input type="text" class="form-control" name="address_line1" id="address-line1" value="{{ old('address_line1') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="village">Village/Area</label>
                                        <input type="text" class="form-control" name="village" id="village" value="{{ old('village') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="pincode">Pincode</label>
                                        <input type="text" class="form-control" name="pincode" id="pincode"
                                        inputmode="numeric" maxlength="6"
                                        style="letter-spacing: 3px; font-size: 14px;"
                                        placeholder="XXXXXX"
                                        value="{{ old('pincode') }}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="post-office">Post Office</label>
                                        <select class="form-select" name="post_office" id="post-office">
                                            <option value="" disabled selected>Select Post Office</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="district">District</label>
                                        <input type="text" class="form-control disabled" name="district" id="district" value="{{ old('district') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control disabled" name="state" id="state" value="{{ old('state') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="student-bank-account">Student Bank Account Number</label>
                                        <input type="text" class="form-control" name="bank_account_number" id="student-bank-account"
                                        value="{{ old('bank_account_number') }}"
                                        inputmode="numeric" maxlength="18"
                                        style="letter-spacing: 4px; font-size: 14px;"
                                        placeholder="XXXXXXXXXXXXXX" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ifsc-code">Bank IFSC Code</label>
                                        <input type="text" class="form-control" name="ifsc_code" id="ifsc-code"
                                        value="{{ old('ifsc_code') }}"
                                        style="letter-spacing: 3px; font-size: 14px;"
                                        maxlength="11"
                                        placeholder="XXXX0XXXXXX" required>
                                        <span class="form-text text-primary fw-semibold" id="bank-name-address">Format: 4 letters, 0, 6 digits (e.g., HDFC0XXXXXX)</span>
                                    </div>
                                </div>
                            </div>
                        </section>

                        {{-- Step 5 : Picture Upload --}}
                        <h3>Picture Upload</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="student-photo" class="form-label">Student Photo (Max 200KB)</label>
                                        <input class="form-control" type="file" id="student-photo" name="student_photo" accept="image/*" onchange="previewImage(event, 'student-photo-preview')">
                                        <div class="image-preview-container">
                                            <img id="student-photo-preview"
                                                src="{{ old('student_photo') ? asset('storage/' . old('student_photo')) : asset('image/1689045779.png') }}"
                                                alt="Student Photo Preview"
                                                class="img-thumbnail mt-2"
                                                style="max-height: 150px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="student-father-photo" class="form-label">Father Photo (Max 200KB)</label>
                                        <input class="form-control" type="file" id="student-father-photo" name="father_photo" accept="image/*" onchange="previewImage(event, 'father-photo-preview')">
                                        <div class="image-preview-container">
                                            <img id="father-photo-preview"
                                                src="{{ old('father_photo') ? asset('storage/' . old('father_photo')) : asset('image/1689045779.png') }}"
                                                alt="Father Photo Preview"
                                                class="img-thumbnail mt-2"
                                                style="max-height: 150px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="student-mother-photo" class="form-label">Mother Photo (Max 200KB)</label>
                                        <input class="form-control" type="file" id="student-mother-photo" name="mother_photo" accept="image/*" onchange="previewImage(event, 'mother-photo-preview')">
                                        <div class="image-preview-container">
                                            <img id="mother-photo-preview"
                                                src="{{ old('mother_photo') ? asset('storage/' . old('mother_photo')) : asset('image/1689045779.png') }}"
                                                alt="Mother Photo Preview"
                                                class="img-thumbnail mt-2"
                                                style="max-height: 150px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 6 : Review & Submit -->
                        <h3>Review & Submit</h3>
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

<!-- Modal for Preview -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content will be loaded dynamically -->
                <div id="previewContent" class="text-center">
                    <p>Loading preview...</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="printButton">Print</button>
                <button type="button" class="btn btn-success" id="downloadButton">Download</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<!-- jquery step -->
<script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/hindi-input.js') }}"></script>


<script>
    $("#vertical-example").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slide",
        autoFocus: true,
        onInit: function (event, currentIndex) {
            // Add a custom button after the "Finish" button
            const previewButton = `<a href="#" class="bg-secondary-subtle text-secondary" id="preview-button" role="menuitem">Preview</button>`;
            $('.actions > ul').append(`<li class="d-none" id="preview-button-li">${previewButton}</li>`);
            $('#preview-button').on('click', function () {
                const formData = $("#student-form").serialize();
                $('#previewModal').modal('show');
                $.ajax({
                    url: "{{ route('students.preview') }}", // Define this route in your web.php
                    type: "POST",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
                    },
                    success: function (response) {
                        $('#previewContent').html(response);
                    },
                    error: function (xhr, status, error) {
                        $('#previewContent').html('<p class="text-danger">An error occurred while loading the preview.</p>');
                        console.error(error);
                    }
                });
            });
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            // Show the custom button only on the last step
            const isLastStep = currentIndex === 5; // Number of steps - 1
            if (isLastStep) {
                $('#preview-button-li').removeClass('d-none');
            } else {
                $('#preview-button-li').addClass('d-none');
            }
        },
        onFinished: function (event, currentIndex) {
            document.getElementById("student-form").submit();
        }
    });

// Print functionality
$(document).on('click', '#printButton', function () {
        const printContent = document.getElementById('previewContent').innerHTML;
        const printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write(`
            <html>
                <head>
                    <title>Print Preview</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                    </style>
                </head>
                <body onload="window.print(); window.close();">
                    ${printContent}
                </body>
            </html>
        `);
        printWindow.document.close();
});

// Download functionality
$(document).on('click', '#downloadButton', function () {
        const content = document.getElementById('previewContent').innerHTML;
        const blob = new Blob([content], { type: 'text/html' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'preview.html';
        link.click();
});

$('#pincode').on('blur', function() {
        var pincode = $(this).val().trim();
        if (pincode.length === 6) {
        fetch(`https://api.postalpincode.in/pincode/${pincode}`)
            .then(response => response.json())
            .then(data => {
                if (data[0].Status === "Success") {
                    var postOffices = data[0].PostOffice;
                    var postOfficeSelect = $('#post-office');
                    postOfficeSelect.empty();
                    postOfficeSelect.append('<option value="" disabled selected>Select Post Office</option>');
                    postOffices.forEach(function(office) {
                        postOfficeSelect.append(`<option value="${office.Name}">${office.Name}</option>`);
                    });
                    $('#district').val(postOffices[0].District);
                    $('#state').val(postOffices[0].State);
                } else {
                    alert("Invalid Pincode");
                }
            })
            .catch(error => console.error('Error fetching pincode data:', error));
    }
});
$('#ifsc-code').on('blur', function() {
    var ifsc = $(this).val().toUpperCase();
    $(this).val(ifsc); // Convert input to uppercase
    if (ifsc.length === 11) {
        fetch(`https://ifsc.razorpay.com/${ifsc}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                $('#bank-name-address').text(`${data.BANK}, ${data.BRANCH}, ${data.ADDRESS}`).removeClass('text-danger').addClass('text-primary fw-semibold');
            })
            .catch(error => {
                console.error('Error fetching IFSC data:', error);
                $('#bank-name-address').text('Invalid IFSC Code').removeClass('text-primary fw-semibold').addClass('text-danger');
            });
    } else {
        $('#bank-name-address').text('Format: 4 letters, 0, 6 digits (e.g., HDFC0XXXXXX)').removeClass('text-danger').addClass('text-primary fw-semibold');
    }
});

function previewImage(event, previewId) {
        const input = event.target;
        const preview = document.getElementById(previewId);

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            // Reset to the default "No Image" placeholder if no file is selected
            preview.src = "{{ asset('images/1689045779.png') }}";
        }
    }
</script>

@endsection
