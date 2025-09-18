<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_id',
        'pen_number',
        'adhar_no',
        'dob',
        'caste',
        'religion',
        'admission_class',
        'admission_date',
        'stream',
        'current_class',
        'prev_school',
        'mobile_no',
        'father_name',
        'father_adhar',
        'father_occu',
        'father_mobile',
        'mother_name',
        'mother_adhar',
        'mother_occu',
        'mother_mobile',
        'address',
        'admission_session',
        'current_session',
        'image_location',
        'status',
        'last_updated_by',
        'last_modified_on',
        'created_by',
        'created_on',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function studentClass()
    {
        return $this->belongsTo(Classes::class);
    }

}
