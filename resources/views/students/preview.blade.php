<style>
    td, th, tr {
        border: 1px solid #000;
        text-align: start;
        padding: 2px;
        color: #000;
    }
</style>
<div class="container">
    <!-- Background Logo -->
<div class="position-absolute w-100 text-center" style="height:inherit;">
    <img src="uploads/logo.png" class="opacity-25 mt-5" style="height:75%;" alt="Background Logo">
</div>

<!-- Main Container -->
<div class="position-relative bg-transparent border border-info border-3 rounded-4 z-index-3 h-100">

    <!-- Header Section -->
    <div class="d-inline-block w-100 bg-info text-white p-3">
        <div class="d-flex align-items-center">
            <!-- Logo -->
            <div class="me-3">
                <img src="https://admin.snbic.in/uploads/logo.png" alt="Logo" class="img-fluid" style="height:130px;">
            </div>

            <!-- Text Content -->
            <div class="flex-grow-1 text-center">
                <h6 class="mb-1 fw-normal text-uppercase letter-spacing-1">
                    (Affiliated to Uttar Pradesh Madhyamik Shiksha Parishad, Prayagraj)
                </h6>
                <h1 class="mb-0 fw-bold text-uppercase letter-spacing-1">
                    SHRI NARSINGH BHAGWAN INTER COLLEGE
                </h1>
                <h3 class="my-2 fw-normal text-uppercase letter-spacing-1">
                    LOHKARERA, RUNAKUTA, AGRA, PIN-282007
                </h3>
                <h4 class="mb-0 fw-normal letter-spacing-1">
                    E-mail : snbintercollege1530@gmail.com
                </h4>
            </div>
        </div>
    </div>
</div>

    <hr>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="4">
                            <h3 class="text-center">Student Admission Form / छात्र प्रवेश प्रार्थनापत्र</h3>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th colspan="2">
                            <img src="{{ $data['student_photo'] ?? '' }}" alt="" max-height="100" max-width="100">
                        </th>
                        <th colspan="1">
                            <img src="{{ $data['father_photo'] ?? '' }}" alt="" max-height="100" max-width="100">
                        </th>
                        <th colspan="1">
                            <img src="{{ $data['mother_photo'] ?? '' }}" alt="" max-height="100" max-width="100">
                        </th>
                    </tr>
                    <!-- Personal Details -->
                    <tr>
                        <th>Scholar's Register No<br>छात्र रजि. संख्या</th>
                        <td>{{ $data['scholar_register_no'] ?? '' }}</td>
                        <th>Transfer Certificate File No<br>स्थानान्तरण प्रमाण-पत्र फाइल पृष्ठ संख्या</th>
                        <td>{{ $data['transfer_certificate_file_no'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Date of Application</th>
                        <td>{{ $data['application_date'] ?? '' }}</td>
                        <th>PEN Number</th>
                        <td>{{ $data['pen_number'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Name of Student (Hindi)</th>
                        <td>{{ $data['name'] ?? 'N/A' }}</td>
                        <th>Name of Student</th>
                        <td>{{ $data['name_hindi'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>{{ $data['dob'] ?? 'N/A' }}</td>
                        <th>Blood Group</th>
                        <td>{{ $data['blood_group'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Aadhaar Number</th>
                        <td>{{ $data['adhar_no'] ?? 'N/A' }}</td>
                        <th>Email ID</th>
                        <td>{{ $data['email'] ?? 'N/A' }}</td>
                    </tr>

                    <!-- Parent Details -->
                    <tr>
                        <th>Father's Name</th>
                        <td>{{ $data['father_name'] ?? 'N/A' }}</td>
                        <th>Father's Name (Hindi)</th>
                        <td>{{ $data['father_name_hindi'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Mother's Name</th>
                        <td>{{ $data['mother_name'] ?? 'N/A' }}</td>
                        <th>Mother's Name(Hindi)</th>
                        <td>{{ $data['mother_name_hindi'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Father's Aadhaar</th>
                        <td>{{ $data['father_adhar'] ?? 'N/A' }}</td>
                        <th>Father's Occupation</th>
                        <td>{{ $data['father_occupation'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Mother's Aadhaar</th>
                        <td>{{ $data['mother_adhar'] ?? 'N/A' }}</td>
                        <th>Mother's Occupation</th>
                        <td>{{ $data['mother_occupation'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Father's Mobile</th>
                        <td>{{ $data['father_mobile'] ?? 'N/A' }}</td>
                        <th>Mother's Mobile</th>
                        <td>{{ $data['mother_mobile'] ?? 'N/A' }}</td>
                    </tr>


                    <!-- Academic Details -->
                    <tr>
                        <th>Admission Session</th>
                        <td>{{ $data['admission_session'] ?? 'N/A' }}</td>
                        <th>Admission Class</th>
                        <td>{{ $data['admission_class'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Previous School</th>
                        <td>{{ $data['previous_school'] ?? 'N/A' }}</td>
                        <th>Previous Class</th>
                        <td>{{ $data['previous_class'] ?? 'N/A' }}</td>
                    </tr>

                    <!-- Address Details -->
                    <tr>
                        <th>Address</th>
                        <td colspan="3">
                            {{ $data['address_line1'] ?? 'N/A' }},
                            {{ $data['village'] ?? 'N/A' }},
                            {{ $data['district'] ?? 'N/A' }},
                            {{ $data['state'] ?? 'N/A' }}
                        </td>
                    </tr>

                    <!-- Bank Details -->
                    <tr>
                        <th>Bank Account Number</th>
                        <td>{{ $data['bank_account_number'] ?? 'N/A' }}</td>
                        <th>Bank IFSC Code</th>
                        <td>{{ $data['ifsc_code'] ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
