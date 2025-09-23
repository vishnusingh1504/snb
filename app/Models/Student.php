<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'name_hindi', 'adhar_no', 'pen_number', 'gender', 'dob', 'current_class', 'email', 'transport_route',
        'father_name', 'father_name_hindi', 'father_adhar', 'father_mobile', 'father_occupation',
        'mother_name', 'mother_name_hindi', 'mother_adhar', 'mother_mobile', 'mother_occupation',
        'admission_session', 'admission_class', 'admission_date', 'stream',
        'religion', 'category', 'caste',
        'address', 'bank_account_number', 'ifsc_code',
        'previous_academic_details',
        'images',
        'active_session',
    ];

    protected $guarded = [
        'student_id',
    ];

    protected $casts = [
        'address' => 'array',
        'dob' => 'date',
        'admission_date' => 'date',
        'previous_academic_details' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function studentClass()
    {
        return $this->belongsTo(Classes::class);
    }

    public function getAddressLine1Attribute() {
        return $this->address['address_line1'] ?? null;
    }
    public function getVillageAttribute() {
        return $this->address['village'] ?? null;
    }
    public function getPostOfficeAttribute() {
        return $this->address['post_office'] ?? null;
    }
    public function getDistrictAttribute() {
        return $this->address['district'] ?? null;
    }
    public function getStateAttribute() {
        return $this->address['state'] ?? null;
    }
    public function getPincodeAttribute() {
        return $this->address['pincode'] ?? null;
    }
    public function getPreviousSchoolUdiseAttribute() {
        return $this->previous_academic_details['previous_school_udise'] ?? null;
    }
    public function getPreviousSchoolNameAttribute() {
        return $this->previous_academic_details['previous_school_name'] ?? null;
    }
    public function getPreviousClassAttribute() {
        return $this->previous_academic_details['previous_class'] ?? null;
    }
    public function getBoardRegistrationNumberAttribute() {
        return $this->previous_academic_details['board_registration_number'] ?? null;
    }
    public function getBoardRollNumberAttribute() {
        return $this->previous_academic_details['board_roll_number'] ?? null;
    }
    public function getBoardNameAttribute() {
        return $this->previous_academic_details['board_name'] ?? null;
    }
    public function getStudentPhotoAttribute() {
        return $this->images['student_photo'] ?? null;
    }
    public function getFatherPhotoAttribute() {
        return $this->images['father_photo'] ?? null;
    }
    public function getMotherPhotoAttribute() {
        return $this->images['mother_photo'] ?? null;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            // Get the last student_id
            $lastStudent = Student::orderBy('id', 'desc')->first();

            if ($lastStudent && preg_match('/SNB(\d+)/', $lastStudent->student_id, $matches)) {
                $nextNumber = intval($matches[1]) + 1;
            } else {
                $nextNumber = 10001; // Starting point
            }

            $student->student_id = 'SNB' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
        });
    }

}
