<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'teacher_id',
        'qualification',
        'experience',
        'specialization',
        'mobile_no',
        'address',
        'joining_date',
        'status',
        'image_location',
        'created_by',
        'created_on',
        'last_updated_by',
        'last_modified_on',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
