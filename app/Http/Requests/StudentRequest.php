<?php
namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to use this request
    }

    public function rules()
    {
        return [
            // Step 1: Personal Details
            'name' => 'required|string|max:255',
            'name_hindi' => 'nullable|string|max:255',
            'adhar_no' => 'required|digits:12',
            'pen_number' => 'required|digits:10',
            'gender' => 'required|in:male,female,others',
            'dob' => 'required|date',
            'active_class' => 'required|integer',
            'email' => 'required|email|max:255',
            'transport_route' => 'nullable|string|max:255',

            // Step 2: Parent Details
            'father_name' => 'nullable|string|max:255',
            'father_name_hindi' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'mother_name_hindi' => 'nullable|string|max:255',
            'father_adhar' => 'nullable|digits:12',
            'mother_adhar' => 'nullable|digits:12',
            'father_mobile' => 'nullable|digits:10',
            'mother_mobile' => 'nullable|digits:10',
            'father_occupation' => 'nullable|string|max:255',
            'mother_occupation' => 'nullable|string|max:255',

            // Step 3: Academic Details
            'admission_session' => 'required|integer',
            'active_session' => 'required|integer',
            'admission_class' => 'required|integer',
            'admission_date' => 'required|date',
            'previous_class' => 'nullable|integer',
            'previous_school_udise' => 'required|string|max:11',
            'previous_school' => 'nullable|string|max:255',
            'board_registration_number' => 'nullable|string|max:16',
            'board_roll_number' => 'nullable|string|max:16',
            'board_name' => 'nullable|string|max:255',
            'stream' => 'nullable|string|max:55',
            'religion' => 'nullable|string|max:55',
            'category' => 'nullable|string|max:45',
            'caste' => 'nullable|string|max:60',

            // Step 4: Address Details
            'address_line1' => 'nullable|string|max:255',
            'village' => 'nullable|string|max:255',
            'pincode' => 'nullable|digits:6',
            'post_office' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',

            // Step 5: Bank Details
            'bank_account_number' => 'required|digits_between:10,18',
            'ifsc_code' => 'required|string|size:11',

            // Step 6: Picture Upload
            'student_photo' => 'nullable|image|max:200', // Max size in KB
            'father_photo' => 'nullable|image|max:200',
            'mother_photo' => 'nullable|image|max:200',
        ];
    }
    public function messages()
    {
        return [
            'adhar_no.digits' => 'Aadhaar Number must be exactly 12 digits.',
            'pen_number.digits' => 'PEN Number must be exactly 10 digits.',
            'father_adhar.digits' => 'Father\'s Aadhaar Number must be exactly 12 digits.',
            'mother_adhar.digits' => 'Mother\'s Aadhaar Number must be exactly 12 digits.',
            'father_mobile.digits' => 'Father\'s Mobile Number must be exactly 10 digits.',
            'mother_mobile.digits' => 'Mother\'s Mobile Number must be exactly 10 digits.',
            'pincode.digits' => 'Pincode must be exactly 6 digits.',
            'bank_account_number.digits_between' => 'Bank Account Number must be between 10 to 18 digits.',
            'ifsc_code.size' => 'IFSC Code must be exactly 11 characters.',
            'student_photo.max' => 'Student photo size must not exceed 200 KB.',
            'father_photo.max' => 'Father photo size must not exceed 200 KB.',
            'mother_photo.max' => 'Mother photo size must not exceed 200 KB.',
        ];
    }

}
