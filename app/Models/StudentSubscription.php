<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubscription extends Model {
    use HasFactory;
    protected $guarded = [];

    public function student() {
        return $this->belongsTo(Student::class);
    }
    public function feeMaster() {
        return $this->belongsTo(FeeMaster::class);
    }
}
